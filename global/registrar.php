<?php


include '../global/conexion.php';


try{

    $usuario= $_POST['usuario'];
  $idrol=2;

    $consult=$pdo->prepare('SELECT * FROM usuarios');
 
  
    $consult->execute();

    $result= $consult->fetchAll(PDO::FETCH_ASSOC);

  //  print_r($result);
  foreach($result as $producto){
     }

     if(($usuario == $producto['usuario'])  and ($producto['idRol']  == $idrol) ){
        echo '¡El usuario ya existe! Intenta con otro usuario...<br>';
       }else{



$insert=$pdo->prepare('INSERT INTO `usuarios`(`password`, `usuario`, `idRol`) VALUES
(:pass,:user,2)');
// $insert->bindParam(':idRol',$idRol);
$insert->bindParam(':user',$usuario);
$insert->bindParam(':pass',$passd);

$result=$insert->execute();

$mostrar="";
if($result=== TRUE){
 $mostrar ='Usuario creado';
 ECHO $mostrar;

}
       }
  
}catch(PDOExeption $e){
    print "Error: " .$e->getMessage()."<br/>";
    die();
}




         
       
   
    
?>
