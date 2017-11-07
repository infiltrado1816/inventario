<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li class="active">responsables</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <!-- Advanced Tables -->
  <div class="panel panel-primary">
    <div class="panel-heading">
      Listado de Responsables                        
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th style="width: 26px;">#</th>        
              <th>Nombre</th>
              <th>Apellido</th>
              <th style="width: 26px;"></th>
              <th style="width: 26px;"></th>
            </tr>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($responsables as $responsables_item): ?>
          <tr>
            <td><?php echo $i; ?></td>     
            <td><?php echo $responsables_item['nombre']; ?></td>
            <td><?php echo $responsables_item['apellido']; ?></td>     
            <td><a href="<?php echo base_url()."responsables/editar/".$responsables_item['id']?>">Editar</a></td>
            <td><a href="<?php echo base_url()."responsables/eliminar/".$responsables_item['id']?>">Eliminar</a></td>
          </tr>
          <?php $i++; endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel-footer">
    <a href="<?php echo base_url();?>responsables/nuevo" class="btn btn-primary">Nuevo Responsables</a>
  </div>
  <!--End panel-footer -->
</div>
<!--End Advanced Tables -->
</div>
<!-- /. PAGE WRAPPER  -->