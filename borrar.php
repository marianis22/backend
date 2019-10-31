<?php
//header:es requerida,lo cual es utilizado para determinar si  el recurso puede o no ser accedido
//por el contenido dentro del origen actual.
 header("Access-Control-Allow-Origin: *");
    //if(isset($_GET["id"]))
    if(isset($_POST["id"]))
    {
        //$id = $_GET["id"];
	$id = $_POST["id"];

        //echo $nombre;

        $dbname = "crud";
        $user = "root";
        $password = "root";
    
        try{
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        //borra de la tabla miembros el id 
        $sint = $dbh->prepare("DELETE FROM miembros WHERE miembro_id='$id'");
    
        if($sint->execute())
        {
            echo "borrar el registro";
        }

        $dbh = null;
    }
