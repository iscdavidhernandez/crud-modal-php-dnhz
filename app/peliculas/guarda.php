<?php 
session_start();
require '../config/database.php';

$nombre = $conn->real_escape_string($_POST['nombre']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$genero = $conn->real_escape_string($_POST['genero']);

$sql = "INSERT INTO pelicula(nombre,descripcion,id_genero,fecha_alta) VALUES ('$nombre','$descripcion',$genero,NOW())";

if ($conn->query($sql)){
    $id = $conn->insert_id;
    if($_FILES['poster']['error'] == UPLOAD_ERR_OK){
        $permitidos = array("image/jpeg","image/jpeg)");
        if(in_array($_FILES['poster']['type'],$permitidos)){

        
        $dir = "posters";

        $info_img = pathinfo($_FILES['poster']['name']);
        $info_img['extension'];
        $poster = $dir . '/' . $id . '.jpg';

        if(!file_exists($dir)){
            mkdir($dir,0777);
        }
        if(!move_uploaded_file($_FILES['poster']['tmp_name'],$poster)){
            $_SESSION['msg'] = "Error al guardar imagen";
        }
    }else{
        $_SESSION['msg'] = "Formato de imagen no permitido";
    }
    }
}

header('Location: index.php');