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
        <span class="info-box-icon bg-green"><i class="fa fa-arrows"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><a href="{{route('comunas.index')}}">Comunas creadas</a></span>
          <span class="info-box-number">{{ count($comunas) }}</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-navy"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><a href="{{route('cc.index')}}">Consejos comunales</a></span>
          <span class="info-box-number">{{ count($cc) }}</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Voceros</span>
          <span class="info-box-number">{{ count($voceros) }}</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Sectores</span>
          <span class="info-box-number">{{ count($sectores) }}</span>
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
				<a href="{{ route('pdfComuna') }}" class="btn btn-flat bg-purple" target="_blank">
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
					                    <a href="{{route('comuna.pdf',['id' => $d->id])}}" class="btn btn-danger btn-xs" title="pdf" d>
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
	</div>
  @include("comunas.modals.create_comuna")

  <!--Consejos comunales  -->
  <div class="row">
  	<div class="col-md-12">
    	<div class="box box-danger">
	      <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-users"></i> Consejos comunales</h3>
	        <span class="pull-right">
            <a href="{{ route('pdfCC') }}" class="btn btn-flat bg-purple" target="_blank">
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
									<td class="success">{{ $d->comuna->nombre }}</td>
									<td>
										<a href="#" class="btn btn-warning btn-xs" title="Editar" data-toggle="modal" data-target="#editar_cc_{{ $d->id }}">
					                      <i class="fa fa-edit"></i> editar
					                    </a>
					                    <a href="#" class="btn btn-primary btn-xs" title="agregar sector" data-toggle="modal" data-target="#crear_sector_{{ $d->id }}">
					                      <i class="fa fa-plus"></i> agregar sector
					                    </a>
					                     <a href="#" class="btn btn-danger btn-xs" title="pdf" d>
					                      <i class="fa fa-print"></i> pdf
					                    </a>

									</td>
								</tr>
								  @include("comunas.modals.create_sector")
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	 <!-- Sectores  -->
  <div class="row">
  	<div class="col-md-12">
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
							@foreach($sectores as $d)
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
            <a href="{{ route('pdfVocero') }}" class="btn btn-flat bg-purple" target="_blank">
              <i class="fa fa-file-o" aria-hidden="true"></i> Descargar
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
								<th class="text-center bg-danger">C.C.</th>
								<th class="text-center">Accion</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($voceros as $d)
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
  @include("comunas.modals.create_vocero")
@endsection
@section("script")
<script>

contar_voceros = 1;

// añadir mas voceros
$("#btn_add_vocero").click(function(event) {

  	contar_voceros++;

    $("#nuevo_vocero").append("<div id='nuevo_vocero"+contar_voceros+"'></div>");
    $("#nuevo_vocero"+contar_voceros+"").html($("#section_vocero").html());
    $("#nuevo_vocero"+contar_voceros+" input#cedula1").removeAttr("id").attr('id', 'cedula'+contar_voceros);

    $("#nuevo_vocero"+contar_voceros+"").append(
      "<div class='form-group col-sm-1'>"+
      "<label>---</label><br>"+
          "<button class='btn btn-danger' type='button' id='btn_delete_modelo"+contar_voceros+"'>"+
              "<i class='fa fa-remove'></i>"+
          "</button>"+
      "</div>");

    $('#btn_delete_modelo'+contar_voceros+'').click(function(e){
      e.preventDefault();
      $('#nuevo_vocero'+contar_voceros+'').remove();
      contar_voceros--;
    });

});

// busqueda de cc
$('#comuna').change(function(event) {
  $("#icon-loading").fadeIn(400);
  $("#cc").empty();
	$.get("cc/buscar/"+event.target.value+"",function(response, dep){
		for (i = 0; i<response.length; i++) {
				$("#cc").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
		}
    $("#icon-loading").hide(400);
	});
});

// guardar voceros
$("#form_voceros").on('submit', function(e) {
	e.preventDefault();
	err = 0;

	$.each($('.cedula'),function(index, val){
		cedula = $(val).val();
		id_cedula = $(val).attr('id');
		$.each($('.cedula'),function(index2, val2){
			 if(cedula == $(val2).val() && id_cedula !=  $(val2).attr('id')){
				 $(this).css('border','red 2px solid');
				 err++
			 }
		});
	});

	if(err > 0){
      mensajes('Alerta!', "hay 2 o mas cedulas iguales", 'fa-warning', 'red');
			return false;
	}else{
		btn = $(".btn_save_vocero").attr("disabled", 'disabled');
		form = $(this);

		$.ajax({
			url: "{{ route('voceros.store') }}",
			headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
			type: 'POST',
			dataType: 'JSON',
			data: form.serialize(),
		})
		.done(function(data) {
        form[0].reset();
        mensajes('Listo!', 'Guardado con exito', 'fa-check', 'green');
				btn.removeAttr("disabled");
				location.reload();
		})
		.fail(function(data) {
			btn.removeAttr("disabled");
			mensajes('Alerta!', eachErrors(data), 'fa-warning', 'red');
		})
		.always(function() {
			console.log("complete");
		});
	}

});


</script>
@endsection
