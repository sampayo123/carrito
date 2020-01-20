<?php
include './carrito.php';
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';
?>

<br>
<br>
<?php if(!empty($infor)){ ?>
    <div class="alert alert-success">
    
        <?php echo $infor ?>

    </div>
    <?php } ?>

<h3>Lista del carrito</h3>
<?php if(!empty($_SESSION['CARRITO']))  {?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th width="40%" class="text-center">Descripcion</th>
      <th width="15%" class="text-center">Cantidad</th>
      <th width="20%" class="text-center">Precio</th>
      <th width="20%" class="text-center">Total</th>
      <th width="5%" class="text-center">--</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php $total=0;?>
    <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
    <th width="40%" class="text-center"><?php echo $producto['NOMBRE'] ?></th>
      <th width="15%" class="text-center"><?php echo $producto['CANTIDAD'] ?></th>
      <th width="20%" class="text-center"><?php echo $producto['PRECIO'] ?>$</th>
      <th width="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2)  ?>$</th>
       <th width="5%">

       <form action="" method="post" id="formEliminar">
       <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
     
       <button class="btn btn-danger"
                name="btnAdd"
                value="Eliminar"
                type="submit" 
                onclick="return ConfirmarDelete() ">Eliminar</button>
      
       </form>
      </th>    
    </tr>
    <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);?>
    <?php } ?>
    <tr>

    <tr>
      <td colspan="3" align="right"><h3>Total</h3></td>
      <td align="right"><h3><?php echo number_format($total,2);?>$</h3></td>
    </tr>

    <tr>
      <td colspan="5" >
        <form action="pagar.php" method="post">

       
      <div class="alert alert-success">   
            <div class="form-group">
                    <div>
                        <label for="my-input">*Correo:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Tu Correo" required autofocus>
                    </div>
            </div> 
            <small id="emailHelp" class="form-text text-muted">
            Los productos se enviaran a este correo. (Campo requerido)
            </small>
      </div> 
      

      <button class="btn btn-primary btn-lg btn-block " type="submit"
      name="btnAdd"
      value="Proceder"
      >
      Proceder a pagar >>
      </button>
          </form>
      
      </td>
    </tr>
  </tbody>
</table>
<?php }else{?>
  <div class="alert alert-success">
    <p> No hay productos en el carrito</p>
  </div>
<?php }?>
<script type="text/javascript">

function ConfirmarDelete(){
    var respuesta= confirm("¿Seguro que desea eliminar?");

    if(respuesta==true)
    {
        return true;
    }else{
        return false
    }

}

</script>
<footer></footer>
<?php include 'templates/pie.php' ?>