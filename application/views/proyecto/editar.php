  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li><a href="<?php echo base_url();?>proyecto">Proyectos</a></li>
      <li class="active">Editar</li>
    </ul>
    <!-- /. breadcrumb  -->
    
    
    <hr />  
    <?php echo form_open(base_url().'proyecto/editar/'.$item['pro_id']) ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        Proyecto
      </div>
      <div class="panel-body">
        
        <div class="col-md-6">
          

          <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" name="pro_nombre" value="<?php echo $item['pro_nombre'];?>" />
            <span class="text-danger"><?php echo form_error('pro_nombre'); ?></span>
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