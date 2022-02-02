<h3>Olá! {{$data['first_name']}} {{$data['last_name']}}! </h3>

<p>Clique abaixo no link para ativar sua conta !</p>

<a href="http://127.0.0.1:8000/users/verificar_cadastro?id={{$data['id']}}&verify_token={{$data['verify_token']}}">http://127.0.0.1:8000/users/verificar_cadastro?id={{$data['id']}}&</a>
