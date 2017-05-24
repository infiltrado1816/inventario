<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventario</title>

     <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
    
    

       





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Acceso Usuarios</h3>
                    </div>
                    <div class="panel-body">
                       <?php echo form_open(base_url()) ?>
                        
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="login" name="login" type="login" autofocus>
                                     <span class="text-danger"><?php echo form_error('login'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                     <span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <?php echo $mensaje; ?>
                                 <button type="submit" class="btn btn-lg btn-success btn-block">Acceder</button>
                            </fieldset>
                          <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>

 


</body>

</html>
