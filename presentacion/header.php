<?php
session_start();
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!--<title></title> -->

    <!-- Bootstrap core CSS -->
    <link href='<?= $CSS?>/bootstrap.min.css' rel="stylesheet">
    <!--css -->
    <link href='<?=$CSS?>/demo.css' rel='stylesheet'>
    <!-- Custom styles for this template -->
    <link href="<?= $CSS?>/nav.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <img id='imglogo' class='img1' src='<?= $IMG?>/logoqm.png' alt='logo' width='70' height='80' >
      <?php
				if(!isset($_SESSION['logged'])){
			?>

      <div id='login' class='loginClass'>
        <!--<h3 class="text-muted">Project name</h3>-->
        
        <form action="<?= $LOGICA?>/procesarLogin.php" method="POST" id="FrmIngreso" enctype="application/x-www-form-urlencoded">		
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
      #LO DEL ELSE SE MUESTRA CUANDO EL USUARIO ESTA LOGUEADO#
				}elseif(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True)
				{
          ?>
        <!--BARRA DE NAVEGACION-->
        <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li ><a href="<?= $PRESENTACION?>/index.php">Inicio</a></li>
            <li><a href="<?= $PRESENTACION?>/perfil.php">Perfil</a></li>
            <li><a href="<?= $PRESENTACION?>/publicaciones.php">Mis Publicaciones</a></li>
            <li><a href="<?= $PRESENTACION?>/publicarArticulo.php">Vender</a></li>
            <li><a href="<?= $PRESENTACION?>/cerrarSesion.php">Log out</a></li>
          </ul>
        </nav>
      </div>
        <?php 
        }
        ?>
      
        
      <!-- ESTO NO VA, QUEDA COMENTADO COMO EJEMPLO
      
      <div class="jumbotron">
        <h1>Marketing stuff!</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
      </div>
      -->

      <!-- Example row of columns -->
      <!--
      <div class="row">
        <div class="col-lg-4">
          <h2>Safari bug warning!</h2>
          <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Heading</h2>a
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
      -->

     

  <!--  </div> <!-- /container -->

  
