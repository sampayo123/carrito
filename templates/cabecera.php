<?php 



if(isset($_SESSION['user_id'])){
	//echo $_SESSION['user_id'];
	$consult=$pdo->prepare('SELECT * FROM usuarios WHERE id=:usuario');

	$consult->bindParam(':usuario',$_SESSION['user_id']);

	$consult->execute();
  

	 $result= $consult->fetch(PDO::FETCH_ASSOC);
   
	//print_r($result);
	$user="";
	
	
}else{
	header('location: templates/login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta description="mi pagina de ventas por internet">
    <link rel="stylesheet" href="css\bootstrap-4.3.1-dist\css\bootstrap.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="index.php">Inicio</a>
    </button>
    <div id="my-nav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Productos <span class="sr-only">(current)</span></a>
            </li>
            <li  class="nav-item active">
            <a class="nav-link" href="mostrarCarrito.php">Carrito(<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']) ?>)<span class="sr-only">(current)</span></a>
            </li>
            <li  class="nav-item active">
            <a class="nav-link" href="./login/salir.php">Salir</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
