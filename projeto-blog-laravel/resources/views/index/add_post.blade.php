@extends("layouts.master")

@section("title", "Posts - Add")

@section("content")


<div class="container mt-5">

    <h3>Cadastrar uma postagem </h3>
    <hr />

    <div class="card">

        <div class="card-body">

            {!! Form::open(["url" => "/create", "method" => "post"]) !!}

            <div class="form-group mb-3">
                {{ Form::label("title", "Titulo:", ["class" => "control-label", "id" => "title"]) }}
                {{ Form::text("title", null, array_merge(["class" => "form-control",
                "id" => "title", "autocomplete" => "off"])) }}
            </div>

            <div class="form-group mb-4">
                {{ Form::label("description", "Descrição:", ["class" => "control-label",
                "id" => "description"]) }}
                {{ Form::textarea("description", null, array_merge(["class" => "form-control",
                "id" => "description", "autocomplete" => "off", "rows" => "3", "style" => "resize:none;"])) }}
            </div>

            {{  Form::submit("Cadastrar", ["class" => "btn btn-primary"]) }}

            {!! Form::close() !!}

        </div>

    </div>


</div>

@endsection
