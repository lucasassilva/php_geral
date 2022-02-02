<?php
namespace App\Http\Controllers\Dashboard\Master;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use App\Entities\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(){
    $user=Auth::User();
    return view('dashboard.pages.index',['title'=>'CCAR | Dashboard','user'=>$user]);
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->to('users/login');
  }

  public function profile(Request $request){
    $user=Auth::User();
    return view('dashboard.pages.perfil',['title'=>'CCAR | Profile','user'=>$user,'id'=>$user['id']]);
  }

  public function profilePut(Request $request){

    $validatedData = $request->validate([
      'first_name'=>'required',
      'last_name'=>'required',
      'email'=>'required|email',
      'fileImage' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ],[
      'first_name.required' => 'Nome é obrigatório.',
      'last_name.required' => 'Sobrenome é obrigatório.',
      'email.required' => 'Email é obrigatório.',
      'fileImage.mimes'=>'Extensão da imagem é obrigatório ser jpeg,png,jpg,gif,svg',
    ]);

    if($request->hasFile('fileImage')){
      $request->fileImage->storeAs('users', $request->fileImage->getClientOriginalName());
      $request['image']=$request->fileImage->getClientOriginalName();
    }

    $usuario=User::find($request['id']);

    try{
      if($usuario['first_name']==$request['first_name'] && $usuario['last_name']==$request['last_name'] && $usuario['email']==$request['email'] && $request['fileImage']==NULL)
       {
       session()->flash('error', 'O seu perfil precisa ser modificado para ser atualizado.');
       return back();
     }else{
       $update=$usuario->update($request->all());
       session()->flash('success', 'O seu perfil foi alterado com sucesso.');
       return back();
     }
   }catch (\Exception $e ) {
    return $e->getMessage();
  }
 }
}
