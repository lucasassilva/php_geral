@extends('dashboard.master.index')
@section('first_name',$user['first_name'])
@section('last_name',$user['last_name'])
@section('image',url("storage/users/".$user['image']))
@section('created_at',date('d/m/Y',strtotime($user['created_at'])))
@section('fabricantes_carros', 'active')
@section('item-2','active')
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
    <div class="box-footer"></div>
    </div>
</section>
@endsection

@section('conteudo-script')
<script>
if (window.location.hash === "#_=_"){
    history.replaceState 
        ? history.replaceState(null, null, window.location.href.split("#")[0])
        : window.location.hash = "";
}
</script>
@endsection

