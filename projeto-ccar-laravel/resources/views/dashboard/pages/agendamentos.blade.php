@extends('dashboard.master.index')
@section('first_name',$user['first_name'])
@section('last_name',$user['last_name'])
@section('image',url("storage/users/".$user['image']))
@section('created_at',date('d/m/Y',strtotime($user['created_at'])))
@section('agendamentos', 'active')
@section('conteudo-view')
<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Agendamentos</h3>
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
          data-target="#adicionar-evento"><i class="fa fa-plus-circle"></i>&nbsp;
          Adicionar novo evento
        </button>
      </div>

      <div class="col-md-12" >
        <div class="box-body no-padding">
         <div id="calendar"></div>
       </div>
     </div>

     <div class="modal fade" id="adicionar-evento">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-wrench"></i>&nbsp; Adicionar novo evento</h4>
            </div>
            <div class="modal-body">
              {!! Form::open(['route'=>'events.store','method'=>'post'] )!!}
              <div class="form-group @error('title') has-error @enderror" id="title_div">
                {!! Form::text('title',null,['placeholder' => 'Nome do Evento','class'=>'form-control','autocomplete'=>'off','id'=>'title']) !!}
                @error('title')
                <h5 id="title_erro" class="error">{{ $errors->first('title') }}</h5>
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
    </div>
  </div>
</div>
</section>
@endsection

@section('conteudo-script')
<script>

  $('#adicionar-evento').on('hidden.bs.modal', function () {
    $("#title_erro").text(null);
    $("#title_div").removeClass('has-error');
  });


  @if(Session::has('create'))
  $('#adicionar-evento').modal('show');
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



 $('#calendar').fullCalendar({

  header    : {
    left  : 'prev,next today',
    center: 'title',
    right : 'month,agendaWeek,agendaDay'
  },

  buttonText: {
    today: 'Hoje',
    month: 'Mês',
    week : 'Semana',
    day  : 'Dia'
  },
 
      events    : [
      @foreach($event as $row)
      {
        id             : '{{ $row->id }}',
        title          : '{{ $row->title }}',
        start          :  new Date('{{ $row->start }}'),
        end            :  new Date('{{ $row->end }}'),
        allDay         :  true,
        //stick        :  true,
        //url          : 'http://google.com/',
        backgroundColor: '#f56954', //red
        borderColor    : '#f56954' //red
      },
      @endforeach
      ],

      editable  : true,
      droppable : true,
      //selectable:true,

      eventClick: function(event){
        alert(event.start);
      }

        /*select:function(event){
          $('#adicionar-evento').modal('show');
        }*/

      })
    </script>
    @endsection

