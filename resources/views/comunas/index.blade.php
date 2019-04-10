@extends('layouts.app')
@section('title','Comunas - '.config('app.name'))
@section('header','Comunas')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li class="active"> Comunas </li>
	</ol>
@endsection
@section('content')
	@include('partials.flash')
	<!-- Info boxes -->
  <div class="row">
    
  	<div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Comunas creadas</span>
          <span class="info-box-number">{{ count($comunas) }}</span>
        </div>
      </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Consejos comunales</span>
          <span class="info-box-number">{{ count($cc) }}</span>
        </div>
      </div>
    </div>
    
  </div>
  

  <!-- Comunas  -->
	<div class="row">
  	<div class="col-md-12">
    	<div class="box box-danger">
	      <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-users"></i> Comunas</h3>
	        <span class="pull-right">
						<a href="#" data-target="#create_comuna" data-toggle="modal" class="btn btn-flat btn-success">
              <i class="fa fa-plus" aria-hidden="true"></i> Nueva comuna
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
								<th class="text-center">Accion</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($comunas as $d)
              @include("comunas.modals.editar_comuna")
              @include("comunas.modals.crear_cc")
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{{ $d->nombre }}</td>
									<td>{{ $d->descripcion }}</td>
									<td>
										<a href="#" class="btn btn-warning btn-xs" title="Editar" data-toggle="modal" data-target="#editar_comuna_{{ $d->id }}">
                      <i class="fa fa-edit"></i> editar
                    </a>
										<a href="#" class="btn btn-primary btn-xs" title="agregar consejos comunales" data-toggle="modal" data-target="#crear_cc_{{ $d->id }}">
                      <i class="fa fa-plus"></i> agregar cc
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
  @include("comunas.modals.create_comuna")
	
  <!--Consejos comunales  -->
  <div class="row">
  	<div class="col-md-12">
    	<div class="box box-danger">
	      <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-users"></i> Consejos comunales</h3>
	        <span class="pull-right">
					</span>
	      </div>
      	<div class="box-body">
					<table class="table data-table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Nombre</th>
								<th class="text-center">Descripcion</th>
								<th class="text-center bg-success">Comuna</th>
								<th class="text-center">Accion</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($cc as $d)
              @include("comunas.modals.editar_cc")
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{{ $d->nombre }}</td>
									<td>{{ $d->descripcion }}</td>
									<td class="bg-success">{{ $d->comuna->nombre }}</td>
									<td>
										<a href="#" class="btn btn-warning btn-xs" title="Editar" data-toggle="modal" data-target="#editar_cc_{{ $d->id }}">
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
  
  
  <!-- voceros  -->
  <div class="row">
  	<div class="col-md-12">
    	<div class="box box-danger">
	      <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-users"></i> Voceros</h3>
	        <span class="pull-right">
            <a href="#" data-target="#crear_vocero" data-toggle="modal" class="btn btn-flat btn-danger">
              <i class="fa fa-plus" aria-hidden="true"></i> Nueva vocero
            </a>
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
								<th class="text-center">Accion</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($voceros as $d)
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{{ $d->cedula }}</td>
									<td>{{ $d->nombre }}</td>
									<td>{{ $d->apelido }}</td>
									<td>{{ $d->telefono }}</td>
									<td>
										<a href="#" class="btn btn-warning btn-xs" title="Editar" data-toggle="modal" data-target="#editar_cc_{{ $d->id }}">
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
  @include("comunas.modals.create_vocero")
@endsection
@section("script")
<script>

contar_voceros = 1;

// añadir mas modelos
$("#btn_add_vocero").click(function(event) {

  	contar_voceros++;

  	$("#section_vocero").append("<div id='div_campos"+contar_voceros+"'></div>");
    
    $("#div_campos"+contar_voceros+"").html($("#section_vocero").html());
    
    $("#div_campos"+contar_voceros+"").append(
      "<div class='form-group col-sm-1 text-left' style='padding: 1.8em;'>"+
          "<button class='btn btn-danger' type='button' id='btn_delete_modelo"+contar_voceros+"'>"+
              "<i class='fa fa-remove'></i>"+
          "</button>"+
      "</div>");

    $('#btn_delete_modelo'+contar_voceros+'').click(function(e){
      e.preventDefault();
      $('#div_campos'+contar_voceros+'').remove();
      contar_voceros--;
    });

});


</script>
@endsection