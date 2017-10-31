<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li><a href="<?php echo base_url().'articulo';?>">Articulos</a></li>
    <li class="active">Ficha</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <div class="panel panel-primary">
    <div class="panel-heading">
      Artículo
    </div>
   

    <div class="row panel-body">
      <div class="col-md-6">
      <div class="form-group " >
        <label>Descripción</label>
        <input class="form-control" name="descripcion" value="<?php echo $item['descripcion']; ?>" />
      </div>
      <div class="form-group " >
        <label>Número Emco</label>
        <input class="form-control" name="numeroemco" value="<?php echo $item['numeroemco']; ?>" />
      </div>
      <div class="form-group " >
        <label>Número de Serie</label>
        <input class="form-control" name="serie" value="<?php echo $item['serie']; ?>" />
      </div>
      <div class="form-group " >
        <label>Número de Factura</label>
        <input class="form-control" name="factura" value="<?php echo $item['factura']; ?>" />
      </div>
    
      </div>
      
      <div class="col-md-6 ">
        <div class='row  panel-body'>
              <div>
                <label>Imagen</label>
              </div>  
        </div>
      <div class='row  panel-body'>  
              <img src="<?php echo base_url();?>assets/uploads/thumbs/<?php echo 'img'.$item['id'].'_thumb.jpg';?>" width='400px' height='600px' class="img-responsive" alt="Responsive image">
      </div>
      <div class='row  panel-body'>
            <!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
                  <?=@$error?>
              <div id="formulario_imagenes">
                  <span><?php echo validation_errors(); ?></span>

                  <?=form_open_multipart(base_url()."articulo/do_upload/".$item['id'])?>
                  <div class="row">
                  <div class="col-md-6">
                  <input class="btn btn-default" type="file" name="userfile" />
                  </div>
                  <div class="col-md-6">   
                  <input class="btn btn-primary" type="submit" value="Subir imágenes" />
                  </div>
                </div>
              <?=form_close()?>
              </div>

      </div>
      </div>
    </div>
    <!-- /. panel-body  -->



    <div class="panel-footer">
    </div>
    <!--End panel-footer -->
    </div>
    <!-- /. panel panel-primary  -->


    <div class="panel panel-primary">
    <div class="panel-heading">
      Historial
    </div>
    <div class="panel-body">
   

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th style="width: 26px;">#</th>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Destino</th>                
                <th>Originador</th>
                <th>Observación</th>
              </tr>
            </tr>
          </thead>
          <tbody>

            <?php $i=1; foreach ($historial as $historial_item): ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $historial_item['fecha']; ?></td>
              <td><?php echo $historial_item['tipo']; ?></td>
              <td><?php echo $historial_item['nombre']; ?></td>
              <td><?php echo $historial_item['login']; ?></td>
              <td><?php echo $historial_item['observacion']; ?></td>
              
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>



    </div>
    <!-- /. panel-body  -->
    <div class="panel-footer">
    </div>
    <!--End panel-footer -->
    </div>
    <!-- /. panel panel-primary  -->

</div>
<!-- /. PAGE WRAPPER  -->