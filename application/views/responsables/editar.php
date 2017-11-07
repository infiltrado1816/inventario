<div id="page-wrapper" >

<ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li><a href="<?php echo base_url();?>clientes">Clientes</a></li>
    <li class="active">Editar</li>
  </ul>
  <!-- /. breadcrumb  -->
  
        
        <hr />  
                    <?php echo form_open(base_url().'clientes/editar/'.$cliente['id']) ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Ficha del Cliente
                        </div>
                        <div class="panel-body">
                          
                          <div class="col-md-6">
                          

                          <div class="form-group">
                            <label>Razon Social</label>
                            <input class="form-control" name="razon" value="<?php echo $cliente['razon'];?>" />
                            <span class="text-danger"><?php echo form_error('razon'); ?></span>
                          </div>
                           <div class="form-group">
                            <label>Giro</label>
                            <input class="form-control" name="giro" value="<?php echo $cliente['giro'];?>" />
                            <span class="text-danger"><?php echo form_error('giro'); ?></span>
                          </div>
                          

                           <div class="form-group">
                            <label>Teléfono</label>
                            <input class="form-control" name="telefono" value="<?php echo $cliente['telefono'];?>" />
                            <span class="text-danger"><?php echo form_error('telefono'); ?></span>
                          </div>

                           <div class="form-group">
                            <label>Dirección</label>
                            <input class="form-control" name="direccion" value="<?php echo $cliente['direccion'];?>" />
                            <span class="text-danger"><?php echo form_error('direccion'); ?></span>
                          </div>

                        </div>
                        <!-- /. col-md-9  -->
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>RUT</label>
                            <input class="form-control" name="rut"  value="<?php echo $cliente['rut'];?>" />
                          </div>

                           <div class="form-group " >
                            <label>Tipo</label>
                            <select class="form-control" name="tipo">
                              <option <?php if($cliente['tipo']=="OFICINA"){echo "selected";}?>>OFICINA</option>
                              <option <?php if($cliente['tipo']=="REPARTO"){echo "selected";}?>>REPARTO</option>                                     
                            </select>
                            </div>

                             <div class="form-group">
                            <label>Correo</label>
                            <input class="form-control" name="correo" value="<?php echo $cliente['correo'];?>" />
                            <span class="text-danger"><?php echo form_error('correo'); ?></span>
                          </div>


                         <!-- /. col-md-3  -->
                        </div>
                        <!-- /. panel-body  -->
                      </div>
                        <div class="panel-footer">
                          <button type="submit" class="btn btn-primary">Editar</button>             
                        </div>
                        <!--End panel-footer -->
                      </div>
                       <!-- /. panel panel-primary  -->
                     </form>

                   
</div>
<!-- /. PAGE WRAPPER  -->