@extends('dashboard.master.index')
@section('first_name',$user['first_name'])
@section('last_name',$user['last_name'])
@section('image',url("storage/users/".$user['image']))
@section('created_at',date('d/m/Y',strtotime($user['created_at'])))
@section('conteudo-view')
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Inicio</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        {!! Form::open(['route'=>'dashboard.profile','class'=>'py-2','method'=>'put','enctype'=>'multipart/form-data']) !!}
        <input type="hidden" name="id" value="{{$id}}">
        <img style="width: 260px;height: 250px;" id="image" class="profile-user-img img-responsive img-circle" src={{ url("storage/users/{$user['image']}") }}  alt="User profile picture" >
        @error('fileImage')
        <h5 class="error text-center">{{ $errors->first('fileImage')}}</h5>
        @enderror
        <input type="file" id="fileImage" name="fileImage" style="display: none" onchange="loadImage1(event)" />
        <h3 class="profile-username text-center">{{ $user['first_name'] }} {{ $user['last_name'] }}</h3>
        <p class="text-muted text-center">{{ $user['email'] }}</p>
        <div class="row">
            <div class="col-md-6 centered">
               <ul class="list-group list-group-unbordered">
                  <div class="form-group col-md-12 @error('first_name') has-error @enderror">
                    {!! Form::label('first_name', 'Nome:') !!}
                    {!! Form::text('first_name',$user['first_name'],['placeholder' => 'Nome','id'=>'first_name','class'=>'form-control','autocomplete'=>'off']) !!}
                    @error('first_name')
                    <h5 class="error">{{ $errors->first('first_name') }}</h5>
                    @enderror
                </div>
                <div class="form-group col-md-12 @error('last_name') has-error @enderror">
                    {!! Form::label('last_name', 'Sobrenome:') !!}
                    {!! Form::text('last_name',$user['last_name'],['placeholder' => 'Sobrenome','id'=>'last_name','class'=>'form-control','autocomplete'=>'off']) !!}
                    @error('last_name')
                    <h5 class="error">{{ $errors->first('last_name') }}</h5>
                    @enderror
                </div>
                <div class="form-group col-md-12 @error('email') has-error @enderror ">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email',$user['email'],['placeholder' => 'E-mail','id'=>'email','class'=>'form-control','autocomplete'=>'off']) !!}
                    @error('email')
                    <h5 class="error">{{ $errors->first('email') }}</h5>
                    @enderror
                </div>
            </ul>
            <div class="form group col-md-12"> 
                {!! Form::submit('Salvar', ['class' => 'btn btn-lg btn-primary btn-block']); !!}
                <br>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="box-footer"></div>
</div>
</section>
@endsection

@section('conteudo-script')
<script>

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

