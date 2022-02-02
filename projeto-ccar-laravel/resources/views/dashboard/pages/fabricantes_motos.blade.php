@extends('dashboard.master.index')
@section('first_name',$user['first_name'])
@section('last_name',$user['last_name'])
@section('image',url("storage/users/".$user['image']))
@section('created_at',date('d/m/Y',strtotime($user['created_at'])))
@section('fabricantes_motos', 'active')
@section('item-1','active')
@section('conteudo-view')
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Fabricantes</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn btn-block bg-navy" data-toggle="modal"
                    data-target="#adicionar-fabricante"><i class="fa fa-plus-circle"></i>&nbsp;
                    Adicionar novo fabricante
                </button>
            </div>
            <div class="col-md-3" style="float: right">
                <form action="#" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Pesquisar..."
                        autocomplete="off">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-vk bg-navy"><i
                                class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-3">
                    <div class="box-header">
                        <small class="label label-default">FABRICANTE</small>
                    </div>
                    <div class="box-body overlays">
                        <img src="{{ asset('app-assets/img/volkswagen.png') }}" class="image img-responsive" width="205"
                        height="160">
                        <div class="middle">
                            <div class="row" style="position: relative;left:130%">
                                {!! Form::open(['method'=>'delete']) !!}
                                <a type="button" id="btn-custom" class="btn btn-default" alt="editar"
                                href="#"><i class="fa fa-pencil"></i></a>&nbsp;
                                <button id="btn-custom" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <h4 class=""><b>> Modelo</b></h4>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="adicionar-fabricante">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-rocket"></i>&nbsp; Adicionar novo fabricante</h4>
                            </div>

                            <div class="modal-body">
                                {!! Form::open(['route'=>'fabricatormotorcycles.store','method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                                <div class="form-group" id="name_div">
                                    {!! Form::text('name',null,['placeholder' => 'Nome do item','id'=>'name','class'=>'form-control','autocomplete'=>'off','id'=>'name']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Foto do fabricante: </label>
                                    <div class="timeline-body">
                                        <img src="http://placehold.it/200x150?text=Clique aqui" alt="..." id="image" style="cursor: pointer">
                                        <input type="file" name='fileImage' id="fileImage" style="display: none" onchange="loadImage1(event)" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar
                                </button>
                                <button type="button " class="btn bg-gray">Cadastrar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer"></div>
        </div>
    </section>
    @endsection

    @section('conteudo-script')
    <script>


      var fileupload1 = $("#fileImage");
      var image1 = $("#image");

      image1.click(function () {
        fileupload1.click();
    });

      var loadImage1 = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('image');
          output.src = reader.result;
          output.width = 150;
          output.height = 100;
      };
      reader.readAsDataURL(event.target.files[0]);
  };


</script>
@endsection

