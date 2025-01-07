<?php
    $servername = 'localhost';
    $username = "root";
    $password = "";
    $dbname = "inventario";

    // conecting to database

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO errormode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        $error_message = $e->getMessage();
    }
?>