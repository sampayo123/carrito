<?php


if(isset($_POST['btnRegistro'])){

    //$idRol = $_POST['idRol'];
    $usuario= $_POST['usuario'];
    $pass =$_POST['password'];
    $passd=md5($pass);



    

     //saniamiento y limpieza de la id
   //   if(empty($idRol)){
     
   //      echo "*Introduce tu id";
   //   }else if(!is_numeric($idRol)){
   //       echo "*Debe ser un numero";
   //   }else{
   //        //no muestra los datos mientras sino no estan llenos todos los campos
   //        if(//empty($idRol) and
   //           !empty($usuario)
   //        and !empty($pass)){
     
   //         }
   //   } 
     
     
             //saniamiento y limpieza del usuario
        if(empty($usuario)){
       
            echo "*Introduce un usuario. <br>";
           
            }else{
               $usuario= strip_tags($usuario);
               $usuario=htmlspecialchars($usuario);
               $usuario= stripslashes($usuario);
               $usuario=trim($usuario);
           
               filter_var($usuario, FILTER_SANITIZE_STRING);

                 //no muestra los datos mientras sino no estan llenos todos los campos
                 if(//empty($idRol) and 
                 !empty($usuario)
                 and !empty($pass)){
            
            
                  }
            } 

  //saniamiento y limpieza de la contraseña

            if(empty($pass)){
       
                echo "*Introduce una contraseña.";
               
                }else {
                   $pass= strip_tags($pass);
                   $pass=htmlspecialchars($pass);
                   $pass= stripslashes($pass);
                   $pass=trim($pass);
               
                   filter_var($pass, FILTER_SANITIZE_STRING);
    
                     //no muestra los datos mientras sino no estan llenos todos los campos
                     if(//empty($idRol) and 
                     !empty($usuario)
                     and !empty($pass)){
                
                
                      }
                   }
                } 

             
     
     //valida que los datos no se manden vacios a la base de datos
     if(//empty($idRol) and
      !empty($usuario)
     and !empty($pass)){

        include '../global/registrar.php';

        
    if($result=== TRUE){
      header('location: login.php');
      echo 'usuario creado';
       
         }
        
      }







 
  









?>