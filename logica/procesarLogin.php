<?php
session_start(); 
require_once($CLASES_DIR .'persona.class.php');
require_once($LOGICA_DIR.'funciones.php');


//Obtiene los datos ingresados
$correo= strip_tags(trim($_POST['Correo']));
$pass = strip_tags(trim($_POST['Password']));

//Guardo el correo en una variable de sesión
$_SESSION["Correo"] = $correo;

$conex = conectar();
$u= new persona ('','','','',$correo,'','','','','','','',$pass,'','');
/** funcion login en persona.class
	Si devuelve true coincide correo y hash de password
**/
$p=$u->login($conex);
if ($p == true){
	$_SESSION['logged'] = true;

	?>
	 <script type="text/javascript">
		
		location.href="../presentacion/index.php";
		window.alert('Se logeo correctamente');
	</script>
	<?php

}else{
	?>
 <script type="text/javascript">
 
   window.alert("El Usuario o Password \n no es correcto.");
   location.href="../presentacion/index.php";
 </script>
  <?php  
}

desconectar($conex);
 
?>
