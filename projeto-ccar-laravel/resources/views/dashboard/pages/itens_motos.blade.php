@extends('dashboard.master.index')
@section('first_name',$user['first_name'])
@section('last_name',$user['last_name'])
@section('image',url("storage/users/".$user['image']))
@section('created_at',date('d/m/Y',strtotime($user['created_at'])))
@section('itens_motos','active')
@section('item-1','active')
@section('conteudo-view')

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Itens</h3>
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
                    data-target="#adicionar-item"><i class="fa fa-plus-circle"></i>&nbsp;
                    Adicionar novo item
                </button>
            </div>
            <div class="col-md-3" style="float: right">
                {!! Form::open(['route'=>['item.search'],'method'=>'post']) !!}
                <div class="input-group">
                    {!! Form::text('pesquisar',null,['placeholder' => 'Pesquisar ..','id'=>'pesquisar','class'=>'form-control']) !!}
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search" class="btn btn-vk bg-navy"><i
                            class="fa fa-search"></i></button>
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <br>

            <table id="example" class="table table-bordered table-hover text-center ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has('search'))
                    @foreach(Session::get('search') as $procura)
                    <tr>
                        <td style="width: 5%">{{$procura['id']}}</td>
                        <td style="width: 20%">{{$procura['name']}}</td>
                        <td style="width: 20%">{{$procura['type']}}</td>
                        <td style="width: 10%" class="text-center">
                            {!! Form::open(['route'=>['item.destroy', $procura['id']],'method'=>'delete']) !!}
                            <a type="button" id="btn-iten" class="btn btn-flat bg-gray" alt="editar"
                            href="{{route('item.edit',$procura['id'])}}"><i class="fa fa-pencil"></i></a>&nbsp;
                            <button type="submit" id="btn-iten" class="btn btn-danger active btn-flat" alt="remover"><i
                                class="fa fa-trash-o"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @foreach($itens as $row)
                        <tr>
                            <td style="width: 5%">{{$row->id}}</td>
                            <td style="width: 20%">{{$row->name}}</td>
                            <td style="width: 20%">{{$row->type}}</td>
                            <td style="width: 10%" class="text-center">
                                {!! Form::open(['route'=>['item.destroy',$row['id']],'method'=>'delete']) !!}
                                <a type="button" id="btn-iten" class="btn btn-flat bg-gray" alt="editar"
                                href="{{route('item.edit',$row['id'])}}"><i class="fa fa-pencil"></i></a>&nbsp;
                                <button type="submit" id="btn-iten" class="btn btn-danger active btn-flat" alt="remover"><i
                                    class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    <div class="modal fade" id="adicionar-item">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-wrench"></i>&nbsp; Adicionar novo item</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['route'=>'item.store','method'=>'post'] )!!}
                                        <div class="form-group @error('name') has-error @enderror" id="name_div">
                                            {!! Form::text('name',null,['placeholder' => 'Nome do item','id'=>'name','class'=>'form-control','autocomplete'=>'off']) !!}
                                            @error('name')
                                            <h5 id="name_erro" class="error">{{ $errors->first('name') }}</h5>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('type') has-error @enderror" id="type_div">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    {!! Form::select('type', ['Gasolina' => 'Gasolina','Alcool' => 'Alcool','Flex' => 'Flex',],null, ['class'=> 'form-control','placeholder' => 'Combustivel','id'=>'type']) !!}
                                                </div>
                                            </div>
                                            @error('type')
                                            <h5 id="type_erro" class="error">{{ $errors->first('type') }}</h5>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::submit('Fechar', ['class' => 'btn btn-danger pull-left','data-dismiss'=>'modal']); !!}
                                        {!! Form::submit('Cadastrar', ['class' => 'btn bg-gray']); !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>  

                        @if(Session::has('item'))
                        <div class="modal fade" id="alterar-item">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"><i class="fa fa-wrench"></i>&nbsp; Editar item </h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => ['item.update', Session::get('item')['id']], 'method'=> 'put']) !!}
                                            <div class="form-group @error('name') has-error @enderror" id="name_div">
                                                {!! Form::text('name', Session::get('item')['name'] , ['placeholder'=>'Nome do item', 'class' =>'form-control','id'=>'name']); !!}
                                                @error('name')
                                                <h5 id="name_erro" class="error">{{ $errors->first('name') }}</h5>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('type') has-error @enderror" id="type_div">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        {!! Form::select('type',['Gasolina' => 'Gasolina','Alcool' => 'Alcool','Flex' => 'Flex',],Session::get('item')['type'],['class'=> 'form-control','placeholder' => 'Combustivel','id'=>'type']) !!}
                                                    </div>
                                                </div>
                                                @error('type')
                                                <h5 id="type_erro" class="error">{{ $errors->first('type') }}</h5>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::submit('Fechar', ['class' => 'btn btn-danger pull-left','data-dismiss'=>'modal']); !!}
                                            {!! Form::submit('Alterar', ['class' => 'btn bg-gray']); !!}
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

                    $('#adicionar-item').on('hidden.bs.modal', function () {
                        $("#name_erro").text(null);
                        $("#type_erro").text(null);
                        $("#name_div").removeClass('has-error');
                        $("#type_div").removeClass('has-error');
                        $("#type").val(null);
                    });

                    $('#alterar-item').on('hidden.bs.modal', function () {
                        $("#name_erro").text(null);
                        $("#type_erro").text(null);
                        $("#name_div").removeClass('has-error');
                        $("#type_div").removeClass('has-error');
                        $("#type").val(null);
                    });

                    @if(Session::has('item'))
                    $('#alterar-item').modal('show');
                    @elseif(Session::has('create'))
                    $('#adicionar-item').modal('show');
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

             </script>
             @endsection
