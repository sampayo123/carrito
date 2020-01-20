<?php
include 'global/config.php';
include 'global/conexion.php';
include './carrito.php';
include 'templates/cabecera.php';



?>
<?php

if(isset($_POST)){
    
    $total=0.00;
    $ID=session_id();

    $correo=$_POST['email'];
    if(empty($correo)){
          echo "<script>alert('Conectado...')</script>";
        header('location: ./mostrarCarrito.php');
      
    echo "Introduce un correo para poder ejecutar la compra.";

       } 

    foreach($_SESSION['CARRITO'] as $indice => $producto){
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
    }


$sentencia= $pdo->prepare("INSERT INTO `ventas` 
(`id`, `claveTransaccion`, `fecha`, `correo`, `total`, `estatus`) 
VALUES (NULL, :claveTransaccion, NOW(), :correo, :total, 'pendiente');");

$sentencia->bindParam(":claveTransaccion",$ID);
$sentencia->bindParam(":correo",$correo);
$sentencia->bindParam(":total", $total);

 
$sentencia->execute();
$idVenta=$pdo->lastInsertId();




foreach($_SESSION['CARRITO'] as $indice => $producto){
$sentencia= $pdo->prepare("INSERT INTO `detalleventas` 
(`id`, `idVenta`, `idProducto`, `precioUnitario`, `cantidad`)
 VALUES (NULL, :idVenta, :idProducto, :precioUnitario, :cantidad)");

 
$sentencia->bindParam(":idVenta",$idVenta);
$sentencia->bindParam(":idProducto",$producto['ID']);
$sentencia->bindParam(":precioUnitario", $producto['PRECIO']);
$sentencia->bindParam(":cantidad",$producto['CANTIDAD']);

$sentencia->execute();

}
}
?>
<div class="jumbotron " align=center>
    <h1 class="display-4 text-center" >¡Paso final!</h1>
    <p class="lead">Articulos :</p>  
    <?php foreach($_SESSION['CARRITO'] as $indice => $producto){ ?>
        <?php echo $producto['NOMBRE'],": ". $producto['PRECIO']."$<br/><br/> "  ?> 
    <?php } ?>
   
           <p class="lead text-center">Total a pagar:  </p>
        <h4 class="text-center" ><?php echo number_format($total,2) ?>$</h4>
    <hr class="my-4">
    
<form action="verificador.php" method="post">
    <button class="btn btn-primary" type="submit"> Pagar</button>
    <?php unset($_SESSION['CARRITO']); ?>
</form>
</div>


<?php include 'templates/pie.php' ?>