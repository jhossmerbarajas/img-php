<?php
   require_once 'config/config.php';
   require_once 'conexion/Conexion.php'; 
   require_once 'views/header/header.php';

    if (file_exists('views/home.php')) {
        require_once 'views/home.php';        
    } else {
        require_once 'views/errorPage.php';
    }
?>