<div id="page-wrapper" >

<ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li class="active">usuarios</li>
  </ul>
  <!-- /. breadcrumb  -->
        <hr />  
        <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Listado de Usuarios  
                          </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
              <tr>
                <th style="width: 26px;">#</th>
                
                <th>Acceso</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>perfil</th>
                
                <th style="width: 26px;"></th>
                 <th style="width: 26px;"></th>
              </tr>
            </tr>
          </thead>
          <tbody>

            <?php $i=1; foreach ($usuarios as $usuarios_item): ?>
           <tr>
            <td><?php echo $i; ?></td>
           
            <td><?php echo $usuarios_item['usu_login']; ?></td>
            <td><?php echo $usuarios_item['usu_nombre']; ?></td>
            <td><?php echo $usuarios_item['usu_apellido']; ?></td>
            <td><?php echo $usuarios_item['usu_perfil']; ?></td>
            
            
            <td><a href="<?php echo base_url()."usuarios/ficha/".$usuarios_item['usu_id']?>">Editar</a></td>
            <td><a href="<?php echo base_url()."usuarios/editar/".$usuarios_item['usu_id']?>">Password</a></td>
          </tr>
        <?php $i++; endforeach ?>

      </tbody>
    </table>
  </div>

                              </div>

<div class="panel-footer">
                            <a href="<?php echo base_url();?>usuarios/nuevo" class="btn btn-primary">Nuevo Usuario</a>
                        
                        </div>
                         <!--End panel-footer -->

                    </div>
                    <!--End Advanced Tables -->

</div>
<!-- /. PAGE WRAPPER  -->