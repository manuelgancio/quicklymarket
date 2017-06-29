<?php
require_once($CLASES_DIR .'articulo.class.php');
require_once($LOGICA_DIR .'funciones.php');

?>
<?php
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}
require_once($PRESENTACION_DIR . 'header.php');
?>