<?php
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}
require_once($PRESENTACION_DIR . 'header.php');
?>

<html lang="en" class="no-js">
	<head>
	 
	</head>
    <body> 
	
    <div>
    <h1>Perfil <?php echo $_SESSION['Correo'];?> <h1>
    </div>
    <div>
    <table align="left" >
	<tr>
	    <td>Nombre</td> 
		<td><a href='#'>Editar</td>
    </tr><tr>
        <td>Apellido</td>
		<td><a href='#'>Editar</td>
	</tr><tr>
        <td>Correo</td>
		<td><a href='#'>Editar</td>
    </tr><tr>
	    <td>Teléfono</td>
		<td><a href='#'>Editar</td>
	</tr><tr>
    	<td>Dirección</td>
		<td><a href='#'>Editar</td>
	</tr><tr>
    	<td>Departamento</td>
		<td><a href='#'>Editar</td>
	</tr><tr>		
    	<td>Ciudad</td>
		<td><a href='#'>Editar</td>
    </tr><tr>
    	<td>Contraseña</td>
		<td><a href='#'>Editar</td>
	</tr>
    </table>
    </div> 
	</body>
	
