<?php


include '../global/config.php';
include '../global/conexion.php';



?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Registro</legend>

                        <div class="form-group" align=center> 
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-6">
                            <input type="text" class="form-control" id="inputUsuario" placeholder="Usuario" name="usuario" require
                 autofocus>
                            </div>
                        </div>
                        <div class="form-group" align=center>
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-6">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña" name="password" require autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                 <button type="submit" class="btn btn-primary" name="btnRegistro">Crear usuario</button><br>
                                 <a href="login.php">Login</a>
                            </div>
                        </div>

                        <?php if(!isset($_POST['btnRegistro'])){?>

                        <?php }else{?>
                        <div  class="alert alert-danger " role="alert">
                        <div class="col-md-6">
                        <?php include '../global/validacion.php '; ?>     
                        </div>         
                              </div>
                              <?php }?>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 
    <form action="" method="POST" >
  <div class="form-row" > -->
  <!-- <div class="form-group col-md-3">
      <label for="inputId">Id</label>
      <input type="text" class="form-control" id="inputId" placeholder="IdRol" name="idRol" required autofocus>
    </div> -->
    <!-- <div class="form-group col-md-3">
      <label for="inputUsuario">Usuario</label>
      <input type="text" class="form-control" id="inputUsuario" placeholder="usuario" name="usuario" required
                 autofocus>
    </div><br>
    <div class="form-group col-md-3">
      <label for="inputPassword">Contraseña</label>
      <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña" name="password" required autofocus>
    </div>
  
  </div>
  <div class="form-group">
  </div>
  <button type="submit" class="btn btn-primary" name="btnRegistro">Crear usuario</button>
   






</body>
</html>