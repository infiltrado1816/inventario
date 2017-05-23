<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li><a href="<?php echo base_url();?>abonos">Abonos</a></li>
    <li class="active">Nuevo</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <?php echo form_open(base_url().'abonos/nuevo') ?>
  <div class="panel panel-primary">
    <div class="panel-heading">
     Abono
   </div>
   <div class="panel-body">

 <div class="col-md-6">
       <div class="form-group " >
        <label>Factura</label>
        <select class="form-control" name="facturas_id">
          <?php $i=1; foreach ($facturas as $facturas_item): ?>
          <option value="<?php echo $facturas_item['id']; ?>" <?php echo set_select('facturas_id',$facturas_item['id']); ?> <?php if($factura_seleccionada==$facturas_item['id']){echo " selected ";}?> ><?php echo "N° factura:".$facturas_item['numero']." Deuda:".$facturas_item['deuda'] ?></option>
          <?php $i++; endforeach ?>                                  
        </select>
      </div>

   
      <div class="form-group " >
        <label>Monto </label>
        <input class="form-control" name="monto" value="<?php echo set_value('monto'); ?>" />
        <?php echo form_error('monto'); ?>                   
      </div>
 </div>
 <div class="col-md-6">

       <div class="form-group">
        <label>Fecha</label>
        <div class='input-group date' id='datepicker1'>
          <input type='text' class="form-control" name="fecha" value="<?php echo set_value('fecha'); ?>" />
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
      </div>
      <?php echo form_error('fecha'); ?>
    </div>


    <div class="form-group " >
        <label>Forma de pago</label>
        <select class="form-control" name="forma_pago">
          <option>Efectivo</option>
          <option>Cheque</option> 
          <option>Deposito</option>                                     
        </select>
      </div>


    </div>
    <!-- /. col-md-3  -->
  </div>
  <!-- /. panel-body  -->
  <div class="panel-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>             
  </div>
  <!--End panel-footer -->
</div>
<!-- /. panel panel-primary  -->
<?php echo form_close(); ?>
</div>
<!-- /. PAGE WRAPPER  -->