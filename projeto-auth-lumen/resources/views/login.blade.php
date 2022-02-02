@extends("layouts.master")

@section("title", "Lumen | Login")

@section("content")

<div class="card mt-3">
    <div class="card-header">
        <h5>Login</h5>
    </div>
    <div class="card-body">
        <form class="col-8 mx-auto" action="/login" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" autocomplete="off" name="email">
            </div>
            <div class="form-group">
                <label for="email">Senha</label>
                <input type="password" class="form-control" autocomplete="off" name="password">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="check">
                <label class="form-check-label" for="check">Relembrar me</label>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</div>

@endsection

