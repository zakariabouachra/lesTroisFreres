<?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $databasename = 'projet';
       
       $conn = new mysqli($servername, $username, $password,$databasename);
       if($conn->connect_error){
        die('problème de connexion avec la base de données ' .$conn->connect_error);
        }
?>