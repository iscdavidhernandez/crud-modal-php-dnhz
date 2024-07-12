<?php 

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']);
$nombre = $conn->real_escape_string($_POST['nombre']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$genero = $conn->real_escape_string($_POST['genero']);

$sql = "UPDATE pelicula SET nombre='$nombre', descripcion='$descripcion', id_genero=$genero WHERE id=$id";

if ($conn->query($sql)){
    $id = $conn->insert_id;
    $_SESSION['msg'] = "Registro guardado";
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
            if (!move_uploaded_file($_FILES['poster']['tmp_name'], $poster)) {
                $_SESSION['msg'] .= "<br>Error al guardar imagen";
            }
        }else{
            $_SESSION['msg'] .= "<br>Formato de imagen no permitido";
        }
    }else {
        $_SESSION['msg'] = "Error al guardar imagen";
    }
}

header('Location: index.php');