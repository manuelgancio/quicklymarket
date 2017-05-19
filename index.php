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
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
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
				
				
				
				<form action="./logica/procesarLogin.php" method="POST" id="FrmIngreso" enctype="application/x-www-form-urlencoded">		

				<div id="login" class="loginClass"> 

					<table >
						<tr>
							<th><input type="text" name="NomUsuario" id="NomUsuario" placeholder="Usuario"> </th>
						</tr>
						<tr>
							<th><input type="Password" name="PassUsuario" id="PassUsuario" placeholder="contraseña"></th>
						</tr> 
						<tr>
						<th>
						
							<input  class="button button4" type="submit" value="Ingresar"  title="Ingresar a la aplicación" />
						<th>
						<tr>
							
						<tr>
							<th>
								<a href="#">¿No estás registrado?</a>
							</th>
						<tr>
					</table>
				</div>
			</form>			

				
			</header>
			<div class="main">
											
					<div align="center" id="busquedaInicial">
					<input class="w3-input" "type="text" name="Busqueda" placeholder="¿Que es lo que desea buscar?" size="80">
					</div>
					
				<div id="mi-slider" class="mi-slider">
				
					<ul>
						<li><a href="#"><img src="images/1.jpg" alt="img01"><h4>Botas</h4></a></li>
						<li><a href="#"><img src="images/2.jpg" alt="img02"><h4>zapatos</h4></a></li>
						<li><a href="#"><img src="images/3.jpg" alt="img03"><h4>mocasines</h4></a></li>
						<li><a href="#"><img src="images/4.jpg" alt="img04"><h4>championes</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/5.jpg" alt="img05"><h4>Cinturones</h4></a></li>
						<li><a href="#"><img src="images/6.jpg" alt="img06"><h4>gorros &amp; </h4></a></li>
						<li><a href="#"><img src="images/7.jpg" alt="img07"><h4>Lentes de sol</h4></a></li>
						<li><a href="#"><img src="images/8.jpg" alt="img08"><h4>Bufandas</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/9.jpg" alt="img09"><h4>Casual</h4></a></li>
						<li><a href="#"><img src="images/10.jpg" alt="img10"><h4>Retro</h4></a></li>
						<li><a href="#"><img src="images/11.jpg" alt="img11"><h4>Sport</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/12.jpg" alt="img12"><h4>Con ruedas</h4></a></li>
						<li><a href="#"><img src="images/13.jpg" alt="img13"><h4>Carteras grandes</h4></a></li>
						<li><a href="#"><img src="images/14.jpg" alt="img14"><h4>Para laptop</h4></a></li>
						<li><a href="#"><img src="images/15.jpg" alt="img15"><h4>maletin</h4></a></li>
					</ul>
					<nav>
						<a href="#">Zapatos</a>
						<a href="#">Accesorios</a>
						<a href="#">Relojes</a>
						<a href="#">Mochilas</a>
					</nav>
				</div>
			</div>
		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.catslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>
	</body>
</html>