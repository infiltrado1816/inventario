<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li><a href="<?php echo base_url();?>clientes">Clientes</a></li>
    <li class="active">Nuevo</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <?php echo form_open(base_url().'clientes/nuevo') ?>
  <div class="panel panel-primary">
    <div class="panel-heading">
     Datos del Cliente
   </div>
   <div class="panel-body">

    <div class="col-md-6">
      

       <div class="form-group " >
        <label>Razón Social</label>
        <input class="form-control" name="razon" value="<?php echo set_value('razon'); ?>" />
         <span class="text-danger"><?php echo form_error('razon'); ?></span>
      </div>

      <div class="form-group " >
        <label>Giro</label>
        <input class="form-control" name="giro" value="<?php echo set_value('giro'); ?>" />
         <span class="text-danger"><?php echo form_error('giro'); ?></span>
      </div>
      

      <div class="form-group " >
        <label>Correo</label>
        <input class="form-control" name="correo" value="<?php echo set_value('correo'); ?>" />
         <span class="text-danger"><?php echo form_error('correo'); ?></span>
      </div>
      <div class="form-group " >
        <label>Dirección</label>
        <input class="form-control" name="direccion" value="<?php echo set_value('direccion'); ?>" />
         <span class="text-danger"><?php echo form_error('direccion'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  -->               
    <div class="col-md-6">
      <div class="form-group " >
        <label>RUT Empresa</label>
        <input class="form-control" name="rut" id="rut_demo_1" value="<?php echo set_value('rut'); ?>" />
        <span class="text-danger"><?php echo form_error('rut'); ?></span>
      </div>
      <div class="form-group " >
        <label>Tipo</label>
        <select class="form-control" name="tipo">
          <option <?php echo set_select('tipo', 'OFICINA'); ?> >OFICINA</option>
          <option <?php echo set_select('tipo', 'REPARTO'); ?> >REPARTO</option>                                     
        </select>
      </div>
      <div class="form-group " >
        <label>Teléfono</label>
        <input class="form-control" name="telefono" value="<?php echo set_value('telefono'); ?>" />
         <span class="text-danger"><?php echo form_error('telefono'); ?></span>
      </div>
    </div>

    

    <!-- /. col-md-6    -->
  </div>
  <!-- /. panel-body  -->
  <div class="panel-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>             
  </div>
  <!--End panel-footer -->
</div>
<!-- /. panel panel-primary  -->






<?php echo form_close(); ?>
</div>
<!-- /. PAGE WRAPPER  -->