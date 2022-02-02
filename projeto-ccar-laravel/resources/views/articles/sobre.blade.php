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

<div class="intro-page about">
    <div class="container">
        <h1>Sobre</h1>
        <p></p>
    </div>
</div>

<div class="wrapper">
    <section class="our-history">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('app-assets/img/figura7.png') }}" alt="" />
                </div>
                <div class="col-md-7">
                    <h2>Sobre</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ip sum has been the industry's standard dummy text ever since the 1500s, when an unk- nown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="our-team">
    <div class="container">
        <h2>Equipe</h2>
        <span class="dot-dash dark">.</span>
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid rounded" src="{{ asset('app-assets/img/perfil.jpg') }}" width="180" height="100">
            </div>
            <div class="col-md-12 our-team--item__info">
                <h3>Lucas Alves</h3>
                <h5>Web Design</h5>
            </div>
        </div>
    </div>
    </section>

    <section class="our-history-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Desenvolvimento</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{ asset('') }}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2019-2020</h4>
                                    <h4 class="subheading">Planejamento</h4>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{ asset('') }}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Junho 2019</h4>
                                    <h4 class="subheading">Etapa 1</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{ asset('') }}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Dezembro 2019</h4>
                                    <h4 class="subheading">Etapa 2</h4>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{ asset('') }}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Mês</h4>
                                    <h4 class="subheading">Etapa 3</h4>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4><br>Fim</h4>
                            </div>
                        </li>
                    </ul>
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
