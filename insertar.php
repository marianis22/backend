<?php
//header:es requerida,lo cual es utilizado para determinar si  el recurso puede o no ser accedido
//por el contenido dentro del origen actual.
 header("Access-Control-Allow-Origin: *");
     //variables enviadas desde index.php
        $nombre1 = $_POST["nombre1"];
        $nombre2 = $_POST["nombre2"];
        $ApellidoP= $_POST["Apellido1"];
        $ApellidoM= $_POST["Apellido2"];
        $Edad = $_POST["Edad"];
        $Direccion = $_POST["Direccion"];



        $dbname = "crud";
        $user = "root";
        $password = "root";
        $servidor = "localhost";
        $conexion = mysqli_connect( $servidor, $user, $password, $dbname ); 
//localhost
        $conexion->set_charset('utf8');
        $statement = $conexion->prepare("INSERT INTO miembros (nombre1, nombre2, ApellidoP, ApellidoM, Edad, Direccion) VALUES (?,?,?,?,?,?)");
        $statement->bind_param("ssssis", $nombre1,$nombre2,$ApellidoP,$ApellidoM,$Edad,$Direccion);
        $statement->execute();
$conexion=null;
 
