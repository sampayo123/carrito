<?php 

session_start();

$msj="";



if(isset($_POST['btnAdd'])){

    switch($_POST['btnAdd']){
        case 'Agregar':

            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $msj="Ok ID correcto".$ID;
            }else{
                $msj="ID incorrecto";
            }
           

            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $nombre=openssl_decrypt($_POST['nombre'],COD,KEY);
            }else{
                $msj="nombre incorrecto";
            }


            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $precio=openssl_decrypt($_POST['precio'],COD,KEY);
        
            }else{
                $msj="precio incorrecto";
            }

            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $cantidad=openssl_decrypt($_POST['cantidad'],COD,KEY);
        
            }else{
                $msj="cantidad incorrecto";
            }


if(!isset($_SESSION['CARRITO'])){
    $producto=array(
        'ID'=>$ID,
        'NOMBRE'=>$nombre,
        'CANTIDAD'=>$cantidad,
        'PRECIO'=>$precio
    );

    $_SESSION['CARRITO'][0]=$producto;
}else{

    $NumeroProductos = count($_SESSION['CARRITO']);
    // $msj= print_r($NumeroProductos);
    $producto=array(
        'ID'=>$ID,
        'NOMBRE'=>$nombre,
        'CANTIDAD'=>$cantidad,
        'PRECIO'=>$precio
    );

    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
}

$msj= print_r($_SESSION,true);
            break;
    }
}








?>
