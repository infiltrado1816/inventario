<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li><a href="<?php echo base_url().'articulo';?>">Articulos</a></li>
    <li class="active">Editar</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <?php echo form_open(base_url().'articulo/editar/'.$id_articulo) ?>
   
 <div id="signupbox" style=" margin-top:5px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Datos de Articulo</div>
            </div>  
            <div class="panel-body" >
                <form method="post" action=".">
                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                            

                    <form  class="form-horizontal" method="post" >
                           <div class="form-group " >
        <label>Clasificación</label>
        <select class="form-control" name="cla_id">
         <option value=""></option>
          <?php $i=1; foreach ($item as $clasificacion): ?>
          <option value="<?php echo $clasificacion['cla_id']; ?>" <?php if($clasificacion['cla_id']===$articulo['cla_id']){ echo 'selected';} ?>><?php echo $clasificacion['cla_nombre']; ?> </option>
          <?php $i++; endforeach ?>                                  
        </select>
        <span class="text-danger"><?php echo form_error('cla_id'); ?></span>
      </div>
    <div class="form-group " >
        <label>Descripción</label>
        <input class="form-control" name="art_descripcion" value="<?php echo $articulo['art_descripcion']; ?>" />
         <span class="text-danger"><?php echo form_error('art_descripcion'); ?></span>
      </div>

      <div class="form-group " >
        <label>Número Emco</label>
        <input class="form-control" name="art_numeroemco" value="<?php echo $articulo['art_numeroemco']; ?>" />
         <span class="text-danger"><?php echo form_error('art_numeroemco'); ?></span>
      </div>


      <div class="form-group " >
        <label>Número de Serie</label>
        <input class="form-control" name="art_serie" value="<?php echo $articulo['art_serie']; ?>" />
         <span class="text-danger"><?php echo form_error('art_serie'); ?></span>
      </div>

      <div class="form-group " >
        <label>Factura</label>
        <input class="form-control" name="art_factura" value="<?php echo $articulo['art_factura']; ?>" />
         <span class="text-danger"><?php echo form_error('art_factura'); ?></span>
      </div>

      <div class="form-group " >
        <label>Proyecto</label>
        <select class="form-control" name="pro_id">
         <option value=""></option>
          <?php $i=1; foreach ($proyectos as $proyecto): ?>
          <option value="<?php echo $proyecto['pro_id']; ?>" <?php if($proyecto['pro_id']===$articulo['pro_id']){ echo 'selected';} ?>><?php echo $proyecto['pro_nombre']; ?> </option>
          <?php $i++; endforeach ?>                                  
        </select>
        <span class="text-danger"><?php echo form_error('pro_id'); ?></span>
      </div>
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                              <button type="submit" class="btn btn btn-primary">Guardar</button>    
                                
                            </div>
                        </div> 
                            
                    </form>

                </form>
            </div>
        </div>
    </div> 
</div>
<?php echo form_close(); ?>
</div>
<!-- /. PAGE WRAPPER  -->