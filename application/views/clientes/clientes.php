<div id="page-wrapper" >

<ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li class="active">Clientes</li>
  </ul>
  <!-- /. breadcrumb  -->
  
        
        <hr />  


        <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                          
                            Listado de Clientes
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
              <tr>
                <th style="width: 26px;">#</th>
                
                <th>Razon Social</th>
                <th>RUT</th>
                <th>Tipo</th>
                <th style="width: 26px;"></th>
                 <th style="width: 26px;"></th>
              </tr>
            </tr>
          </thead>
          <tbody>

            <?php $i=1; foreach ($clientes as $clientes_item): ?>
           <tr>
            <td><?php echo $i; ?></td>
           
            <td><?php echo $clientes_item['razon']; ?></td>
            <td><?php echo $clientes_item['rut']; ?></td>
            <td><?php echo $clientes_item['tipo']; ?></td>
            
            <td><a href="<?php echo base_url()."clientes/ficha/".$clientes_item['id']?>">Ver</a></td>
            <td><a href="<?php echo base_url()."clientes/editar/".$clientes_item['id']?>">Editar</a></td>
          </tr>
        <?php $i++; endforeach ?>

      </tbody>
    </table>
  </div>

                              </div>

<div class="panel-footer">
                            <a href="<?php echo base_url();?>clientes/nuevo" class="btn btn-primary">Nuevo Cliente</a>
                        
                        </div>
                         <!--End panel-footer -->

                    </div>
                    <!--End Advanced Tables -->

</div>
<!-- /. PAGE WRAPPER  -->