@extends("layouts.master")

@section('title', 'API | ViaCEP')

@section('body')

    <div class="card mx-auto">

        <div class="card-body">

            {!! Form::open(['id' => 'form-create', 'route' => 'create.address', 'method' => 'post']) !!}

            <div class="form-group-check mb-5">
                <div class="form-check form-check-inline">
                    {!! Form::radio('viacep_manual', '1', false, ['class' => 'form-check-input', 'id' => 'viacep_manual1']) !!}
                    {!! Form::label('viacep_manual1', 'Via cep', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check form-check-inline">
                    {!! Form::radio('viacep_manual', '2', true, ['class' => 'form-check-input', 'id' => 'viacep_manual2']) !!}
                    {!! Form::label('viacep_manual2', 'Manual', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            @if ($errors->all())
                @if ($errors->all())
                    <div class="alert alert-danger notification-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            @endif

            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <li>{{ Session::get('success') }}</li>
                </div>
            @endif

            <div class="row">
                <div class="form-group col-md-3">
                    {!! Form::label('cep', 'cep', ['class' => 'control-label']) !!}
                    {!! Form::text('cep', null, ['id' => 'cep', 'class' => 'form-control' . $errors->first('cep', ' is-invalid'), 'autocomplete' => 'off']) !!}
                    @error('cep')<span class="invalid-feedback">{{ $errors->first('cep') }}</span>@enderror
                </div>
                <div class="form-group col-md-3">
                    {!! Form::label('city', 'cidade', ['class' => 'control-label']) !!}
                    {!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control' . $errors->first('city', ' is-invalid'), 'autocomplete' => 'off']) !!}
                    @error('city')<span class="invalid-feedback">{{ $errors->first('city') }}</span>@enderror
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('street', 'rua', ['class' => 'control-label']) !!}
                    {!! Form::text('street', null, ['id' => 'street', 'class' => 'form-control' . $errors->first('street', ' is-invalid'), 'autocomplete' => 'off']) !!}
                    @error('street')<span class="invalid-feedback">{{ $errors->first('street') }}</span>@enderror
                </div>
                <div class="col-md-2 mb-2 mt-4">
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-custom-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card mt-4 mx-auto">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cep</th>
                            <th>Cidade</th>
                            <th>Rua</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addresses as $address)
                            <tr>
                                <td>{{ $address->cep }}</td>
                                <td>{{ $address->city }}</td>
                                <td>{{ $address->street }}</td>
                                <td>
                                    {!! Form::open(['id' => 'form-delete', 'route' => ['delete.address', $address->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Excluir', ['class' => 'btn btn-delete-custom', 'id' => 'btn-delete-submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

