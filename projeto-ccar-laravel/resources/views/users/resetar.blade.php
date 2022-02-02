<h3>Olá! {{$data['first_name']}} {{$data['last_name']}}! </h3>

<p>Clique abaixo no link para redefinir sua senha !</p>

<a href="http://127.0.0.1:8000/users/verificar_redefinir?id={{$data['id']}}&reset_token={{$data['reset_token']}}">http://127.0.0.1:8000/users/verificar_redefinir?id={{$data['id']}}& </a>
