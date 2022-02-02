<?php
namespace App\Http\Controllers\Users;
use App\Mail\SendEmail;
use App\Entities\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
Use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use Laravel\Socialite\Facades\Socialite;
use Storage;

class UsersController extends Controller {

  protected $repository;


  public function __construct(UserRepository $repository) {
    $this->repository = $repository;
  }

  public function login() {
    if(Auth::check()){
      return redirect()->route('dashboard.index');
    }else{
      return view( 'users.login', ['title'=>'CCAR | Login'] );
    }
  }

  public function loginPost( Request $request ) {

    $validatedData = $request->validate([
      'password' => 'required',
      'email' => 'required',
    ],$validatedData=[
      'password.required'  => 'Senha é obrigatório.',
      'email.required' => 'Email é obrigatório.',
    ]
  );

    try {
      if (auth()->attempt(['email' => $request->get('email'), 'password' => $request->get('password')],true)) {
        return redirect()->route( 'dashboard.index' );
      } else {
        return redirect()->route( 'users.login' )->withInput()->with(['error'=>'Email ou senha inválida.']);
      }
    } catch (\Exception $e ) {
      return $e->getMessage();
    }
  }

  public function cadastro() {
    return view( 'users.cadastro', ['title'=>'CCAR | Cadastro'] );
  }

  public function cadastroPost( UserCreateRequest $request )
  {
    $request['password']=bcrypt($request['password']);
    $request['confirm_password']=$request['password'];
    $request['verify_token']=\Str::random(30);
    $usuario = $this->repository->create($request->all());
    try {
      if (!is_null($usuario)) {
        Mail::send(new SendEmail($usuario->toArray(),'verifyEmail'));
        return back()->with(['success' => 'Cadastrado com sucesso.']);
      } else {
        return back()->with(['error' => 'Ocorreu uma falha ao realizar cadastro.']);
      }
    }catch (\Exception $e ) {
      return $e->getMessage();
    }
  }

  public function recuperar(){
    return view( 'users.recuperar', ['title'=>'CCAR | Recuperar'] );
  }

  public function recuperarPost(Request $request){
    $validatedData = $request->validate([
      'email' => 'required',
    ]);

    $usuario=$this->repository->findWhere(['email'=>$request['email']],['email','reset_token','id'])->first();
    if(is_null($usuario)){
      return back()->withErrors(['email'=>'O email não está cadastrado.']);
    }
    $usuario['reset_token']=\Str::random(30);
    $update=$this->repository->update($usuario->toArray(),$usuario['id']);
    try {
      if (!is_null($update)) {
        Mail::to('lucasalves5671@gmail.com')->send(new SendEmail($update->toArray(), 'resetPassword'));
        return back()->with(['success' => 'Um link para recuperar sua senha foi enviado para seu endereço de email.']);
      } else {
        return back()->with(['error' => 'Ocorreu uma falha ao recuperar sua senha.']);
      }
    }catch ( \Exception $e ) {
      return $e->getMessage();
    }
  }


  public function verificarCadastro(Request $request)
  {
    $usuario=$this->repository->find($request['id']);
    $data=$request->all();
    try{
      if($request['verify_token']=$usuario['verify_token']){
        $usuario['email_verify']=true;
        $update=$usuario->update($data);
        if(!is_null($update)){
          return redirect()->route('users.cadastro')->with(['message' => 'Email verificado com sucesso.']);
        }else{
         return redirect()->route('users.cadastro')->with(['error' => 'Ocorreu uma falha ao verificar o email.']);
       }
     }
   }catch ( \Exception $e ) {
    return $e->getMessage();
  }
}

public function verificarRedefinir(Request $request)
{
  $usuario=$this->repository->find($request['id']);
  $data=$request->all();
  try{
    if($request['reset_token']=$usuario['reset_token']){
      $usuario['reset_verify']=true;
      $update=$usuario->update($data);
      if(!is_null($update)){
        return redirect()->route('users.redefinir')->with(['id'=>$usuario['id']]);
      }else{
       return back()->with(['error' => 'Ocorreu uma falha na solicitação de recuperar sua senha.']);
     }
   }
 }catch ( \Exception $e ) {
  return $e->getMessage();
}
}


public function redefinirSenha(Request $request){
  return view( 'users.redefinir', ['title'=>'CCAR | Redefinir']);
}

public function redefinirSenhaPut(Request $request){

  $validatedData = $request->validate([
    'password' => 'required',
    'confirm_password' => 'required|same:password',
  ],[
    'password.required'=> 'Senha é obrigatório.',
    'confirm_password.required'=>'Confirmar senha é obrigatório.',
    'confirm_password.same'=>'Os campos confirmar senhha e senha devem corresponder.',
  ]);
  $request['password']=bcrypt($request['password']);
  $request['confirm_password']=$request['password'];
  $usuario=$this->repository->find($request['id']);
  $data=$request->all();
  $update=$usuario->update($data);
  try {
    if (!is_null($update)) {
      return back()->with(['success' => 'A senha foi redefinida com sucesso.']);
    } else {
      return back()->with(['error' => 'Ocorreu uma falha ao redefenir sua senha.']);
    }
  }catch (\Exception $e ) {
    return $e->getMessage();
  }
}


public function socialProvider($provider){
  return Socialite::driver($provider)->redirect();
}

public function socialCallback($provider,Request $request){

  if($provider=="facebook"){
    $social = Socialite::driver($provider)->stateless()->fields(['first_name','last_name','email'])->user(); 
  }else if($provider=="google"){
    $social = Socialite::driver($provider)->stateless()->user(); 
  }

  $findUser = User::where('email', $social->email)->first();
  $user=new User;

  try{
    if($findUser){
      Auth::loginUsingId($findUser['id'],true);
      if(Auth::check()){
        return redirect()->route('dashboard.index');
      }
    } else{
     switch ($provider) {
      case "facebook":
      $data=file_get_contents($social->avatar);
      $img = \Str::random(6).'.png';
      Storage::put('users/'.$img,$data);
      $user['first_name'] =$social->user['first_name']; 
      $user['last_name'] =$social->user['last_name']; 
      $user->email = $social->email;
      $user['image'] = $img;
      $user->provider=$provider;
      $user['provider_id']=$social->id;
      $user->save();
      if($user->save()){
        Auth::loginUsingId($user['id'],true);
        return redirect()->route('dashboard.index');
      }
      break;

      case "google":
      $data=file_get_contents($social->avatar);
      $img = \Str::random(6).'.png';
      Storage::put('users/'.$img,$data);
      $user['first_name'] =$social->user['given_name']; 
      $user['last_name'] = $social->user['family_name'];
      $user->email = $social->email;
      $user['image'] = $img;
      $user->provider=$provider;
      $user['provider_id']=$social->id;
      $user->save();
      if($user->save()){
        Auth::loginUsingId($user['id'],true);
        return redirect()->route('dashboard.index');
      }
      break;
    }
  }
  }catch (\Exception $e ) {
    return $e->getMessage();
  }
 }
}
