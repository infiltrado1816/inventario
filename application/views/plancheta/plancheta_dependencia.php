<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <!-- BOOTSTRAP STYLES-->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
  
   <!-- css printable-->
 <style>
 body{
  background-color: #D8D8D8;
  font-size: 12px;
 }
 .container {
  background-color: white;
  width: 21cm;
  height: 25cm;
}
input{
  width: 100%;
  text-align: center;
  border: 1;
}
.firma{
  padding-top: 1cm;
}
p {
  margin: 0px;
}
table{
  width: 100%;
  text-transform: uppercase;
}
table, th, td {
   border: 1px solid black;
   padding: 1px;
}
th{
  background-color: #D8D8D8;
  text-align: center;
}

h1 {
  page-break-before: always;
}
@media print {
  /* Contenido del fichero print */
  input{
    border: 0;
  }
}
</style>
</head>
<body>
  <div class="container"> 
    <div class="row">
      <div class="col-xs-4 text-center">
          <p>MINISTERIO DE DEFENSA NACIONAL</p>
          <p>ESTADO MAYOR CONJUNTO</p>
          <p>Comando Conjunto Austral</p>
      </div>
      <div class="col-xs-4">
      </div>
      <div class="col-xs-4">
      </div>
    </div>
   <br>
<div class="row text-center">
  <h4><u>PLANCHETA DE INVENTARIO PRESUPUESTARIO</u> </h4>
</div>
<br>
<div class="panel-body">
  <p>DEPENDENCIA:  <?php echo $dependencia['dep_nombre']; ?> </p>
</div>

<div class="panel-body">
  <table>
    <thead>
      <tr>
        <th>N°</th>
        <th>Descripción</th>
        <th>N° serie</th>
        <th>N° EMCO</th>
      </tr>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach ($item as $articulos): ?>
    <tr>
      <td class="text-center"><?php echo $i?></td>
      <td><?php echo $articulos['art_descripcion']; ?></td>
      <td><?php echo $articulos['art_serie']; ?></td>
      <td class="text-right"><?php echo $articulos['art_numeroemco']; ?></td>
    </tr>
    <?php $i++; endforeach ?>
  </tbody>
</table>
</div>
<div class="firma">
  <div class="row">
        <div class="col-xs-6">
           <div class="col-sm-12"><p class="text-center">RECIBÍ</p></div><br><br><br><br><br><br>
           <div class="col-sm-12"><input value="<?php echo  $dependencia['dep_firma_nombre']; ?>" /></div>
           <div class="col-sm-12"><input value="<?php echo  $dependencia['dep_firma_grado']; ?>" /></div>
           <div class="col-sm-12"><input value="<?php echo  $dependencia['dep_firma_titulo']; ?>" /></div>
        </div>

         <div class="col-xs-6">
            <div class="col-sm-12"><p class="text-center">ENTREGUÉ</p></div><br><br><br><br><br><br>
            <div class="col-sm-12"><input value="NICOLÁS DIAZ GARCÍA"/></div>
            <div class="col-sm-12"><input value="Sargento Primero"/></div>
            <div class="col-sm-12"><input value="Jefe de Sección Informática"/></div>
        </div>
  </div>
 </div>
   <div class="row">
            <div class="col-sm-12"><p class="text-center">V°   B°</p></div><br><br><br><br><br><br>
            <div class="col-sm-12"><input value="JORGE PERALTA FUENZALIDA" /></div>
            <div class="col-sm-12"><input value="Capitán de Fragata" /></div>
            <div class="col-sm-12"><input value="Jefe de Depto. C-6 Mando y Control e Informática" /></div> 
  </div>
</div>
</body>
 <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</html>