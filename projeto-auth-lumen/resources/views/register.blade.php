@extends("layouts.master")

@section("title", "Lumen | Registrar")

@section("content")

<div class="card mt-3">
    <div class="card-header">
        <h5>Registrar</h5>
    </div>
    <div class="card-body">
        <form class="col-8 mx-auto" action="/register" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" autocomplete="off" name="email">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" class="form-control" autocomplete="off" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" id="password_confirmation" class="form-control" autocomplete="off"
                name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>

@endsection

