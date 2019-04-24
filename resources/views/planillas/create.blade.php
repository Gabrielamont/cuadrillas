@extends('layouts.app')
@section('title','Planillas - '.config('app.name'))
@section('header','Planillas')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li><a href="{{route('planillas.index')}}" title="Planillas"> Planillas </a></li>
	  <li class="active">Planillas</li>
	</ol>
@endsection
@section('content')
		<!-- Formulario -->
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

			</div>
		</div>

		<div class="row">
	  	<div class="col-md-12">
	    	<div class="box box-success">
		      <div class="box-header with-border">
		        <h3 class="box-title"><i class="fa fa-users"></i> Registrar Planilla</h3>
		        <span class="pull-right"></span>
		       </div>
      			<div class="box-body">
					<form   method="POST" enctype="multipart/form-data" id="form_pad">
					{{ method_field( 'POST' ) }}
					{{ csrf_field() }}
					<input type="hidden" name="id_user" value="{{Auth::user()->id}}">

						<h2 class="text-center">Cuadrillas</h2>
					<hr>
							<div class="col-md-4">
								<div class="form-group {{ $errors->has('razon_social')?'has-error':'' }}">
									<label class="control-label" for="razon_social">Comuna: *</label>
										<select class="form-control" id="comunas">
											<option value="">Seleccione...</option>
											@foreach($comuna as $c)
												<option value="{{$c->id}}">{{$c->nombre}}</option>
											@endforeach
										</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group {{ $errors->has('razon_social')?'has-error':'' }}">
									<label class="control-label" for="razon_social">Consejo Comunal: *</label>
										<select class="form-control" id="select_consejo">

										</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group {{ $errors->has('razon_social')?'has-error':'' }}">
									<label class="control-label" for="razon_social">Sector: *</label>
										<select class="form-control" id="select_sector">

										</select>
								</div>
							</div>
						<div class="field_wrapper row">
							<div class="col-md-3">
								<div class="form-group {{ $errors->has('razon_social')?'has-error':'' }}">
									<label class="control-label" for="razon_social">Nombre: *</label>
										<input id="razon_social" class="form-control" type="text" name="nombre[]" onkeyup="mayus(this);" placeholder="Nombre" required >
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group {{ $errors->has('razon_social')?'has-error':'' }}">
									<label class="control-label" for="razon_social">Apellido: *</label>
										<input id="razon_social" class="form-control" type="text" name="apellido[]" onkeyup="mayus(this);"  placeholder="Apellido" required >
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group {{ $errors->has('razon_social')?'has-error':'' }}">
									<label class="control-label" for="razon_social">Email: *</label>
										<input id="razon_social" class="form-control" type="text" name="email[]"   placeholder="Email" required >
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group {{ $errors->has('razon_social')?'has-error':'' }}">
									<label class="control-label" for="razon_social">Cargo: *</label>
									<input id="razon_social" class="form-control" type="text" name="cargo[]"   placeholder="Cargo" required >
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-1 col-md-offset-5">
						        <a href="javascript:void(0);" class=" btn btn-sm btn-success add_button" title="Add field"><i class="fa fa-plus"></i></a>
						    </div>
						</div>

					</div>

					<div class="form-group text-right">
						<a class="btn btn-flat btn-default" href="{{route('users.index')}}"><i class="fa fa-reply"></i> Atras</a>
						<button class="btn btn-flat btn-primary" type="submit"><i class="fa fa-send"></i> Guardar</button>
					</div>
					<br>
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')

<script type="text/javascript">
	function mayus(e) {//poner datos en mayusula
	    e.value = e.value.toUpperCase();
	}

	$(document).ready(function(){

		//select dinamicos
		$("#comunas").change(function(event) {
			event.preventDefault();


			var url = '{{ route("comuna.dinamico", ":id") }}';
				url = url.replace(':id', $(this).val());

			$.get(url, function(data) {
				var datos = '';
				$.each(data, function(index, val) {
					 datos += '<option value="'+val.id+'">'+val.nombre+'</option>';
				});

				$("#select_consejo").append('<option value="">Seleccione...</option>'+datos);
			});
		});

		$("#select_consejo").change(function(event) {
			event.preventDefault();


			var url = '{{ route("sector.dinamico", ":id") }}';
				url = url.replace(':id', $(this).val());

			$.get(url, function(data) {
				 var datos = '';
				$.each(data, function(index, val) {
					datos += '<option value="'+val.id+'">'+val.nombre+'</option>';
				});
				console.log(datos);
				 $("#select_sector").append('<option value="">Seleccione...</option>'+datos);

			});
		});
		//registrar todo el fomulario
			$("#form_pad").submit(function(e){
				e.preventDefault();
			//alert("fdfdfd")
				$.ajax({
					url: '{{route('planillas.store')}}',
					data: $("#form_pad").serialize(),
					type: 'post',
					dataType: 'json',
					success: function (response) {
						alert(response.msg);
					   window.location.reload();
					},
				});
			}); //fin guardar formulario

/// aqui es para agregar personas
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="remove">'+
    						'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label" for="razon_social">Nombre: *</label>'+
										'<input id="razon_social" class="form-control" type="text" name="nombre[]" onkeyup="mayus(this);" placeholder="Nombre" required>'+
								'</div>'+
							  '</div>'+
								'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label" for="razon_social">Apellido: *</label>'+
										'<input id="razon_social" class="form-control" type="text" name="apellido[]" onkeyup="mayus(this);"  placeholder="Producto" required>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
								 '<label class="control-label" for="razon_social">Email: *</label>'+
								 '<input id="razon_social" class="form-control" type="text" name="email[]"  placeholder="Email" required>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-2">'+
								'<div class="form-group">'+
									'<label class="control-label" for="razon_social">Cargo: *</label>'+
									'<input id="razon_social" class="form-control" type="text" name="cargo[]"  placeholder="Cargo" required>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-1"><div class="form-group"><label class="control-label" for="razon_social">Eliminar: *</label><br><a href="javascript:void(0);" class="btn btn-sm btn-danger remove_button" title="Remove field">X</a></div></div>'+
						 '</div>';

    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        //alert($(this).parent('div'));
        console.log($(this).parent('div'));
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    //fin agregar personas

/// aqui es para agregar acciones
    var maxField_acciones = 10; //Input fields increment limitation
    var addButton_acciones = $('.add_button_acciones'); //Add button selector
    var wrapper_acciones = $('.field_wrapper_acciones'); //Input field wrapper
    var fieldHTML_acciones = '<div class="remove">'+
    					    '<div class="col-md-11">'+
								'<div class="form-group">'+
									'<label class="control-label" for="razon_social">Accion: *</label>'+
										'<input id="razon_social" class="form-control" type="text" name="accion[]" onkeyup="mayus(this);" placeholder="Acción" required >'+
								'</div>'+
							'</div>'+

							'<div class="col-md-1"><div class="form-group"><label class="control-label" for="razon_social">Eliminar: *</label><br><a href="javascript:void(0);" class="btn btn-sm btn-danger remove_button_acciones" title="Remove field">X</a></div></div>'+
						 '</div>';

    var x = 1; //Initial field counter is 1
    $(addButton_acciones).click(function(){ //Once add button is clicked
        if(x < maxField_acciones){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper_acciones).append(fieldHTML_acciones); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button_acciones', function(e){ //Once remove button is clicked
        e.preventDefault();
        //alert($(this).parent('div'));
        console.log($(this).parent('div'));
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    //fin agregar acciones

});
</script>

@endsection
