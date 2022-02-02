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

<div class="home-slider">
    <div class="home-slider--wrapper">
        <div>
            <div class="home-slider--wrapper__inner" style="background-image: url('{{ asset('app-assets/img/fundo.jpg') }}')">
                <div class="container">
                    <h1>Bem-vindo a CCAR !</h1>
                    <span class="dot-dash">.</span>
                    <div class="slider-buttons">
                        <a href="{{ route('users.cadastro') }}" class="button">Inscreva-se</a>
                        <a href="{{ route('articles.sobre') }}" class="button button-w" aria-hidden="true">Veja mais</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="home-slider--wrapper__inner" style="background-image: url('{{ asset('app-assets/img/fundo3.jpg') }}')">
                <div class="container">
                    <h1>Promovendo os melhores serviços !</h1>
                    <span class="dot-dash">.</span>
                    <div class="slider-buttons">
                        <a href="{{ route('users.cadastro') }}" class="button">Inscreva-se</a>
                        <a href="{{ route('articles.servicos') }}" class="button button-w ">Veja mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-slider--nav">
        <div class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>
    <div class="home-slider--anchor">
        <span><i class="fa fa-hand-o-down" aria-hidden="true"></i></span>
    </div>
</div>

<div class="wrapper">

    <section class="our-history">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <img src="{{ asset('app-assets/img/carro.png') }}" alt="" />
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <h2>SOBRE</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ip sum has been the industry's standard dummy text ever since the 1500s, when an unk- nown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <a href="{{ route('articles.sobre') }}" class="button">VER</a>
                </div>
            </div>
        </div>
    </section>

    <section class="case-study">
        <div class="container">
            <h2>Serviços</h2>
            <span class="dot-dash dark">.</span>
        </div>
        <div class="container">
            <div class="case-study--sliders">
                <div class="case-study--left">
                    <div class="case-study--left__textslider">
                        <div>
                            <div class="case-study--left__textslider__image"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
                            <h4>Agendamento de serviços</h4>
                            <a href="{{ route('articles.servicos') }}" class="button small">Ver</a>
                        </div>
                        <div>
                            <div class="case-study--left__textslider__image"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
                            <h4>Vendas de carros e equipamentos</h4>
                            <a href="{{ route('articles.servicos') }}" class="button small">Ver</a>
                        </div>
                        <div>
                            <div class="case-study--left__textslider__image"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
                            <h4>Manutenção de equipamentos</h4>
                            <a href="{{ route('articles.servicos') }}" class="button small">Ver</a>
                        </div>
                    </div>
                    <div class="case-study--left__dots"></div>
                </div>
                <div class="case-study--right">
                    <div class="case-study--right__imageslider">
                        <div>
                            <img src="{{ asset('app-assets/img/agenda.jpg') }}" alt="" />
                        </div>
                        <div>
                            <img src="{{ asset('app-assets/img/vendas.jpg') }}" alt="" />
                        </div>
                        <div>
                            <img src="{{ asset('app-assets/img/reparo.png') }}" alt="" />
                        </div>
                    </div>
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
