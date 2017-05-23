<div id="page-wrapper" >

  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li class="active">Abonos</li>
  </ul>
  <!-- /. breadcrumb  -->     
  <hr />  
  <!-- Advanced Tables -->
  <div class="panel panel-primary">
    <div class="panel-heading">       
      Listado de Abonos
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th style="width: 26px;">#</th>
              <th>Fecha</th>
              <th>Monto</th>
              <th>Forma de Pago</th>
             
            </tr>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($abonos as $abonos_item): ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo date("d-m-Y",strtotime($abonos_item['fecha'])); ?></td>
            <td><?php echo number_format($abonos_item['monto'],0,',','.'); ?></td>
            <td><?php echo $abonos_item['forma_pago']; ?></td>
            
            
          </tr>
          <?php $i++; endforeach ?>

        </tbody>
      </table>
    </div>
  </div>
  <div class="panel-footer">
    <a href="<?php echo base_url();?>abonos/nuevo" class="btn btn-primary">Nuevo Abono</a>            
  </div>
  <!--End panel-footer -->

</div>
<!--End Advanced Tables -->

</div>
<!-- /. PAGE WRAPPER  -->