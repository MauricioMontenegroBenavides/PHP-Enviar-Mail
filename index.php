<?php
   
   // Para enviar mails se debe usar php-composer
   // Estas lineas se descarga en la linea de comandos 
   // Se debe instalar composer 
   // Una vez instalado composer se debe inicializar el proyecto con::
   // -composer init
   // -nombre: RECOMENDADO (empresa/nombre del proyecto)
   // -Descripcion: 
   // -Author:
   // -Stability: (estable/ desarollo)
   // -Package Type: (libreria/proyect)
   // -Licence :(MIT/PROPETARY)
   // Si se desea instalar las dependencias configurar las librerias , caso contrario poner NO
   // COn todo esto se crea el composer.json(Es el archivo de configuracion principal de composer)
   // -ejecutar composer install(Si ya se tiene algo en el requerid de composer.json)
   // Despues de ejecutar composer install lo va a leer todo lo que escribamos en la parte de requerid en s composer.json  
   // -Despues de ejecutar composer install se va a crear composer.lock y el composer vendor 
   // - En la carpeta vendor ya puedo encontrar todas las dependencias qeu se instalo con composer
   
    
    // Al poner required se cargan todas las librerias 
    // La ventaja de composer no se agrega un biblioteca de forma manual 
      
    // Todas las biblotecas que podemos trabajar con composer es en packagist.org



    require("mail.php");// Permite integrar el archivo mail.php, es como los dos archivos fueran uno solo
    // 
    function validar($name,$subject,$email,$mesage,$buton){


        return !empty($name) && !empty($subject) && !empty($email) && !empty($mesage);
   };

   $status="";

  //Ver si el formulario esta enviado   
  if(isset($_POST['buton'])){

    if(validar(...$_POST)){

       $name=$_POST["name"];
       $email=$_POST["email"];
       $subject=$_POST["subject"];
       $mesage=$_POST["mesage"];
       $body="$name <$email Te enviò el siguiente mensaje>: <br> $mesage";

       enviar($subject,$body,$email,$name,true);

       $status="success";
    }else{

       $status="danger";

    }
  } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>

     <?php if($status==="success"):?>
         <div class="alert success">
              <span>Mensaje enviado con exito</span>
        </div>
     <?php endif; ?>   


     <?php if($status==="danger"):?>
         <div class="alert danger">
             <span>Surgio un problema </span>
         </div>
     <?php endif; ?> 

   

    <form action="./" method="post"> <!--El ./ hace se que se envien los datos del formulario al miamo archivo-->


        <h1>CONTACTANOS</h1>
        
        <div class="input-group">

            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="input-group">
            
            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="input-group">
            
            <label for="subject">ASUNTO</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div class="input-group">
            
            <label for="subject">Mensaje</label>
            <textarea name="mesage" id="mesage" ></textarea>
        </div>


        <div class="button-container">
            <button name="buton" type="submit">Enviar</button>
        </div>
        
    </form>
    
</body>
</html>