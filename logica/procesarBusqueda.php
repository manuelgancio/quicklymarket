<?php
#require_once('../clases/articulo.class.php');
#require_once('/funciones.php');
require_once($CLASES_DIR . 'articulo.class.php');
require_once($LOGICA_DIR .'funciones.php');
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
		<link rel="stylesheet" type="text/css" href="<?= $CSS?>/style.css" />
        <script src="<?= $JS?>/modernizr.custom.63321.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	</head>
	<body>
		<div class="container">	
			
			<header class="clearfix">
				<div id="titulo" class="titulo" >
					<h1>Proyecto TA3 <span>Quicly market - V.1.0 </span>
					</h1>
				</div>
				
			<?php
				if(!isset($_SESSION['logged'])){
				?>
				<form action="<?= $LOGICA?>/procesarLogin.php" method="POST" id="FrmIngreso" enctype="application/x-www-form-urlencoded">		

				<div id="login" class="loginClass"> 

					<table >
						<tr>
							<th><input type="text" name="Correo" id="Correo" placeholder="Ingrese su correo"> </th>
						</tr>
						<tr>
							<th><input type="Password" name="Password" id="Password" placeholder="contraseña"></th>
						</tr> 
						<tr>
						<th>
						
							<input  class="button button4" type="submit" value="Ingresar"  title="Ingresar a la aplicación" />
						<th>
						<tr>
							
						<tr>
							<th>
								<a href='<?= $PRESENTACION?>/registro.php'>¿No estás registrado?</a>
							</th>
						<tr>
					</table>
				</div>
			</form>			
			<?php
				}elseif(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True)
				{
					?>
					<div>
					<a href='<?= $PRESENTACION?>/perfil.php'>Perfil</a>
					</div>
					<div>
					<a href='<?= $PRESENTACION?>/cerrarSesion.php'>Log out</a>
					</div>

					<?php
				}
				?>
			</header>
            <body>
            <div>
            <?php    
            $busqueda = strip_tags($_POST['Busqueda']);

            $conex = conectar();

            $sql =$conex->prepare('SELECT * FROM `articulo` WHERE `nom_a` = :busqueda');
            $sql->execute(array('busqueda'=>$busqueda));
            $resultado=$sql->fetchAll();
            foreach($resultado as $row){
                echo $row['nom_a'];
                echo $row['precio'];
                echo $row['estado'];
            }
            ?>
            </div>
            </body>
			