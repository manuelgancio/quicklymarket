<?php
session_start();
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}

require_once($CLASES_DIR . 'art_pub.class.php');
require_once($CLASES_DIR . 'articulo.class.php');
require_once($LOGICA_DIR . 'funciones.php');

/** MEDIANTE GET RECIBO LA VARIABLE BUSQUEDA Y LA VARIABLE CAT CON EL ID DE LA CATEGORIA
	SI CAT ES NULLO DEBE BUSCAR EN TODAS LAS CATEGORIAS
**/

$busqueda = $_GET['busqueda'];
$id_cat = $_GET['cat'];



