  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li class="active">Plancheta Dependencia</li>
    </ul>
    <!-- /. breadcrumb  -->
    <hr />  
           <div class="form-group " >
            <?php echo form_open(base_url().'plancheta/dependencia') ?> 
                    <label for="disabledTextInput">Dependencias</label>
                    <select class="form-control" onchange="this.form.submit()" name="dep_id">
                    <option ></option>
                    <?php $i=1; foreach ($dependencia_item as $dependencias): ?>
                    <option value="<?php echo $dependencias['dep_id']; ?>" <?php if($dep_id==$dependencias['dep_id']){echo "selected";}?> ><?php echo $dependencias['dep_nombre']; ?></option>
                    <?php $i++; endforeach ?>                                  
                    </select>
                <?php echo form_close(); ?>
              </div>
           
    <!-- Advanced Tables -->
    <div class="panel panel-primary">
      <div class="panel-heading">

        Articulos de la dependencia
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
                 <th>Responsable</th>
              </tr>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($item as $articulos): ?>
            <tr>
              <td><?php  if($articulos['art_prestamo']==1){ echo '<i title="Elemento en prestamo" class="fa fa-handshake-o fa-1x"></i>'; }else{echo $i;} ?></td>
              <td><?php echo $articulos['art_numeroemco']; ?></td>
              <td><?php echo $articulos['cla_nombre']; ?></td>
              <td><?php echo $articulos['art_descripcion']; ?></td>
              <td><?php echo $articulos['art_serie']; ?></td>
               <td><?php echo $articulos['res_apellido']." ".$articulos['res_nombre'];  ?></td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>
  </div>
    </div>

    <div class="panel-footer">
    
      <?php echo form_open(base_url().'plancheta/pdf_dependencias') ?>    
      <input type="hidden" name="dep_id" value="<?php echo $dep_id; ?> ">
        <button type="submit"  class="btn btn-primary">Exportar a XLS</button>   
      <?php echo form_close(); ?>
<br>
      <?php $attributes = array('target' => '_blank');?>
       <?php echo form_open(base_url().'plancheta/plancheta_dependencia',$attributes) ?>    
        <input type="hidden" name="dep_id" value="<?php echo $dep_id; ?> ">
        <button type="submit"  class="btn btn-primary">Generar Plancheta Para Imprimir</button>   
      <?php echo form_close(); ?>
    </div>
    <!--End panel-footer -->
  </div>
  <!--End Advanced Tables -->
</div>
  <!-- /. PAGE WRAPPER  -->