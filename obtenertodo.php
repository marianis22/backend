<?php
//header:es requerida,lo cual es utilizado para determinar si  el recurso puede o no ser accedido
//por el contenido dentro del origen actual.
 header("Access-Control-Allow-Origin: *");
    $dbname = "crud";
    $user = "root";
    $password = "root";
    try{
        $dsn = "mysql:host=localhost;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
    } catch(PDOException $e){
        echo $e->getMessage();
    }
    //obtenemos los datos de la base de datos
    $data = $dbh->query("SELECT * FROM miembros")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
    $dbh = null;
