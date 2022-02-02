@extends("layouts.master")

@section("title", "Posts")

@section("content")

<div class="container p-4">
    <h3>Lista de Postagens</h3>
    <a class="btn btn-success" href="{{ route("post_create") }}">Adicionar Post</a>
    <hr />
    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="card-title bg-primary">
            <h5 class="text-white p-3">{{ $post->title }}</h5>
        </div>
        <div class="card-body">
            <p class="lead">{{ $post->description }}</p>
            <hr />
            <form action="{{ route("post_delete", ["id" => $post->id]) }}"
                method="post" onsubmit="return confirm('Você deseja excluir esse post ?')">
                {{ csrf_field() }}
                <button class="btn btn-danger" type="submit">Deletar</button>
                <a class="btn btn-warning" type="button" href="{{ route("post_show", ["id" => $post->id]) }}">
                    Editar
                </a>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection
