@extends('layouts.app')
@section('title','Consejo Comunal - '.config('app.name'))
@section('header','Consejo Comunal')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li> Consejo Comunal </li>
	  <li class="active">Ver </li>
	</ol>
@endsection
@section('content')
	<!-- <section>
    <a class="btn btn-flat btn-default" href="{{ route('users.index') }}"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
    <a class="btn btn-flat btn-success" href="{{ route('users.edit',[$cc->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
    <button class="btn btn-flat btn-danger" data-toggle="modal" data-target="#delModal"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</button>
	</section> -->

	<section class="perfil">
		<div class="row">
    	<div class="col-md-12">
    		<h2 class="page-header" style="margin-top:0!important">
          <i class="fa fa-user" aria-hidden="true"></i>
          {{ $cc->nombre }}
          <small class="pull-right">Registrado: {{ $cc->created_at }}</small>
          <span class="clearfix"></span>
        </h2>
    	</div>
			<div class="col-md-4">
				<h4>Detalles del Usuario</h4>
				<p><b>Comuna: </b> {{$cc->nombre}} </p>
        <p><b>Descripcion: </b> {{$cc->descripcion}} </p>
			</div>
		</div>
	</section>

    <!-- Sectores  -->
  <div class="row">
    <div class="col-md-5">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-users"></i> Sectores</h3>
          <span class="pull-right">
              <a href="#" class="btn btn-flat bg-purple" target="_blank">
                <i class="fa fa-file-o" aria-hidden="true"></i> Descargar
              </a>
      </span>
        </div>
        <div class="box-body">
          <table class="table data-table table-bordered table-hover table-condensed">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center bg-success">Consejo Comunal</th>
                <th class="text-center">Accion</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach($cc->sectores as $d)
                    @include("comunas.modals.editar_sector")
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $d->nombre }}</td>
                  <td>{{ $d->descripcion }}</td>
                  <td class="success">{{ $d->consejo->nombre }}</td>
                  <td>
                    <a href="#" class="btn btn-warning btn-xs" title="Editar" data-toggle="modal" data-target="#editar_sector_{{ $d->id }}">
                                <i class="fa fa-edit"></i> editar
                              </a>
                               <a href="#" class="btn btn-danger btn-xs" title="pdf" d>
                                <i class="fa fa-print"></i> pdf
                              </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-7">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-users"></i> Voceros</h3>
          <span class="pull-right">
          <!--   <a href="#" data-target="#crear_vocero" data-toggle="modal" class="btn btn-flat btn-danger">
              <i class="fa fa-plus" aria-hidden="true"></i> Nueva vocero
            </a> -->
          <!--   <a href="{{ route('pdfVocero') }}" class="btn btn-flat bg-purple" target="_blank">
              <i class="fa fa-file-o" aria-hidden="true"></i> Descargar
            </a> -->
          </span>
        </div>
        <div class="box-body">
          <table class="table data-table table-bordered table-hover table-condensed">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Cedula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Telefono</th>
                <th class="text-center bg-danger">C.C.</th>
                <th class="text-center">Accion</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach($cc->voceros as $d)
                @include("comunas.modals.editar_vocero")
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $d->cedula }}</td>
                  <td>{{ $d->nombre }}</td>
                  <td>{{ $d->apellido }}</td>
                  <td>{{ $d->telefono ? $d->telefono : '---' }}</td>
                  <td class="danger">{{ $d->cc->nombre }}</td>
                  <td>
                    <a href="#" class="btn btn-warning btn-xs" title="Editar" data-toggle="modal" data-target="#editar_vocero_{{ $d->id }}">
                      <i class="fa fa-edit"></i> editar
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<!-- 	<div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Eliminar usuario</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <form class="col-md-8 col-md-offset-2" action="{{ route('users.destroy',[$cc->id])}}" method="POST">
              {{ method_field( 'DELETE' ) }}
              {{ csrf_field() }}
              <h4 class="text-center">¿Esta seguro de eliminar este usuario?</h4><br>

              <center>
                <button class="btn btn-flat btn-danger" type="submit">Eliminar</button>
                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cerrar</button>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->
@endsection