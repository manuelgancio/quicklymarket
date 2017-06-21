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

        //Obtengo el id del usuario que sube el archivo
        $correo = $_SESSION['Correo'];
        $id_usu = obtenerIdPersona($correo);
        $id_usu = $id_usu[0]['id_u'];
    

        //Obtengo los datos de la publicacion

        $tipo_publicacion = strip_tags($_POST["tipo"]); //1= venta /0 = permuta
        $fecha_inicio = strip_tags($_POST['fecha_inicio']); //dd-mm-yy
        $duracion = strip_tags($_POST['duracion']); // cantidad de días que dura la publicacion

        // Convertir fomato dd-mm-yy a yy-mm-dd
        $fecha_inicio = date("Y-m-d", strtotime($fecha_inicio));
        
        // Calcular fecha finalizacion. Fecha comienzo + duracion 
        $fecha_fin = strtotime ( '+'.$duracion.'day' , strtotime ($fecha_inicio)) ;
        $fecha_fin = date('Y-m-d' ,$fecha_fin);
    
    //Validacion de datos(PENDIENTE)

    //Conecto a la bd
        $conex = conectar();

    //Creo el objeto con los datos ingresados
        $a = new articulo('',$nomArt,$desc,$cat,$precio,$estado,$cant,$ruta_img,$id_usu);

        $b=$a->altaArticulo($conex);
        //Guardo el id del articulo ingresado para usarlo como foreign key de la publicacion 
        $id_articulo_ingresado = $b;
        
        //Creo el objeto publicacion    
        $p = new art_pub('',$id_articulo_ingresado,$id_usu,$fecha_inicio,$fecha_fin,$tipo_publicacion);

        $q = $p->altaPublicacion($conex);
        //Guardo id publicacion para redireccionar a la publicacion creada
        $id_publicacion_creada = $q;
    
        header('Location:'. $PRESENTACION_DIR . 'publicarArticulo.php');
        desconectar($conex);

}// fin if alta articulo
