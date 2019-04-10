<form action="{{ route('comunas.store') }}" method="POST">
{{ csrf_field() }}
<div class="modal fade" tabindex="-1" role="dialog" id="create_comuna">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
				<div class="panel panel-success">
					<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
					<div class="panel-heading text-center">
						<h3><i class="fa fa-plus"></i> Nueva comuna</h3>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" class="form-control" name="nombre" placeholder="Nombre...." required="">
						</div>
						<div class="form-group">
							<label for="">Descripcion</label>
							<textarea name="descripcion" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-group text-right">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-save"></i> Crear
						</button>
					</div>
				</div>
		</div>
	</div>
</div>
</form>

