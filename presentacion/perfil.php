<?php
session_start();
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}
?>

<html lang="en" class="no-js">
	<head>
	<!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes incluir archivos JavaScript individuales de los únicos plugins que utilices) -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Referencia a un archivo css propio, donde se realizan las modificaciones css de la página principal -->
    <link href="../css/starter-template.css" rel="stylesheet">
    <!-- Nueva librería de jQuery personalizada para interactuar con los elementos de nuestro documento -->
    <script src="../js/jquery-example.js"></script>
    
 
	</head>
    <body> 
	<ol class="breadcrumb">
		<li><a href='../index.php'> Inicio </a></li>
		<li><a href='#'> Perfil</a></li>
		<li><a href='publicaciones.php'> Publicaciones </a></li>
	</ol>
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
