<div class="modal fade" tabindex="-1" role="dialog" id="editar_comuna_{{ $d->id }}">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form action="{{ route('comunas.update', $d->id) }}" method="POST">
        {{ csrf_field() }}{{ method_field( 'PUT' ) }}
				<div class="panel panel-warning">
					<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
					<div class="panel-heading text-center">
						<h3><i class="fa fa-edit"></i> Editar comuna</h3>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" class="form-control" name="nombre" placeholder="Nombre...." required="" value="{{ $d->nombre }}">
						</div>
						<div class="form-group">
							<label for="">Descripcion</label>
							<textarea name="descripcion" class="form-control">{{ $d->descripcion }}</textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-group text-right">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
						<button type="submit" class="btn btn-warning">
							<i class="fa fa-save"></i> Editar
						</button>
					</div>
				</div>
      </form>
		</div>
	</div>
</div>

