<?php
require_once('../clases/articulo.class.php');
require_once('../logica/funciones.php');
?>
<?php
session_start();
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>prueba TA3</title>
		<meta name="description" content="Simple Multi-Item Slider: Category slider with CSS animations" />
		<meta name="keywords" content="jquery plugin, item slider, categories, apple slider, css animation" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
        <script src="js/modernizr.custom.63321.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">

        
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
	
		<div class="container">	
			
			<header class="clearfix">
				<div id="titulo" class="titulo" >
					<h1>Proyecto TA3 <span>Quickly market - V.1.0 </span>
					</h1>
				</div>
				<div>
                <ol class="breadcrumb">
                    <li><a href='../index.php'> Inicio </a></li>
                    <li><a href='perfil.php'> Perfil</a></li>
                    <li><a href='#'> Publicaciones </a></li>
                </ol>
                </div>
			<?php
				if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True)
				{
					?>
					<div>
					<a href='presentacion/perfil.php'>Perfil</a>
					</div>
					<div>
					<a href='presentacion/cerrarSesion.php'>Log out</a>
					</div>

					<?php
				}
				?>
			</header>
            <body>

            <form action='' method='POST' id='AltaArticulo'>
                <table>
                    <tr>
                    <th><input type='text' id='nombre' name='nombre' placeholder='Nombre articulo'></th>
                    </tr><tr>
                    <th><input type='text' id='descripcion' name='descripcion' placeholder='Descripcion'></th>
                    </tr><tr>
                    <th><select id='categoria' name='categoria' placeholder='categoria'>
                        <option value=''>Categoria</option>
                    </select>
                    </th>
                    </tr><tr>
                    <th>Tipo <input type="radio" name="Venta" value="true"> Venta</th>
                    <th><input type="radio" name="Permuta" value="false"> Permuta</th>
                    </tr><tr>
                    <th><input type='text'name='Precio' id='Precio' placeholder='Precio'></th>
                    </tr><tr>
                    <th>Estado <input type="radio" name="estado" id='estado'value="true"> Nuevo</th>
                    <th><input type="radio" name="estado" id='estado' value="false">Usado</th>
                    </tr><tr>
                    <th><input type='text' id='stock' name='stock' placeholder='Stock'></th>
                    </tr><tr>
                    <th><input type='submit' id='btnAltaArticulo' name='btnAltaArticulo' value='Guardar Artículo'></th>
                    </tr>
                </table>
            </form>


                    

            


            </body>
