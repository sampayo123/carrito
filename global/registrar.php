<?php


include '../global/conexion.php';

$usuario= $_POST['usuario'];
    $pass =$_POST['password'];
    $passd=md5($pass);
try{



    $consult=$pdo->prepare('SELECT * FROM usuarios');
 
  
    $consult->execute();

    $result= $consult->fetch(PDO::FETCH_ASSOC);
     if($usuario== $result['usuario'] ){
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
