<div class="modal fade" tabindex="-1" role="dialog" id="crear_cc_{{ $d->id }}">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form action="{{ route('cc.store') }}" method="POST">
        {{ csrf_field() }}
				<div class="panel panel-success">
					<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
					<div class="panel-heading text-center">
						<h3><i class="fa fa-plus"></i> Nuevo Consejo Comunal</h3>
					</div>
					<div class="modal-body">
            <input type="hidden" name="comuna_id" value="{{ $d->id }}">  
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
      </form>
		</div>
	</div>
</div>

