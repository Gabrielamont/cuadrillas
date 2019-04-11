<div class="modal fade" tabindex="-1" role="dialog" id="editar_vocero_{{ $d->id }}">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form action="{{ route('voceros.update', $d->id) }}" method="POST">
        {{ csrf_field() }}{{ method_field( 'PUT' ) }}
				<div class="panel panel-warning">
					<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
					<div class="panel-heading text-center">
						<h3><i class="fa fa-edit"></i> Editar vocero</h3>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">Cedula</label>
							<input type="text" class="form-control" name="cedula" placeholder="Cedula...." required="" value="{{ $d->cedula }}">
						</div>
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" class="form-control" name="nombre" placeholder="Nombre...." required="" value="{{ $d->nombre }}">
						</div>
						<div class="form-group">
							<label for="">Apellido</label>
							<input type="text" class="form-control" name="apellido" placeholder="apellido...." required="" value="{{ $d->apellido }}">
						</div>
						<div class="form-group">
							<label for="">Telefono</label>
							<input type="text" class="form-control" name="telefono" placeholder="Telefono...." required="" value="{{ $d->telefono }}">
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

