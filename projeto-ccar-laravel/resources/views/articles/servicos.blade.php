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

    <div class="intro-page service">
        <div class="container">
            <h1>Serviços</h1>
            <p></p>
        </div>
    </div>

    <div class="wrapper">

        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Serviços</h2>
                        <div class="our-services--element">
                            <h4>Agendamento de serviços</h4>
                            <p>É importante sempre verificar e fazer uma manutenção diaria e manter o controle sobre sua agenda.</p>
                            <div class="our-services--element__image"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                        </div>
                        <div class="our-services--element">
                            <h4>Vendas de carros e equipamentos</h4>
                            <p>As vendas são estabelecidas através dos preços de tabela do mercado.</p>
                            <div class="our-services--element__image"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                        </div>
                        <div class="our-services--element">
                            <h4>Manutenção de equipamentos</h4>
                            <p>A manutenção são feitas em veiculos e equipamentos entregando de acordo com o  cliente.</p>
                            <div class="our-services--element__image"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-services--slider">
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
            <div class="our-services--dots"></div>
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
