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
                    <select class="form-control" onchange="this.form.submit()" name="dependencias_id">
                    <option ></option>
                    <?php $i=1; foreach ($dependencia_item as $dependencias): ?>
                    <option value="<?php echo $dependencias['id']; ?>" <?php if($dependencias_id==$dependencias['id']){echo "selected";}?> ><?php echo $dependencias['nombre']; ?></option>
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
              <td><?php  if($articulos['prestamo']==1){ echo '<i title="Elemento en prestamo" class="fa fa-handshake-o fa-1x"></i>'; }else{echo $i;} ?></td>
              <td><?php echo $articulos['numeroemco']; ?></td>
              <td><?php echo $articulos['clasificacionesnombre']; ?></td>
              <td><?php echo $articulos['descripcion']; ?></td>
              <td><?php echo $articulos['serie']; ?></td>
               <td><?php echo $articulos['responsables_apellido']." ".$articulos['responsables_nombre'];  ?></td>
            
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>



      <div class="col-md-6">
    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Nombre </label>
        <input class="form-control" name="firma_nombre" value="<?php echo  $dependencia['firma_nombre']; ?>" />
         <span class="text-danger"><?php echo form_error('firma_nombre'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 


    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Grado </label>
        <input class="form-control" name="firma_grado" value="<?php echo  $dependencia['firma_grado']; ?>" />
         <span class="text-danger"><?php echo form_error('firma_grado'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 


    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Título</label>
        <input class="form-control" name="firma_titulo" value="<?php echo  $dependencia['firma_titulo']; ?>" />
         <span class="text-danger"><?php echo form_error('firma_titulo'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 
 </div>
    <!-- /. col-md-12  -->

    <div class="col-md-6">
    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Nombre </label>
        <input class="form-control" name="firma_nombre" value="<?php echo  $dependencia['firma_nombre']; ?>" />
         <span class="text-danger"><?php echo form_error('firma_nombre'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 


    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Grado </label>
        <input class="form-control" name="firma_grado" value="<?php echo  $dependencia['firma_grado']; ?>" />
         <span class="text-danger"><?php echo form_error('firma_grado'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 


    <div class="col-md-12">
      <div class="form-group " >
        <label>Firma Título</label>
        <input class="form-control" name="firma_titulo" value="<?php echo  $dependencia['firma_titulo']; ?>" />
         <span class="text-danger"><?php echo form_error('firma_titulo'); ?></span>
      </div>
    </div>
    <!-- /. col-md-6  --> 
 </div>
    <!-- /. col-md-12  -->


   
  </div>
    </div>

    <div class="panel-footer">
      <?php echo form_open(base_url().'plancheta/pdf_dependencias') ?>    
      <input type="hidden" name="dependencias_id" value="<?php echo $dependencias_id; ?> ">
        <button type="submit"  class="btn btn-primary">Generar Plancheta</button>   
      <?php echo form_close(); ?>

    </div>
    <!--End panel-footer -->

  </div>
  <!--End Advanced Tables -->

</div>
  <!-- /. PAGE WRAPPER  -->