<div class="modal fade" tabindex="-1" role="dialog" id="crear_vocero">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
      <form id="form_voceros">
        {{ csrf_field() }}
				<div class="panel panel-danger">
					<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
					<div class="panel-heading text-center">
						<h3><i class="fa fa-plus"></i> Nuevo Vocero</h3>
					</div>
					<div class="modal-body">
            <div class="row">
              
              <div class="form-group col-sm-6">
                <label>Comuna</label>
                <select class="form-control" id="comuna" required>
                  <option value="">Seleccione...</option>
                  @foreach($comunas as $c)
                  <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-group col-sm-6">
                <label>Consejos Comunales <span id="icon-loading" style="display:none;"><i class="fa fa-spinner fa-spin text-primary"></i></span></label>
                <select class="form-control cc" name="cc_id" id="cc" required>
                </select>
              </div>
            
            </div>
            
            <div class="row well">
            
            <section id="section_vocero">
    						<div class="form-group col-sm-3">
    							<label for="">Cedula</label>
    							<input type="text" class="form-control cedula" name="cedula[]" placeholder="Cedula...." required="" id="cedula1">
    						</div>
    						
                <div class="form-group col-sm-3">
    							<label for="">Nombre</label>
    							<input type="text" class="form-control" name="nombre[]" placeholder="Nombre...." required="">
    						</div>
    						
                <div class="form-group col-sm-3">
    							<label for="">Apellido</label>
    							<input type="text" class="form-control" name="apellido[]" placeholder="Apellido...." required="">
    						</div>
                
                <div class="form-group col-sm-2">
    							<label for="">Telefono</label>
    							<input type="text" class="form-control" name="telefono[]" placeholder="Telefono....">
    						</div>
            </section>
            
            <div class="form-group col-sm-1">
              <label>---</label><br>
              <button type="button" class="btn btn-primary" id="btn_add_vocero"><i class="fa fa-plus"></i></button>
            </div>
            
            <div id="nuevo_vocero"></div>
            
            </div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-group text-right">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
						<button type="submit" class="btn btn-success btn_save_vocero">
							<i class="fa fa-save"></i> Crear
						</button>
					</div>
				</div>
      </form>
		</div>
	</div>
</div>

