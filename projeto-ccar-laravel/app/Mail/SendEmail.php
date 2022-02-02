<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable {
    use Queueable, SerializesModels;

    public $data;
    public $function;

    public function __construct( $data,$function ) {
        $this->data = $data;
        $this->function=$function;
    }

    public function build(Request $request) {
        if($this->function=='contact'){
            return $this->from( 'lucasalves5671@gmail.com' )->subject( 'CCAR' )->view( 'contact.email' )->with( 'data', $this->data )->to($this->data['email']);
        }elseif ($this->function=='resetPassword'){
            return $this->from( 'lucasalves5671@gmail.com' )->subject( 'CCAR' )->view( 'users.resetar' )->with( 'data', $this->data )->to($this->data['email']);
        }elseif($this->function=='verifyEmail'){
        return $this->from( 'lucasalves5671@gmail.com' )->subject( 'CCAR' )->view( 'users.verificar' )->with( 'data', $this->data )->to($this->data['email']);
        }
    }

}
