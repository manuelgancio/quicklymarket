<?php
session_start(); 
require_once($CLASES_DIR .'articulo.class.php');
require_once($CLASES_DIR .'art_pub.class.php');
require_once($LOGICA_DIR .'funciones.php');
//PROCESAR ALTA ARTICULO 

if(isset($_POST["btnAltaArticulo"])){

    $nomArt = strip_tags($_POST["nombre"]);
    $desc = strip_tags($_POST["descripcion"]);
    $cat = strip_tags($_POST['categoria']);
    $precio = strip_tags($_POST["precio"]);
    $estado = strip_tags($_POST["estado"]);        
    $cant = strip_tags($_POST["stock"]); 

//MANEJO DE IMAGEN
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["btnAltaArticulo"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 1){
        (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));
        //Obtengo la ruta a la imagen en una variable para guardar en la base
        $ruta_img =strtolower($target_file);
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }else{   
        echo "No se guardo.";
    }
}

    //Obtengo los datos de la publicacion

    $tipo_publicacion = strip_tags($_POST["tipo"]); 
    $fecha_inicio = strip_tags($_POST['fecha_inicio']);//1= venta /0 = permuta
    $duracion = strip_tags($_POST['duracion']);

    
  

//Validacion de datos(PENDIENTE)

//Conecto a la bd
    $conex = conectar();

//Creo el objeto con los datos ingresados
    $a = new articulo('',$nomArt,$desc,$cat,$precio,
    $estado,$cant,$ruta_img);

    $a->altaArticulo($conex);

    

  
    header('Location:'. $PRESENTACION_DIR . 'publicarArticulo.php');
    desconectar($conex);

}