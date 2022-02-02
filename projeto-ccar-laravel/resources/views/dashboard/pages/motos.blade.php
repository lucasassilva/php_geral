@extends('dashboard.master.index')
@section('first_name',$user['first_name'])
@section('last_name',$user['last_name'])
@section('image',url("storage/users/".$user['image']))
@section('created_at',date('d/m/Y',strtotime($user['created_at'])))
@section('motos','active')
@section('item-1','active')
@section('conteudo-view')
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Motos</h3>
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
                    data-target="#adicionar-moto"><i class="fa fa-plus-circle"></i>&nbsp;
                    Adicionar nova moto
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
                @foreach($motos->toArray() as $row)
                <div class="col-md-3">
                    <div class="box-header">
                        <small class="label label-default">FABRICANTE</small>
                    </div>
                    <div class="box-body overlays">
                        <img src="{{ url("storage/motorcycles/{$row['image']}") }}" class="image img-responsive" width="205"
                        height="160">
                        <div class="middle">
                            <div class="row" style="position: relative;left:130%">
                                {!! Form::open(['route'=>['motorcycles.destroy', $row['id']],'method'=>'delete']) !!}
                                <a id="btn-custom" type="button" class="btn btn-default" alt="editar"
                                href="{{route('motorcycles.edit',$row['id'])}}"><i class="fa fa-pencil"></i></a>&nbsp;
                                <button id="btn-custom" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <h4><b>Modelo</b></h4>
                    </div>
                </div>
                @endforeach
            </div>


            <div class="modal fade" id="adicionar-moto">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-motorcycle"></i>&nbsp; Adicionar nova moto</h4>
                            </div>

                            <div class="modal-body">
                                {!! Form::open(['route'=>'motorcycles.store','method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                                <div class="form-group @error('mileage') has-error @enderror" id="mileage_div">
                                    <div class="input-group">
                                        {!! Form::number('mileage', null, ['class'=>'form-control', 'placeholder'=>'Quilometragem','id'=> 'mileage']); !!}
                                        <span class="input-group-addon">KM</span>
                                    </div>
                                    @error('mileage')
                                    <h5 id="mileage_erro" class="error">{{ $errors->first('mileage') }}</h5>
                                    @enderror
                                </div>
                                <div class="form-group @error('year') has-error @enderror" id="year_div">
                                    {!! Form::number('year', null, ['class'=>'form-control', 'placeholder'=>'Ano', 'id'=>'year' ]); !!}
                                    @error('year')
                                    <h5 id="year_erro" class="error">
                                        {{ $errors->first('year') }}</h5>
                                        @enderror
                                    </div>

                                    <div class="form-group @error('only_owner') has-error @enderror" id="owner_div">
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
                                        @error('only_owner')
                                        <h5 id="owner_erro" class="error">{{ $errors->first('only_owner') }}</h5>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('type') has-error @enderror" id="type_div">
                                        <div class="row">
                                            <div class="col-md-4">
                                                {!! Form::select('type', ['gasolina' => 'Gasolina','alcool' => 'Alcool','flex' => 'Flex',],null, ['class'=> 'form-control','placeholder' => 'Combustivel','id'=>'type']) !!}
                                            </div>
                                        </div>
                                        @error('type')
                                        <h5 id="type_erro" class="error">{{ $errors->first('type') }}</h5>
                                        @enderror
                                    </div>
                                    
                                    @if($itens->toArray())
                                    <div class="form-group margin-bottom">
                                        <label class="control-label">Itens do veículo:</label>
                                        <div class="row">
                                            @foreach ($itens as $row)
                                            <div class="col-md-4">
                                                <label>
                                                    {!! Form::checkbox('item_id[]', $row['id'], false) !!}
                                                    {{$row['name']}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label">Foto do veiculo: </label>
                                        <div class="timeline-body">
                                            <img src="http://placehold.it/200x150?text=Clique aqui" alt="..." id="image" style="cursor: pointer">
                                            <input type="file" name='fileImage' id="fileImage" style="display: none" onchange="loadImage1(event)" />
                                        </div>
                                    </div>
                                    @error('fileImage')
                                    <h5 id="image_erro" class="error">{{ $errors->first('fileImage') }}</h5>
                                    @enderror
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
                    
                @if(Session::has('motorcycle'))
                    <div class="modal fade" id="alterar-moto">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-safari"></i>&nbsp; Editar moto</h4>
                                    </div>

                                    <div class="modal-body">
                                        {!! Form::open(['route'=>['motorcycles.store',Session::get('motorcycle')['id']],'method'=>'put', 'enctype'=>'multipart/form-data']) !!}
                                        <div class="form-group @error('mileage') has-error @enderror" id="mileage_div">
                                            <div class="input-group">
                                                {!! Form::number('mileage', null, ['class'=>'form-control', 'placeholder'=>'Quilometragem','id'=> 'mileage']); !!}
                                                <span class="input-group-addon">KM</span>
                                            </div>
                                            @error('mileage')
                                            <h5 id="mileage_erro" class="error">{{ $errors->first('mileage') }}</h5>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('year') has-error @enderror" id="year_div">
                                            {!! Form::number('year', null, ['class'=>'form-control', 'placeholder'=>'Ano', 'id'=>'year' ]); !!}
                                            @error('year')
                                            <h5 id="year_erro" class="error">
                                                {{ $errors->first('year') }}</h5>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('only_owner') has-error @enderror" id="owner_div">
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
                                                @error('only_owner')
                                                <h5 id="owner_erro" class="error">{{ $errors->first('only_owner') }}</h5>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('type') has-error @enderror" id="type_div">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        {!! Form::select('type', ['gasolina' => 'Gasolina','alcool' => 'Alcool','flex' => 'Flex',],null, ['class'=> 'form-control','placeholder' => 'Combustivel','id'=>'type']) !!}
                                                    </div>
                                                </div>
                                                @error('type')
                                                <h5 id="type_erro" class="error">{{ $errors->first('type') }}</h5>
                                                @enderror
                                            </div>

                                            @if($itens->toArray())
                                            <div class="form-group margin-bottom">
                                                <label class="control-label">Itens do veículo:</label>
                                                <div class="row">
                                                    @foreach ($itens as $row)
                                                    <div class="col-md-4">
                                                        <label>
                                                            {!! Form::checkbox('id_item[]', $row['id'], false) !!}
                                                            {{$row['name']}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif

                                            <div class="form-group">
                                                <label class="control-label">Foto do veiculo: </label>
                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/200x150?text=Clique aqui" alt="..." id="image" style="cursor: pointer">
                                                    <input type="file" name='fileImage' id="fileImage" style="display: none" onchange="loadImage1(event)" />
                                                </div>
                                            </div>
                                            @error('fileImage')
                                            <h5 id="image_erro" class="error">{{ $errors->first('fileImage') }}</h5>
                                            @enderror
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
                            @endif
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </section>
                @endsection

                @section('conteudo-script')
                <script>

                    $('#adicionar-moto').on('hidden.bs.modal', function () {
                        $("#mileage_erro").text(null);
                        $("#year_erro").text(null);
                        $("#owner_erro").text(null);
                        $("#type_erro").text(null);
                        $("#image_erro").text(null);
                        $("#mileage_div").removeClass('has-error');
                        $("#year_div").removeClass('has-error');
                        $("#owner_div").removeClass('has-error');
                        $("#type_div").removeClass('has-error');
                        $("#type").val(null);
                    });

                    @if(Session::has('motorcycle'))
                    $('#alterar-moto').modal('show');
                    @elseif(Session::has('create'))
                    $('#adicionar-moto').modal('show');
                    @endif


                    toastr.options = {
                        "closeButton": true,
                        "positionClass": "toast-bottom-right",
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "progressBar": true,
                        "hideMethod": "fadeOut"
                    }

                    @if(Session::has('success'))
                    toastr["success"]("{{Session::get('success')}}")
                    @elseif(Session::has('error'))
                    toastr["error"]("{{Session::get('error')}}")
                    @endif

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
