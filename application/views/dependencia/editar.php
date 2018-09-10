  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li><a href="<?php echo base_url();?>dependencia">Dependencias</a></li>
      <li class="active">Editar</li>
    </ul>
    <!-- /. breadcrumb  -->
    <hr />  
    <?php echo form_open(base_url().'dependencia/editar/'.$item['dep_id']) ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        Dependencia
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" name="dep_nombre" value="<?php echo $item['dep_nombre'];?>" />
            <span class="text-danger"><?php echo form_error('dep_nombre'); ?></span>
          </div>
        

        </div>
        <!-- /. col-md-9  -->


   <div class="col-md-6">
    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Nombre </label>
        <input class="form-control" name="dep_firma_nombre" value="<?php echo  $item['dep_firma_nombre']; ?>" />
         <span class="text-danger"><?php echo form_error('dep_firma_nombre'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 


    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Grado </label>
        <input class="form-control" name="dep_firma_grado" value="<?php echo  $item['dep_firma_grado']; ?>" />
         <span class="text-danger"><?php echo form_error('dep_firma_grado'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 


    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Título</label>
        <input class="form-control" name="dep_firma_titulo" value="<?php echo  $item['dep_firma_titulo']; ?>" />
         <span class="text-danger"><?php echo form_error('dep_firma_titulo'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 
 </div>
    <!-- /. col-md-12  -->
        
      </div> 
      <!-- /. panel-body  -->
      
      <div class="panel-footer">
        <button type="submit" class="btn btn-primary">Editar</button>             
      </div>
      <!--End panel-footer -->
    </div>
    <!-- /. panel panel-primary  -->
  </form>

  
</div>
  <!-- /. PAGE WRAPPER  -->