@extends('dashboard.master.index')
@section('first_name',$user['first_name'])
@section('last_name',$user['last_name'])
@section('image',url("storage/users/".$user['image']))
@section('created_at',date('d/m/Y',strtotime($user['created_at'])))
@section('carros','active')
@section('item-2','active')
@section('conteudo-view')
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Carros</h3>
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
                    data-target="#adicionar-carro"><i class="fa fa-plus-circle"></i>&nbsp;
                    Adicionar novo carro
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
                        <img src="{{asset('app-assets/img/carros.png')}}" class="image img-responsive" width="205"
                        height="160">
                        <div class="middle">
                            <div class="row" style="position: relative; left: 130%">
                                <button id="btn-custom" class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                <button id="btn-custom" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                        <h4 class=""><b>> Modelo</b></h4>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="adicionar-carro">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-safari"></i>&nbsp; Adicionar novo carro</h4>
                            </div>

                            <div class="modal-body">
                                 {!! Form::open(['method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                                <div class="input-group margin-bottom">
                                {!! Form::number('mileage', null, ['class'=>'form-control', 'placeholder'=>'Quilometragem','id'=> 'mileage']); !!}
                                    <span class="input-group-addon">KM</span>
                                </div>

                                <div class="form-group">
                                {!! Form::number('year', null, ['class'=>'form-control', 'placeholder'=>'Ano', 'id'=>'year' ]); !!}
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Unico dono : </label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{!! Form::radio('only_owner', 'sim', false, ['class'=>'minimal']) !!}
                                            Sim</label>
                                        </div>
                                        <div class="col-md-2">
                                            <label>{!! Form::radio('only_owner', 'não', false, ['class'=>'minimal']) !!}
                                            Não</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! Form::select('fuel', ['gasolina' => 'Gasolina','alcool' => 'Alcool','flex' => 'Flex',],null, ['class'=> 'form-control','placeholder' => 'Combustivel']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Foto do veiculo: </label>
                                    <div class="timeline-body">
                                        <img src="http://placehold.it/200x150?text=Clique aqui" alt="..." id="imgFileUpload" style="cursor: pointer">
                                        <input type="file" name='imageFile' id="FileUpload" style="display: none" onchange="loadImage1(event)" />
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
        var fileupload1 = $("#FileUpload");
        var image1 = $("#imgFileUpload");

        image1.click(function () {
            fileupload1.click();
        });

        var loadImage1 = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
              var output = document.getElementById('imgFileUpload1');
              output.src = reader.result;
              output.width = 150;
              output.height = 100;
          };
          reader.readAsDataURL(event.target.files[0]);
      };
  </script>
  @endsection
