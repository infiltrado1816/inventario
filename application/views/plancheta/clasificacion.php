  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li class="active">Planchetas Clasificación</li>
    </ul>
    <!-- /. breadcrumb  -->
    <hr />  
<div class="panel-body">
           <div class="form-group " >
            <?php echo form_open(base_url().'plancheta/clasificacion') ?>
                <div class="col-md-1">
                  <label>Clasificaciones</label>
                </div>
                <div class="col-md-3">
                    <select class="form-control" onchange="this.form.submit()" name="cla_id">
                    <option ></option>
                    <?php $i=1; foreach ($clasificacion_item as $clasificacion): ?>
                    <option value="<?php echo $clasificacion['cla_id']; ?>" <?php if($cla_id==$clasificacion['cla_id']){echo "selected";}?> ><?php echo $clasificacion['cla_nombre']; ?></option>
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
        Articulos de la clasificacion
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
                  <th>Responsable</th>
              </tr>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($item as $articulos): ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $articulos['art_numeroemco']; ?></td>
              <td><?php echo $articulos['cla_nombre']; ?></td>
              <td><?php echo $articulos['art_descripcion']; ?></td>
              <td><?php echo $articulos['art_serie']; ?></td>
              <td><?php echo $articulos['dep_nombre']; ?></td>
              <td><?php echo $articulos['res_apellido']." ".$articulos['res_nombre']; ?></td>
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