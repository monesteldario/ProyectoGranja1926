<?php 
    $servidor="mysql:dbname=".BaseDatos.";host=".Servidor;

    try{


        $pdo=new PDO($servidor,Usuario,Password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));

        //echo "<script>alert('Conexión a la BD realizada con éxito...')</script>";
   

    }catch(PDOException $e){

        //echo "<script>alert('Error en la conexión...')</script>";
    }

?>