<?php
$servidor="mysql:dbname=".DB.";host=".SERVIDOR;

try{
    $pdo= new PDO($servidor,USUARIO,PASSWORD,
    
);
    // echo "<script>alert('Conectado...')</script>";
}catch(PDOExeption $e){
    echo "<script>alert('Error...')</script>";
    die();
}

?>