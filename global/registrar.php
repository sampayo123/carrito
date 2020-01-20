<?php


include '../global/conexion.php';


try{
$insert=$pdo->prepare('INSERT INTO `usuarios`(`password`, `usuario`, `idRol`) VALUES
(:pass,:user,2)');
// $insert->bindParam(':idRol',$idRol);
$insert->bindParam(':user',$usuario);
$insert->bindParam(':pass',$passd);

$result=$insert->execute();

$mostrar="";
if($result=== TRUE){
 $mostrar ='usuario creado';
 ECHO $mostrar;
}
  
}catch(PDOExeption $e){
    print "Error: " .$e->getMessage()."<br/>";
    die();
}




         
       
   
    
?>
