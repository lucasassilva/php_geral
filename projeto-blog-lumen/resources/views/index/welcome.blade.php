@extends("layouts.master")

@section("title", "Posts")

@section("content")

<div class="container my-5">

    <h3>Lista de Postagens</h3>
    <a class="btn btn-success " href="{{ url("create") }}">Adicionar Post</a>
    <hr />

    <section class="text-center">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img style="height: 220px; width:100%" src="{{ URL::asset("storage/posts/". $post->image ) }}" alt="{{ $post->title }}" class="img-fluid" />
                        <a>
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ $post->description }}
                        </p>
                        <form action="{{ url("delete", [$post->id]) }}" method="post" onsubmit="return confirm('Você deseja excluir esse post ?')">
                            <a href="{{ url("update", [$post->id]) }}" class="btn btn-warning"><i class="fas fa-edit me-2"></i>Editar</a>
                            <button type="submit" class="btn btn-danger ms-3"><i class="fas fa-trash me-2"></i>Deletar</button>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>


@endsection

