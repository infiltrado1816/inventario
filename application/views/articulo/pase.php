<div id="page-wrapper" >
<ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Inicio</a></li>
  <li class="active">Pase</li>
</ul>
<!-- /. breadcrumb  -->
<hr />  
<!-- Advanced Tables -->
  <div class="panel panel-primary">
        <div class="panel-body">
         <div class="form-group " >
        
          <?php echo form_open(base_url().'articulo/buscar/pase') ?>
             
              <div class="col-md-1">
                <label>Clasificación</label>
              </div>
              <div class="col-md-3">
                  <select class="form-control" onchange="this.form.submit()" name="cla_id">
                  <option ></option>
                  <?php $i=1; foreach ($item as $clasificacion): ?>
                  <option value="<?php echo $clasificacion['cla_id']; ?>"><?php echo $clasificacion['cla_nombre']; ?></option>
                  <?php $i++; endforeach ?>                                  
                  </select>
              </div>
               <div class="col-md-2">
                   <button type="submit"  class="btn btn-primary">Buscar</button> 
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
    <div class="panel-heading">
      Listado de Artículos Encontrados 
       </div>
<?php echo form_open(base_url().'articulo/pase') ?>
<div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th style="width: 26px;">#</th>
              <th style="width: 100px;">N° EMCO</th>
              <th>Artículo</th>
              <th>Descripción</th>
              <th style="width: 200px;">N° serie</th>
              <th style="width: 200px;">Dependencia</th>
              <th style="width: 26px;"></th>
            </tr>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($articulos as $articulo): ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $articulo['art_numeroemco']; ?></td>
            <td><?php echo $articulo['cla_nombre']; ?></td>
            <td><?php echo $articulo['art_descripcion']; ?></td>
            <td><?php echo $articulo['art_serie']; ?></td>
            <td><?php echo $articulo['dep_nombre']; ?></td>
            <td><div class="radio"><label><input type="radio" name="art_id" value="<?php echo $articulo['art_id']?>"></label></div></td>
          </tr>
          <?php $i++; endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel-footer">
    <span class="text-danger"><?php echo form_error('art_id'); ?></span>
  </div>
  <!--End panel-footer -->
</div>
<!--End Advanced Tables -->
<div class="panel panel-primary">
  <div class="panel-heading">
  Seleccione  Dependencia
 </div>
 <div class="panel-body">
  <div class="col-md-6">
    <div class="col-md-12">
    
      <div class="form-group " >
      <label>Dependencia</label>
      <select class="form-control" name="dep_id">
        <?php $i=1; foreach ($dependencias as $dependencia): ?>
        <option value="<?php echo $dependencia['dep_id']; ?>" ><?php echo $dependencia['dep_nombre']; ?></option>
        <?php $i++; endforeach ?>                                  
      </select>
    </div>
<div class="form-group " >
      <label>Responsable</label>
      <select class="form-control" name="res_id">
        <?php $i=1; foreach ($responsables as $responsable): ?>
        <option value="<?php echo $responsable['res_id']; ?>" ><?php echo $responsable['res_apellido']." ".$responsable['res_nombre']; ?></option>
        <?php $i++; endforeach ?>                                  
      </select>
    </div>

    <div class="form-group " >
        <label>Obseraciones</label>
       <textarea name="his_observacion" class="form-control" rows="3"></textarea>
         <span class="text-danger"><?php echo form_error('his_observacion'); ?></span>
      </div>
</div>
  <!-- /. col-md-3  -->  
  </div>
  <!-- /. col-md-6  -->   
</div>
<!-- /. panel-body  -->
<div class="panel-footer">
  <button type="submit" class="btn btn-primary ">Realizar Pase</button>             
</div>
<!--End panel-footer -->
</div>
<!-- /. panel panel-primary  -->
<?php echo form_close(); ?>
</div>
<!-- /. PAGE WRAPPER  -->