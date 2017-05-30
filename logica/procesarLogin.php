<?php
session_start(); 
require_once($CLASES_DIR .'persona.class.php');
require_once($LOGICA_DIR.'funciones.php');
#require_once('../clases/persona.class.php');
#require_once('../logica/funciones.php');

//Obtiene los datos ingresados
$correo= strip_tags(trim($_POST['Correo']));
$pass = strip_tags(trim($_POST['Password']));
//Guardo el login en una variable de sesión
$_SESSION["Correo"] = $correo;

$conex = conectar();
//$u= new Usuario ('',$login,md5($pass));
$u= new persona ('','','','',$correo,'','','','','','','',$pass,'','');

$datos_u=$u->coincideLoginPassword($conex);

if (!empty($datos_u))
//si no está vacio el array es que coinciden el login y la password
{
//die(var_dump($datos_u));
$_SESSION['logged'] = true; 
$_SESSION["LOGIN"] =$datos_u[0]["Correo"];
$_SESSION["CATEGORIA"] =$datos_u[0]["categoria"];
?>
	 <script type="text/javascript">
		
		location.href="../presentacion/index.php";
		window.alert('Se logeo correctamente');
	</script>
<?php
}
else
{
//Si el array esta vacio, es que no encontro un registro que coincida el login y la password
?>
 <script type="text/javascript">
 
   window.alert("El Usuario o Password \n no es correcto.");
   location.href="../presentacion/index.php";
 </script>
  <?php  
}
desconectar($conex);
 
?>
