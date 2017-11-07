<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li><a href="<?php echo base_url()."usuarios";?>">Usuarios</a></li>
    <li class="active">Ficha</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <?php echo form_open(base_url().'usuarios/ficha') ?>
   
 <div id="signupbox" style=" margin-top:5px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Datos de Usuario</div>
            </div>  
            <div class="panel-body" >
                <form method="post" action=".">
                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                            

                    <form  class="form-horizontal" method="post" >
                           <div class="form-group " >
        <label>Perfil</label>
        <select class="form-control" name="perfil">
          <option value="Usuario" <?php if("Usuario"===$usuario['perfil']){ echo 'selected';} ?>>Usuario</option>
          <option value="Administrador" <?php if("Administrador"===$usuario['perfil']){ echo 'selected';} ?>>Administrador</option>
        </select>
       
      </div>
    <div class="form-group " >
        <label>Login</label>
        <input class="form-control" name="login" value="<?php echo $usuario['login']; ?>" />
         <span class="text-danger"><?php echo form_error('login'); ?></span>
      </div>

      <div class="form-group " >
        <label>Nombre</label>
        <input class="form-control" name="nombre" value="<?php echo $usuario['nombre']; ?>" />
         <span class="text-danger"><?php echo form_error('nombre'); ?></span>
      </div>


      <div class="form-group " >
        <label>Apellido</label>
        <input class="form-control" name="apellido" value="<?php echo $usuario['apellido']; ?>" />
         <span class="text-danger"><?php echo form_error('apellido'); ?></span>
      </div>

       <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                              <button type="submit" class="btn btn btn-primary">Guardar Cambios</button>    
                                
                            </div>
                        </div> 
                            
                    </form>

                </form>
            </div>
        </div>
    </div> 
</div>






<?php echo form_close(); ?>
</div>
<!-- /. PAGE WRAPPER  -->