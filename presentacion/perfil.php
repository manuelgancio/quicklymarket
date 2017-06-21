<?php
require_once('../logica/funciones.php');
require_once('../clases/persona.class.php');
require_once('../persistencia/PersistenciaUsuario.class.php');


if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}
require_once($PRESENTACION_DIR . 'header.php');
?>

<html lang="en" class="no-js">
	<head>
	  <link href='<?= $CSS?>/estilos.css' rel="stylesheet">
	</head>
    <body> 
	
   
    <div >


    	<?php
    	$conex=conectar();
		$u=new Persona();
		$datos_u=$u->verPerfil($conex);
			if (empty($datos_u)){
			echo "No hay usuarios cargados";
			}
		else
		{
		?>

		<?php
				for ($i=0;$i<count($datos_u);$i++) {
		?>
            <table  class="table table-striped"align="center">
				<tr>
					<td>Nombre:</td>
					<td><?php echo $datos_u[$i]["p_nomb"];?></td>
				</tr>
				<tr>
					<td>Apellido:</td>
					<td><?php echo $datos_u[$i]["p_ap"];?></td>
				</tr>
				<tr>
					<td>Telefono:</td>
					<td><?php echo $datos_u[$i]["tel"];?></td>
				</tr>
				<tr>
					<td>Calle:</td>
					<td><?php echo $datos_u[$i]["calle"];?></td>
				</tr>
				<tr>
					<td>Numero:</td>
					<td><?php echo $datos_u[$i]["num"];?></td>
				</tr>
				<tr>
					<td>Apto:</td>
					<td><?php echo $datos_u[$i]["apto"];?></td>
				</tr>
				
				<tr>
			</table>
			</form>	
		</div>			
		</body>
		</html>

		<?php
		}}
		?>