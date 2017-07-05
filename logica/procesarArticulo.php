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
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
        if ($uploadOk == 1){
            (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));
            //Obtengo la ruta a la imagen en una variable para guardar en la base
            $ruta_img =strtolower($target_file);
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        }else{   
           //echo "No se guardo.";
        }
    }

        
        //Obtengo el id del usuario que sube el archivo
        $correo = $_SESSION['Correo'];
        $id_usu = obtenerIdPersona($correo);
        $id_usu = $id_usu[0]['id_u'];
    

        //Obtengo los datos de la publicacion

        $tipo_publicacion = strip_tags($_POST["tipo"]); //1= venta /0 = permuta
        //die(var_dump($tipo_publicacion));
        if ($tipo_publicacion == '1'){
            $tipo_publicacion = '1';
        }else{
            $tipo_publicacion ='0';
        }
        $fecha_inicio = strip_tags($_POST['fecha_inicio']); //dd-mm-yy
        $duracion = strip_tags($_POST['duracion']); // cantidad de días que dura la publicacion

        // Convertir fomato dd-mm-yy a yy-mm-dd
        $fecha_inicio = date("Y-m-d", strtotime($fecha_inicio));
        
        // Calcular fecha finalizacion. Fecha comienzo + duracion 
        $fecha_fin = strtotime ( '+'.$duracion.'day' , strtotime ($fecha_inicio)) ;
        $fecha_fin = date('Y-m-d' ,$fecha_fin);

        //Pongo estado pub como 1 para saber que la publicacion está activa 
        $estado_pub = 1; 

    
    //Validacion de datos(PENDIENTE)

    //Conecto a la bd
        $conex = conectar();

    //Creo el objeto con los datos ingresados
        $a = new articulo('',$nomArt,$desc,$cat,$precio,$estado,$cant,$ruta_img,$id_usu);

        $b=$a->altaArticulo($conex);
        //Guardo el id del articulo ingresado para usarlo como foreign key de la publicacion 
        $id_articulo_ingresado = $b;
        
        //Creo el objeto publicacion    
        $p = new art_pub('',$id_articulo_ingresado,$id_usu,$fecha_inicio,$fecha_fin,$tipo_publicacion,$estado_pub);

        $q = $p->altaPublicacion($conex);
        //Guardo id publicacion para redireccionar a la publicacion creada
        $id_publicacion_creada = $q;
        
        
        header('location: /presentacion/'.'mostrarArticulo.php?id_pub='.$id_publicacion_creada.'&id_art='.$id_articulo_ingresado);
        
        desconectar($conex);

}// fin if alta articulo

/**PROCESAR ELIMIAR Y MODIFICAR PUBLICACION (CAMBIO EL ATRIBULO E_PUB DE LA PUBLICACION PA 0)
**/

    if(isset($_GET["id_pub"]) and (isset($_GET["id_art"])) and (isset($_GET['role']))){
        $role = $_GET['role'];
        
        if ($role == 'delete'){
            $id_pub = $_GET['id_pub'];

            $conex = conectar();
            //Creo el objeto publicacion 
            $p = new art_pub($id_pub,'','','','','','');
            $pp = $p->bajaPublicacion($conex);

            // Si la funcion devuelve true = update exitoso!

            header('location: /presentacion/'.'publicaciones.php');
        }elseif ($role == 'mod'){
             $id_art =$_GET['id_art'];
             $id_pub = $_GET['id_pub'];
        
             //traigo los datos de la publicacion 
             $conex = conectar();
             $p = new art_pub($id_pub,'','','','','','');
             
             $pp = $p->listarPublicacion($conex);

            //traigo datos de el articulo
            $a = new articulo($id_art,'','','','','','','','');
            $aa = $a->listarArticulo($conex);


           
            
        }
}