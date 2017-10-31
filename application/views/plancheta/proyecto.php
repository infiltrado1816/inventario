  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li class="active">Proyecto</li>
    </ul>
    <!-- /. breadcrumb  -->
    
    
    <hr />  

<div class="panel-body">
           <div class="form-group " >
          
            <?php echo form_open(base_url().'plancheta/proyecto') ?>
               
                <div class="col-md-1">
                  <label>proyectos</label>
                </div>
                <div class="col-md-3">
                    
                    <select class="form-control" onchange="this.form.submit()" name="proyectos_id">
                    <option ></option>
                    <?php $i=1; foreach ($proyecto_item as $proyecto): ?>
                    <option value="<?php echo $proyecto['id']; ?>" <?php if($proyecto_id==$proyecto['id']){echo "selected";}?> ><?php echo $proyecto['nombre']; ?></option>
                    <?php $i++; endforeach ?>                                  
                    </select>
                </div>
                <div class="col-md-2">
                     <button type="submit"  class="btn btn-primary">Buscar</button> 
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>


    <!-- Advanced Tables -->
    <div class="panel panel-primary">
      <div class="panel-heading">

        
        Articulos de la proyecto
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 26px;">#</th>
                <th style="width: 100px;">N° EMCO</th>
                <th>Clasificación</th>
                <th>Descripción</th>
                <th style="width: 200px;">N° serie</th>
                 <th>Dependencia</th>
              </tr>
            </tr>
          </thead>
          <tbody>

            <?php $i=1; foreach ($item as $articulos): ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $articulos['numeroemco']; ?></td>
              <td><?php echo $articulos['clasificacionesnombre']; ?></td>
              <td><?php echo $articulos['descripcion']; ?></td>
              <td><?php echo $articulos['serie']; ?></td>
              <td><?php echo $articulos['nombre']; ?></td>
            
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>

    </div>

    <div class="panel-footer">
   </div>
    <!--End panel-footer -->

  </div>
  <!--End Advanced Tables -->

</div>
  <!-- /. PAGE WRAPPER  -->