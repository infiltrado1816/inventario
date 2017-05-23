<div id="page-wrapper" >

<ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li><a href="<?php echo base_url();?>clientes">Clientes</a></li>
    <li class="active">Ficha</li>
  </ul>
  <!-- /. breadcrumb  -->
  
        
        <hr />  

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Ficha del Cliente
                        </div>
                        <div class="panel-body">

                          <div class="col-md-6">
                          <form class="form-horizontal">
                        
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Razón</label>
                             <div class="col-sm-9"><input class="form-control" value="<?php echo $cliente['razon'];?>" /></div>
                          </div>

                            <div class="form-group">
                            <label class="col-sm-3 control-label">Giro</label>
                             <div class="col-sm-9"><input class="form-control" value="<?php echo $cliente['giro'];?>" /></div>
                          </div>
                                              
                          <div class="form-group">
                            <label class="col-sm-3 control-label">RUT</label>
                             <div class="col-sm-9"><input class="form-control" value="<?php echo $cliente['rut'];?>" /></div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Tipo</label>
                             <div class="col-sm-9"><input class="form-control" value="<?php echo $cliente['tipo'];?>" /></div>
                          </div>
                        </form> 
                      </div>
                          <div class="col-md-6">
                         <form class="form-horizontal">

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Teléfono</label>
                             <div class="col-sm-9"><input class="form-control" value="<?php echo $cliente['telefono'];?>" /></div>
                          </div>
                        
                         <div class="form-group">
                            <label class="col-sm-3 control-label">Dirección</label>
                             <div class="col-sm-9"><input class="form-control" value="<?php echo $cliente['direccion'];?>" /></div>
                          </div>

                            <div class="form-group">
                            <label class="col-sm-3 control-label">Correo</label>
                             <div class="col-sm-9"><input class="form-control" value="<?php echo $cliente['correo'];?>" /></div>
                          </div>
                      
                       </form>
                     </div>
  

                        
                       
            
                        </div>
                        <!-- /. panel-body  -->
                      </div>
                       <!-- /. panel panel-primary  -->

                       <div class="panel panel-primary">
                        <div class="panel-heading">
                            Facturas 
                        </div>
                        <div class="panel-body">



                           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
              <tr>
                <th style="width: 26px;">#</th>
                <th>Nº Factura</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Deuda</th>
                <th>Estado</th>
                <th style="width: 26px;"></th>
              </tr>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($facturas as $facturas_item): ?>
           <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $facturas_item['numero']; ?></td>
            <td><?php echo date("d-m-Y",strtotime($facturas_item['fecha'])); ?></td>
            <td><?php echo number_format($facturas_item['monto'],0,',','.'); ?></td>
             <td><?php echo  number_format($facturas_item['deuda'],0,',','.'); ?></td>
            <td><?php echo $facturas_item['estado']; ?></td>
            <td>
              <a href="<?php echo base_url()."facturas/ficha/".$facturas_item['id']?>">Detalles</a>
            </td>
          </tr>
        <?php $i++; endforeach ?>

      </tbody>
    </table>

                        </div>
                         <!-- /. panel-body  -->
                         <div class="panel-footer">
    <a href="<?php echo base_url()."facturas/nuevo/".$cliente['id'] ?>" class="btn btn-primary">Agregar Factura</a> 
    <a href="<?php echo base_url()."informes/deudas/".$cliente['id'] ?>" target="_blank" class="btn btn-warning">Imprimir Pendiente</a>

  </div>
  <!--End panel-footer -->

                      </div>
                       <!-- /. panel panel-primary  -->
</div>
<!-- /. PAGE WRAPPER  -->