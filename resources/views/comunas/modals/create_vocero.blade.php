<div class="modal fade" tabindex="-1" role="dialog" id="crear_vocero">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
      <form action="{{ route('voceros.store') }}" method="POST">
        {{ csrf_field() }}
				<div class="panel panel-danger">
					<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
					<div class="panel-heading text-center">
						<h3><i class="fa fa-plus"></i> Nuevo Vocero</h3>
					</div>
					<div class="modal-body">
            <div class="row">
            
            <section id="section_vocero">
    						<div class="form-group col-sm-2">
    							<label for="">Cedula</label>
    							<input type="text" class="form-control" name="cedula" placeholder="Cedula...." required="">
    						</div>
    						
                <div class="form-group col-sm-3">
    							<label for="">Nombre</label>
    							<input type="text" class="form-control" name="nombre" placeholder="Nombre...." required="">
    						</div>
    						
                <div class="form-group col-sm-3">
    							<label for="">Apellido</label>
    							<input type="text" class="form-control" name="apellido" placeholder="Apellido...." required="">
    						</div>
                
                <div class="form-group col-sm-2">
    							<label for="">Telefono</label>
    							<input type="text" class="form-control" name="telefono" placeholder="Telefono....">
    						</div>
            </section>
            
            <div class="form-group col-sm-1">
              <label>---</label>
              <button type="button" class="btn btn-primary" id="btn_add_vocero"><i class="fa fa-plus"></i></button>
            </div>
            
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

