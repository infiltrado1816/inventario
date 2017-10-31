<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventario</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
  
  <!-- TABLE STYLES-->
  <link href="<?php echo base_url(); ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

  <!-- DATE  PICKER-->
  <link href="<?php echo base_url(); ?>assets/css/datepicker.min.css" rel="stylesheet"/>



</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Inventario</a> 
            </div>
            <div style="color: white;
            padding: 15px 100px 5px 50px;
            float: right;
            font-size: 16px;"> 
                     
            <?php echo  date("d") . " / " . date("M") . " / " . date("Y"); ?>&nbsp;
                  <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><?php echo $this->session->userdata('login'); ?>  <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                        <?php if($this->session->userdata('perfil')==="Administrador") {?>
                        <li><a href="<?php echo base_url()."usuarios"; ?>">Usuarios</a></li>
                        <?php } ?>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url()."login/cerrar";?>">Cerrar</a></li>
                        </ul>
                      </div>  
          </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 <li>
                    <a  href="<?php echo base_url(); ?>articulos">
                        <i class="fa fa-codepen fa-3x"></i> Articulos</a>

                            <ul class="nav nav-second-level" id="second-menu">
                             <li>
                                <a href="<?php echo base_url(); ?>articulo/alta">
                                    <i class="fa fa-check fa-3x"></i> Alta</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>articulo/pase">
                                    <i class="fa fa-exchange fa-3x"></i> Pase</a>
                            </li>
                             <li>
                                <a href="<?php echo base_url(); ?>articulo/prestamo">
                                    <i class="fa fa-handshake-o fa-3x"></i> Prestamo</a>
                                      <ul class="nav nav-third-level" >
                                           <li>
                                              <a href="<?php echo base_url(); ?>articulo/retorno">
                                                  <i class="fa fa-check fa-3x"></i> Retorno</a>
                                          </li>
                                        
                                           <li>
                                              <a href="<?php echo base_url(); ?>articulo/prestamo">
                                                  <i class="fa fa-handshake-o fa-3x"></i> Egreso</a>
                                          </li>
                                      </ul>

                            </li>
                             <li>
                                <a href="<?php echo base_url(); ?>articulo/reparacion">
                                    <i class="fa fa-medkit fa-3x"></i> Reparación</a>
                            </li>
                        </ul>

                </li>

              <li>
                 <a href="<?php echo base_url(); ?>mantencion">
                <i class="fa fa-cogs fa-3x"></i> Mantención</a>
                      <ul class="nav nav-second-level" id="second-menu">
                              <li>
                                  <a href="<?php echo base_url(); ?>clasificacion">
                                      <i class="fa fa-indent fa-3x"></i> Clasificación</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url(); ?>dependencia">
                                      <i class="fa fa-home fa-3x"></i> Dependencias</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url(); ?>articulo">
                                      <i class="fa fa-search fa-3x"></i> Articulos</a>
                              </li>
                               <li>
                                  <a href="<?php echo base_url(); ?>proyecto">
                                      <i class="fa fa-search fa-3x"></i> Proyectos</a>
                              </li>
                       </ul>
                  </li>
                <li>
                    <a  <?php if($menu=='plancheta'){ echo 'class="active-menu"'; }?> href="<?php echo base_url(); ?>plancheta">
                        <i class="fa fa-qrcode fa-3x"></i> Planchetas</a>
                        <ul class="nav nav-second-level" id="second-menu">
                              <li>
                                  <a href="<?php echo base_url(); ?>plancheta/dependencia">
                                      <i class="fa fa-home fa-3x"></i> Por Dependencias</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url(); ?>plancheta/clasificacion">
                                      <i class="fa fa-indent fa-3x"></i> Por Clasificación</a>
                              </li>
                               <li>
                                  <a href="<?php echo base_url(); ?>plancheta/resumen">
                                      <i class="fa fa-bar-chart fa-3x"></i>resumen</a>
                              </li>
                       </ul>
                </li>
        


            </ul>
        </div>
    </nav>  
        <!-- /. NAV SIDE  -->