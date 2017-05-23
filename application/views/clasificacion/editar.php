  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li><a href="<?php echo base_url();?>clasificacion">Clasificación</a></li>
      <li class="active">Editar</li>
    </ul>
    <!-- /. breadcrumb  -->
    
    
    <hr />  
    <?php echo form_open(base_url().'clasificacion/editar/'.$item['id']) ?>
    <div class="panel panel-primary">
      <div class="panel-heading">Clasificación</div>
      <div class="panel-body">        
        <div class="col-md-6">     
          <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" name="nombre" value="<?php echo $item['nombre'];?>" />
            <span class="text-danger"><?php echo form_error('nombre'); ?></span>
          </div>
        </div>
        <!-- /. col-md-9  -->        
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