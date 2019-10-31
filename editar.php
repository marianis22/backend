
<?php
//header:es requerida,lo cual es utilizado para determinar si  el recurso puede o no ser accedido
//por el contenido dentro del origen actual.
header("Access-Control-Allow-Origin: *");
if(isset($_GET['id'])){
    $id=$_GET['id'];
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
    $data = $dbh->query("SELECT * FROM miembros WHERE miembro_id='$id'")->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
    $dbh = null;

} 


if(isset($_POST["Direccion_editar"])) {
    
    $id=$_POST["aid"];
    $nombre1=$_POST["nombre_editar"];
    $nombre2=$_POST["nombre2_editar"];
    $apellido1=$_POST["Apellido_editar"];
    $apellido2=$_POST["Apellido2_editar"];
    $edad=$_POST["Edad_editar"];
    $direccion=$_POST["Direccion_editar"];
    
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
    $sint = $dbh->prepare("UPDATE miembros SET nombre1='$nombre1', nombre2='$nombre2', ApellidoP='$apellido1', ApellidoM='$apellido2', Edad='$edad', Direccion='$direccion' WHERE miembro_id='$id'");
    
    if($sint->execute())
    {
         echo "borrar el registro";
    }

    $dbh = null;

} 

?>