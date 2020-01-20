<?php
include 'global/config.php';
include 'global/conexion.php';
include './carrito.php';
include 'templates/cabecera.php';



?>

<br/>
<br/>


    <br>
    <?php if(!empty($msj)){ ?>
    <div class="alert alert-success">
    
        <?php echo $msj ?>
        <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>

    </div>
    <?php } ?>

  <div class="row mx-md-n5">
<?php
  $sentencia=$pdo->prepare("SELECT * FROM productos");
  $sentencia->execute();
  $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//   print_r($lista);

  ?>

  <?php foreach($lista as $producto){?>

    <div class="col-4" >
        <div class="card mt-5 pt-2">
            <img class="card-img-top img-fluid"
             title="Titulo" 
             src="<?php echo $producto['img'] ?>"
             alt="titulo"
             height="320px">
              <hr/>
            <div class="card-body mt-2 pb-6">
           
            <h5 class="card-title "><?php echo $producto['nombre'] ?></h4>
                <h5 class="card-title">Precio: <?php echo $producto['precio'] ?>$</h5>
                <p class="card-text">Descripcion: <br/> <br/> <?php echo $producto['descripcion'] ?> </p>

                <div class="mt-5 ">  
                <form action="#" method="post">

                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY); ?>">
                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY); ?>">
                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY); ?>">
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">


                <button class="btn btn-primary"
                name="btnAdd"
                value="Agregar"
                type="submit">Agregar al carrito</button>
              

                </form>
                </div>
            </div>
            </div>
        </div>


  <?php } ?>
  
 
  </div>

</div>

<?php include 'templates/pie.php' ?>

<!-- </html>https://www.youtube.com/watch?v=Zjs2ekMJzJk&list=PLSuKjujFoGJ0XF_Gv0VpiTHxAtO7LL8jl&index=2 -->