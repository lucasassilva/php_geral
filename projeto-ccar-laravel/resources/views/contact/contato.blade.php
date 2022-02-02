<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!--Bootstrap css-->
    <link href="{{ asset('app-assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--Style main css-->
    <link href="{{ asset('app-assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/style.css') }}" rel="stylesheet">
    <!--Font style css-->
    <link href="{{ asset('app-assets/css/font-awesome.css') }}" rel="stylesheet">
    <!--Font google url -->
    <link href="{{ URL::asset('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>

@include('utilities.navbar')

<div class="intro-page contact">
    <div class="container">
        <h1>Contato</h1>
        <p></p>
    </div>
</div>

<div class="wrapper">
    <section class="user">
        <div class="container">
            <h2 class="text-center">Contato</h2>
            <span class="dot-dash dark">.</span>
            <div class="row">
                <div class="col-md-8 centered keep-touch--white">
                  @if(Session::get('success'))
                      <div class="mbh-success mbh-notification-box">
                          <li>{{Session::get('success')}}</li>
                      </div>
                    @elseif(Session::get('error'))
                        <div class="mbh-failure mbh-notification-box">
                            <li>{{Session::get('error')}}</li>
                        </div>
                    @else
            {!! Form::open(['route'=>'contact.contato','class'=>'py-2','method'=>'post']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nome:') !!}
                    {!! Form::text('first_name',null,['placeholder' => 'Nome','id'=>'first_name','class'=>'form-control form-control-lg'.$errors->first('first_name', 'form-control form-control-lg is-invalid'),'autocomplete'=>'off']) !!}
                    @error('first_name')<span class="error">{{ $errors->first('first_name') }}</span>@enderror
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Sobrenome:') !!}
                    {!! Form::text('last_name',null,['placeholder' => 'Sobrenome','id'=>'last_name','class'=>'form-control form-control-lg'.$errors->first('last_name', 'form-control form-control-lg is-invalid'),'autocomplete'=>'off']) !!}
                    @error('last_name')<span class="error">{{ $errors->first('last_name') }}</span>@enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email',null,['placeholder' => 'E-mail','id'=>'email','class'=>'form-control form-control-lg'.$errors->first('email', 'form-control form-control-lg is-invalid'),'autocomplete'=>'off']) !!}
                    @error('email')<span class="error">{{ $errors->first('email') }}</span>@enderror
                </div>
                <div class="form-group">
                    {!! Form::label('subject', 'Assunto:') !!}
                    {!! Form::text('subject',null,['placeholder' => 'Assunto','id'=>'subject','class'=>'form-control form-control-lg'.$errors->first('subject', 'form-control form-control-lg is-invalid'),'autocomplete'=>'off']) !!}
                    @error('subject')<span class="error">{{ $errors->first('subject') }}</span>@enderror
                </div>
                <div class="form-group">
                    {!! Form::label('message', 'Mensagem:') !!}
                    {!! Form::textarea('message',null,['class'=>'form-control form-control-lg'.$errors->first('message', 'form-control form-control-lg is-invalid'),'id'=>'message','rows' => 3, 'cols' => 10,'placeholder' => 'Mensagem','autocomplete'=>'off']) !!}
                    @error('message')<span class="error">{{ $errors->first('message') }}</span>@enderror
                </div>
            {!! Form::submit('Enviar', ['class' => 'button','id'=>'button']); !!}
            {!! Form::close() !!}
             @endif
                </div>

            </div>
        </div>
    </section>
</div>


@include('utilities.footer')

<!--Jquery js-->
<script src="{{ asset('app-assets/js/jquery-3.1.0.min.js') }}"></script>
<script src="{{ asset('app-assets/js/jquery.easing.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('app-assets/js/bootstrap.js') }}"></script>
<!--Slide js -->
<script src="{{ asset('app-assets/js/slick.js') }}"></script>
<script src="{{ asset('app-assets/js/isotope.pkgd.min.js') }}"></script>
<!--Main js -->
<script src="{{ asset('app-assets/js/main.js') }}"></script>

</body>
</html>
