<?php 


include 'global/config.php';
include 'global/conexion.php';
include './carrito.php';
include 'templates/cabecera.php';



// $consult=$pdo->prepare('SELECT * FROM ventas');

$consult=$pdo->prepare('select idVenta, nombre, fecha, correo, precioUnitario, idProducto,estatus from
 detalleventas dv inner join ventas v on dv.idVenta=v.id INNER JOIN productos p on p.id=dv.idProducto');

$consult->execute();

$results=$consult->fetchAll(PDO::FETCH_ASSOC);

//print_r($results);
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
    <a class="navbar-brand">Inicio</a>
    </button>
    <div id="my-nav">
        <ul class="navbar-nav mr-auto">
            <li  class="nav-item active">
            <a class="nav-link" href="#">Ventas</a>
            </li>
            <li  class="nav-item active">
            <a class="nav-link" href="./login/salir.php">Salir</a>
            </li>
        </ul>
    </div>
</nav>
<br>
<h3>Ventas</h3>

<table class="table table-bordered">
  <thead>
    <tr>
      <th width="40%" class="text-center">Descripcion</th>
      <th width="15%" class="text-center">Correo</th>
      <th width="20%" class="text-center">Fecha de compra</th>
      <th width="20%" class="text-center">Pago</th>
      <th width="5%" class="text-center">Id Producto</th>
      <th width="5%" class="text-center">--</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  
    <?php foreach($results as $producto){ ?>
        <th width="40%" class="text-center"><?php echo $producto['nombre']  ?></th>
    <th width="40%" class="text-center"><?php echo $producto['correo'] ?></th>
      <th width="15%" class="text-center"><?php echo $producto['fecha'] ?></th>
      <th width="20%" class="text-center"><?php echo $producto['precioUnitario'] ?></th>
      <th width="20%" class="text-center"><?php echo $producto['idProducto'] ?></th>
       <th width="5%">

       <form action="" method="post" id="formEliminar">
       <input type="hidden" name="idVenta" id="id" value="<?php echo $producto['idVenta']; ?>">
     <?php if($producto['estatus']!='Aprobado'){ ?>
       <button class="btn btn-danger"
                name="btnAdd"
                value="Aprobar"
                type="submit" 
                onclick="return ConfirmarDelete() ">Pendiente</button>

     <?php } else{ ?>

      <button class="btn btn-success"disabled
                name="btnAdd"
                value="Aprobar"
                type="submit" 
                ">Aprobado</button>

                <?php } ?>
       </form>
      </th>    
    </tr>
    <?php  }?>
    <tr>

          </form>
      
      </td>
    </tr>
  </tbody>
</table>

<script type="text/javascript">

function ConfirmarDelete(){
    var respuesta= confirm("¿La tranferencia fue verificada?");

    if(respuesta==true)
    {
        return true;
    }else{
        return false
    }

}

</script>
<footer></footer>
