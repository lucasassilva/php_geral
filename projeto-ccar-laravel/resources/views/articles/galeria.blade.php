<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--Bootstrap css-->
    <link href="{{ asset('app-assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--Style main css-->
    <link href="{{ asset('app-assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/style.css') }}" rel="stylesheet">
    <!-- Font style css-->
    <link href="{{ asset('app-assets/css/font-awesome.css') }}" rel="stylesheet">
    <!--Font google url -->
    <link href="{{ URL::asset('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>

@include('utilities.navbar')

<div class="intro-page gallery">
    <div class="container">
        <h1>Galeria</h1>
        <p></p>
    </div>
</div>

<div class="wrapper">
    <section class="partners">
        <div class="container">
            <h2>Galeria</h2>
            <span class="dot-dash dark">.</span>
            <div class="row">
                <div class="col-md-4 py-3">
                    <img src="{{ asset('app-assets/img/figura1.jpg') }}" class="img-fluid" style="width: 550px;height: 250px">
                </div>
                <div class="col-md-4 py-3">
                    <img src="{{ asset('app-assets/img/figura2.jpg') }}" class="img-fluid" style="width: 550px;height: 250px">
                </div>
                <div class="col-md-4 py-3">
                    <img src="{{ asset('app-assets/img/figura3.jpg') }}"  class="img-fluid" style="width: 550px;height: 250px">
                </div>


                <div class="col-md-4 py-3">
                    <img src="{{ asset('app-assets/img/figura4.jpg') }}" class="img-fluid" style="width: 550px;height: 250px">
                </div>
                <div class="col-md-4 py-3">
                    <img src="{{ asset('app-assets/img/figura5.jpg') }}" class="img-fluid" style="width: 550px;height: 250px">
                </div>
                <div class="col-md-4 py-3">
                    <img src="{{ asset('app-assets/img/figura6.jpg') }}"  class="img-fluid" style="width: 550px;height: 250px">
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
