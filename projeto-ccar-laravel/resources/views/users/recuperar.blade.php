<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <!--Bootstrap css-->
    <link href="{{ asset('app-assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--My style css-->
    <link href="{{ asset('app-assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/style.css') }}" rel="stylesheet">
    <!--Font style css-->
    <link href="{{ asset('app-assets/css/font-awesome.css') }}" rel="stylesheet">
    <!--Font google url -->
    <link href="{{ URL::asset('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>

    @include('utilities.navbar')

    <div class="intro-page esqueci">
        <div class="container">
            <h1>Recuperar senha</h1>
            <p></p>
        </div>
    </div>
    <div class="wrapper">
        <section class="user">
            <div class="container">
                <h2 class="text-center">Recuperar senha</h2>
                <span class="dot-dash dark">.</span>
                <div class="row">
                    <div class="col-md-8 centered keep-touch--white">
                        @if(Session::has('success'))
                        <div class="mbh-success mbh-notification-box">
                            <li>{{Session::get('success')}}</li>
                        </div>
                        @elseif(Session::has('error'))
                        <div class="mbh-failure mbh-notification-box">
                            <li>{{Session::get('error')}}</li>
                        </div>
                        @else
                        {!! Form::open(['route'=>'users.recuperar','class'=>'py-2','method'=>'post']) !!}
                        <div class="form-group">
                            {!! Form::label('email','Email:')!!}
                            {!! Form::email('email',null,['placeholder' => 'E-mail','id'=>'email','class'=>'form-control form-control-lg'.$errors->first('email', 'form-control form-control-lg is-invalid'),'autocomplete'=>'off']) !!}
                            @error('email')<span class="error">{{ $errors->first('email') }}</span>@enderror
                        </div>
                        {!! Form::submit('Recuperar', ['class' => 'button']); !!}

                        <div class="py-4"></div>

                        <div class="social-auth-links text-center mb-3">
                            <a href="{{route('users.social',['facebook'])}}" class="btn btn-block btn-primary btn-lg">
                                <i class="fa fa-facebook mr-2"></i>Entrar com Facebook
                            </a>
                            <a href="{{route('users.social',['google'])}}" class="btn btn-block btn-danger btn-lg">
                                <i class="fa fa-google-plus mr-2"></i>Entrar com Google+
                            </a>
                        </div>
                        <div class="py-1"></div>
                        <a href="{{ route('users.login') }}" class="text-center">Acessar o sistema ?</a>
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
<!--Bootstrap js-->
<script src="{{ asset('app-assets/js/bootstrap.js') }}"></script>
<!--Slide js-->
<script src="{{ asset('app-assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('app-assets/js/slick.js') }}"></script>
<!--Main js-->
<script src="{{ asset('app-assets/js/main.js') }}"></script>

</body>
</html>
