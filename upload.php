<?php
     require_once 'config/config.php';
     require_once 'conexion/Conexion.php';

     $cnx = new Conexion;
     $db = $cnx->connect();

    /* Ruta */
     $directorio = 'uploads/foto_';
     $file = $directorio . basename($_FILES["file"]["name"]); /* Nombre de la Imagen */
    

     /* Nombre de la Imagen */
     $name = $_FILES["file"]["name"];
     $nameArray = explode( '.', $file );
  

     /*- Tipo de Archivo */
     $typeFile = strtolower(pathinfo($file, PATHINFO_EXTENSION));    


     if( $typeFile == 'png' || $typeFile == 'jpg' || $typeFile == 'jpeg' ) {

         $insert = $db->prepare('INSERT INTO img (ruleImg, imgExten) VALUES (:ruleImg, :imgExten)');
         $insert->execute(['ruleImg' => $directorio, 'imgExten' => $typeFile]);

         $query = $db->prepare('SELECT MAX(id) AS id FROM img');
         $query->execute();
         $row = $query->fetch(PDO::FETCH_ASSOC);

         $nameFinal =  $directorio . $row['id'] . "." . $typeFile;

         if(move_uploaded_file($_FILES["file"]["tmp_name"], $nameFinal)){
             echo 'Imagen Insertada';
             echo '<a href="index.php"> Volver </a>';
         } else {
             echo 'Imagen no insertada';
         }

     }  



?>    