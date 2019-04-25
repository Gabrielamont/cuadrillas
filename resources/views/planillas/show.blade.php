@extends('layouts.app')
@section('title','Cuadrilla - '.config('app.name'))
@section('header','Cuadrilla')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
    <li> cuadrilla </li>
    <li class="active">Ver </li>
  </ol>
@endsection
@section('content')
  <section>
    <a class="btn btn-flat btn-default" href="{{ route('planillas.index') }}"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
    <button class="btn btn-flat btn-danger" data-toggle="modal" data-target="#delModal"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</button>
  </section>

  <section class="perfil">
    <div class="row">
      <div class="col-md-12">
        <h2 class="page-header" style="margin-top:0!important">
          <i class="fa fa-user" aria-hidden="true"></i>
          {{ $planilla->codigo }}
          <small class="pull-right">Registrado: {{ $planilla->created_at }}</small>
          <span class="clearfix"></span>
        </h2>
      </div>
      <div class="col-md-4">
        <h4>Detalles del Usuario</h4>
        <p><b>Comuna: </b> {{$d->comuna->nombre}} </p>
        <p><b>Consejo Comunal: </b> {{$planilla->consejo->nombre}} </p>
      </div>

    </div>
  </section>

  <div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Eliminar usuario</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <form class="col-md-8 col-md-offset-2" action="{{ route('planillas.destroy',[$planilla->id])}}" method="POST">
              {{ method_field( 'DELETE' ) }}
              {{ csrf_field() }}
              <h4 class="text-center">¿Esta seguro de eliminar esta planilla?</h4><br>

              <center>
                <button class="btn btn-flat btn-danger" type="submit">Eliminar</button>
                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cerrar</button>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
