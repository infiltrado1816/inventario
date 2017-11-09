<div id="page-wrapper" >

<ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li><a href="<?php echo base_url();?>usuarios">Usuarios</a></li>
    <li class="active">Editar</li>
  </ul>
  <!-- /. breadcrumb  -->
  
        
        <hr />  
                    <?php echo form_open(base_url().'usuarios/editar/'.$id_usuario) ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Cambiar Contraseña de Usuario
                        </div>
                        <div class="panel-body">
                          
                          <div class="col-md-6">
                          

                          <div class="form-group">
                            <label>Nueva Clave</label>
                            <input autocomplete="off" class="form-control" name="password" />
                            <span class="text-danger"><?php echo form_error('razon'); ?></span>
                          </div>
                       


                         <!-- /. col-md-3  -->
                        </div>
                        <!-- /. panel-body  -->
                      </div>
                        <div class="panel-footer">
                          <button type="submit" class="btn btn-primary">Guardar Cambios</button>             
                        </div>
                        <!--End panel-footer -->
                      </div>
                       <!-- /. panel panel-primary  -->
                     </form>

                   
</div>
<!-- /. PAGE WRAPPER  -->