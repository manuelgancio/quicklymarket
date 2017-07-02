<?php
session_start();
/** PROCESO EL CAMBIO DE CONTRASEÑA 
    1-RECIBO POR POST LA NUEVA CONTRASEÑA Y LA CONFIRMACION
    2-CREO EL OBJETO PERSONA CON LA PASSWORD
    3-LLAMO LA FUNCION DE CAMBIO PASSWORD Y REALIZA EL UPDATE EN LA BASE
**/
require_once($CLASES_DIR .'persona.class.php');
require_once($LOGICA_DIR.'funciones.php');

$correo = $_SESSION['Correo'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['conf_pass'];


if($pass1 == $pass2){
    $conex =conectar();
    $pass = password_hash($pass1, PASSWORD_DEFAULT);
    $p = new persona('','','','',$correo,'','','','','','','',$pass,'','');
    $pp = $p->cambiarContraseña($conex);
    if($pp == true ){
        ?>
        <script type="text/javascript">
		
		location.href="../presentacion/perfil.php";
		window.alert('La contraseña se cambió correctamente!');
	</script>
    <?php
    }
} 


