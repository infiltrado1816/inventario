<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li class="active">Retorno</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
<!-- Advanced Tables -->
    <div class="panel panel-primary">
         <div class="panel-heading">
        Listado de Articulos en Prestamo
      </div>
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
              <td><?php echo $articulo['numeroemco']; ?></td>
              <td><?php echo $articulo['clasificacionesnombre']; ?></td>
              <td><?php echo $articulo['descripcion']; ?></td>
              <td><?php echo $articulo['serie']; ?></td>
              <td><?php echo $articulo['nombre']; ?></td>
              <?php echo form_open(base_url().'articulo/retorno') ?>
               <input type="hidden" name="dependencias_id" value="<?php echo $articulo['dependencias_id'];?>">
               <input type="hidden" name="id_articulo" value="<?php echo $articulo['id_articulo'];?>">
              <td> <button type="submit" class="btn btn-primary ">Realizar Retorno</button>   </td>
              <?php echo form_close(); ?>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="panel-footer">
      <span class="text-danger"><?php echo form_error('id_articulo'); ?></span>
    </div>
    <!--End panel-footer -->
  </div>
  <!--End Advanced Tables --> 
  <div class="panel-footer">
  </div>
  <!--End panel-footer -->
</div>
<!-- /. PAGE WRAPPER  -->