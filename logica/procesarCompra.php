<?php 
session_start();
require_once($CLASES_DIR .'articulo.class.php');
require_once($CLASES_DIR .'art_pub.class.php');
require_once($CLASES_DIR .'art_com.class.php');
require_once($CLASES_DIR .'persona.class.php');
require_once($LOGICA_DIR.'funciones.php');
/** PROCESO LA COMPRA DE UN ARTICULO 
    POR _GET RECIBO EL ID DE LA PUBLICACION  Y EL ID DEL  Y LA CANTIDAD QUE COMPRA
    POR SESSION TENGO EL CORREO DEL USUARIO QUE COMPRA

    AL COMPRAR GUARDO FECHA EN LA TABLA SELECCIONA EN LA BASE

    SI ES UNA PERMUTA REDIRIJO LOS DATOS A PROCESAR PERMUTA
**/
    //Si no inicio sesion debe hacerlo
    if($_SESSION['logged'] != true){
    ?>
        <script type="text/javascript">
            window.location= '../presentacion/index.php';
            window.alert("Debe iniciar sesión.");
        </script>
        <?php
    } else{
    $id_pub = $_GET['id_pub'];
    $id_art = $_GET['id_art'];
    $cant = $_GET['cant'];
    $fecha_compra = date("Y-m-d");
    
    if (isset($_GET['btnPermuta']) && ($_GET['btnPermuta'] == 'y')){
        $flag='sel1';
        header('location:'.$LOGICA.'/procesarPermuta.php?id_pub='.$id_pub.'&id_art='.$id_art.'&cant='.$cant.'&flag='.$flag);
        exit();
    }
    
    
/** CONECTO A LA BASE **/
    $conex = conectar();

/** AVERIGUO EL ID_USUARIO DEL USUARIO QUE VENDE **/
    $a = new articulo ($id_art,'','','','','','','','');
    $id_vendedor = $a->idUsu($conex);
    $id_vendedor =$id_vendedor[0]['id_u'];

/** AVERIGUO EL ID_USUARIO DEL USUARIO QUE COMPRA **/
    $correoComprador = $_SESSION['Correo'];
    $p = new persona('','','','',$correoComprador,'','','','','','','','','','');
    $id_comprador = $p->obtenerIdUsu($conex);
    $id_comprador =$id_comprador[0]['id_u'];
    
/** CREO EL OBJETO ART_COMP Y LLAMO LA FUNCION comprarArticulo  QUE REALIZA EL INSERT EN LA TABLA SELECCIONA  **/

    $c = new art_com('',$fecha_compra,$id_comprador,$id_vendedor,$id_art,'',$cant,'');
    $c->comprarArticulo($conex);
    
/** CREO OBJETO ARTICULO Y RESTO LA CANTIDAD DE ARTICULOS COMPRADOS, SI LA CANTIDAD DE ARTICULOS RESTANTES ES 0
    CAMBIO EL ESTADO DE LA PUBLICACION **/
    $a = new articulo ($id_art,'','','','','',$cant,'','');
    $a = $a->comprarArticulo($conex);

    if($a == true){
        //El stock restante luego de la compra es 0 entonces cambio estado de la publicacion a 0
        $p = new art_pub ($id_pub,'','','','','','','');
        $p = $p->pubFinalizada($conex);
    }
    
    header('location: /presentacion/'.'misCompras.php');
    }