<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li><a href="<?php echo base_url();?>proyecto">Proyecto</a></li>
    <li class="active">Nuevo</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <?php echo form_open(base_url().'proyecto/nuevo') ?>
  <div class="panel panel-primary">
    <div class="panel-heading">
     Datos de la Proyecto
   </div>
   <div class="panel-body">

    <div class="col-md-6">
      

       <div class="form-group " >
        <label>Nombre</label>
        <input class="form-control" name="pro_nombre" value="<?php echo set_value('pro_nombre'); ?>" />
         <span class="text-danger"><?php echo form_error('pro_nombre'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  -->               
   
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