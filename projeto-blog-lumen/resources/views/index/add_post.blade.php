@extends("layouts.master")

@section("title", "Posts - Add")

@section("content")

<div class="container my-5">

    <h3 class="">Cadastrar uma postagem</h3>

    <hr class="mb-4" />

    <div class="card">

        <div class="card-body">

            <form action="{{ url("create")}}" method="post" enctype="multipart/form-data">

                <div class="form-group mb-3">
                    <label for="title">Titulo:</label>
                    <input type="text" class="form-control" name="title" id="title" />
                </div>

                <div class="form-group mb-4">
                    <label for="description">Descrição:</label>
                    <textarea style="resize: none" class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="image">Imagem:</label>
                    <input type="file" class="form-control" name="image" id="image" />
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i>Cadastrar</button>

            </form>

        </div>


    </div>

</div>


@endsection

