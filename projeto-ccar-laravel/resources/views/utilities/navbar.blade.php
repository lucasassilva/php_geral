<header>
        <div class="container">
            <div class="logo">
                <a href="{{ route('master.index') }}"><img class="img-fluid" src="{{ asset('app-assets/img/logo.png') }}" style="width: 85px"/></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="{{ route('master.index') }}">Inicio</a></li>
                    <li><a href="{{ route('articles.servicos') }}">Serviços</a></li>
                    <li><a href="{{ route('articles.galeria') }}">Galeria</a></li>
                    <li><a href="{{ route('articles.sobre') }}">Sobre</a></li>
                    <li><a href="{{ route('contact.contato') }}">Contato</a></li>
                    <li><a href="{{ route('users.cadastro') }}"><i class="fa fa-user" ></i>&nbsp;&nbsp;Cadastra-se</a></li>
                    <li><a href="{{ route('users.login') }}"><i class="fa fa-sign-in" ></i>&nbsp;&nbsp;Login</a>
                </ul>
            </div>
            <div class="mobile-menu"><i class="fa fa-bars"></i></div>
        </div>
    </header>

