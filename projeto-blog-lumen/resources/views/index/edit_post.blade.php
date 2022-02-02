@extends("layouts.master")

@section("title", "Posts - Edit")

@section("content")

<div class="container my-5">

    <h3 class="">Editar postagem</h3>

    <hr class="mb-4" />

    <div class="card">

        <div class="card-body">

            <form action="{{ url("update")}}" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="{{ $posts["id"] }}">

                <input type="hidden" name="image_storage" value="{{ $posts["image"] }}">

                <div class="form-group mb-3">
                    <label for="title">Titulo:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $posts["title"] }}" />
                </div>

                <div class="form-group mb-4">
                    <label for="description">Descrição:</label>
                    <textarea style="resize: none" class="form-control" name="description" id="description" rows="3">{{ $posts["description"] }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="image">Imagem:</label>
                    <input type="file" class="form-control" name="image" id="image" />
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i>Editar</button>

            </form>

        </div>

    </div>

</div>

@endsection

