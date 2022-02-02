<?php
namespace App\Http\Controllers\Contacts;
use App\Entities\ContactUS;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller as Controller;

class ContactsController extends Controller
{

    public function contato()
    {
        return view('contact.contato',['title'=>'CCAR | Contato']);
    }

    public function contatoPost(Request $request)
    {
        $data=array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        );

        $validatedData = $request->validate([
          'first_name' => 'required',
          'last_name'=>'required',
          'subject'=>'required',
          'email' => 'required|email',
          'message' => 'required',
        ],$validatedData=[
          'first_name.required'  => 'Nome é obrigatório.',
          'last_name.required'    => 'Sobrenome é obrigatório.',
          'email.required' => 'Email é obrigatório.',
          'subject.required'      => 'Assunto é obrigatório.',
          'message.required'=>'Mensagem é obrigatório.'
        ]
      );

        $usuario=ContactUS::create($request->all());
        
        try {
            if (!is_null($usuario)) {
                Mail::send(new SendEmail($data, 'contact'));
                return back()->with('success', 'Enviado com sucesso.');
            } else {
                return back()->with(['error' => 'Ocorreu uma falha ao enviar seu email.'])->withInput();
            }
        }catch (\Exception $e ) {
            return $e->getMessage();
        }
    }
}
