<?php 

include '../global/config.php';
include '../global/conexion.php';

 session_start();

 if(isset($_POST['btn'])){
$user=$_POST['usuario'];
$pass=$_POST['contraseña'];
$passd=md5($pass);

  if(!empty($user) && !empty($passd)){


    $consul=$pdo->prepare('SELECT * FROM usuarios WHERE usuario=:usuario and password=:password');

      $consul->bindParam(':usuario',$user);
      $consul->bindParam(':password',$passd);

    
      $consul->execute();
      $results= $consul->fetch(PDO::FETCH_ASSOC);
     

      $i=print_r($results);
      // echo $i; 
  if($user!=$results['user'] &&
       $passd!=$results['pass']){
        $errorUser = "Usuario o contraseña incorrectos.";
     
      }
 }

if($passd==$results['password']){
   if(count($results) > 0 && $passd==$results['password']){
      $_SESSION['user_id']=$results['usuario'];

      if($results['idRol']==1){
        header('location: ../administrador.php');
      
      }elseif($results['idRol']==2){
        header('location: ../index.php');
      }
  
   
    }

 }
      
}  



?>

<!DOCTYPE html>
<html >
<head>
	<title> Compras</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<header background="../src/png/home.jpg" class="bg-dark">
    <div class="container">
	<div class="row mt-3 ">
		<div class="col-sm-6 mt-2">
    <a>
          <img src="..\src\png\iconGuitarra.png" width="50xp" height="50px" alt=""><p class="text-info">Musica</p>
        </a>
		</div>
		<div class="col-sm-6 hidden-xs mt-4">
    <form action="" method="POST" class="form-signin">
			<div class="row">
				<div class="col-sm-5">
					  <div class="form-group">
                <input type="text" id="idcedula" class="form-control" placeholder="Usuario" name="usuario" required
                 autofocus>
					    <div class="login-bottom-text checkbox hidden-sm">
						  </div>
					  </div>
				</div>	
				<div class="col-sm-5">
					 <div class="form-group">
                <input type="password" id="idContraseña" class="form-control" placeholder="Contraseña" name="contraseña" required>                
					  </div>
				</div>
       
        <a href="registro.php">Registro</a>
				<div class="col-sm-2">
					 <div class="form-group">
           <button type="submit" class="btn btn-primary" name="btn">Entrar</button></div>
        </div>
      <?php  include '../global/validacion.php';?>
      </div>	
      <?php 
                if(!empty($errorUser)){ ?>
      <div  text-aling="center"  class="alert alert-danger">
         
              <?php echo $errorUser;
                            ?>

           </div>
                <?php  } $errorUser="";?>
      </form>
		</div>
	</div>
	</div>
</header>

 <!-- <body background="../src/png/home.jpg">


</body>  -->
</html>
