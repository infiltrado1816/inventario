<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<table class="table table-striped table-bordered table-hover">
	
            <thead>
              <tr>
                <th>#</th>
                <th>N EMCO</th>
                <th>Articulo</th>
                <th>Descripcion</th>
                <th>N serie</th>
               
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
            
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
