<?php
//session_start();
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];	
}

require_once($CLASES_DIR .'articulo.class.php');
require_once($LOGICA_DIR .'funciones.php');
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Quickly Market</title>
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="<?= $CSS ?>style.css"/>
        <link rel="stylesheet" type="text/css" href="<?= $CSS ?>bootstrap.min.css"/>
		<script src="<?= $JS?>modernizr.custom.63321.js"></script>
		<script src="<?= $JS?>busqueda.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
		<?php
		require_once($PRESENTACION_DIR .'header.php');
		?>
	</head>
	


	<!--BUSQUEDA-->
	<section>
	<div class="container" style="margin-top:30px;">
    <div class="row">    
        <div class="col-xs-8 col-xs-offset-2">
		<form action="<?=$PRESENTACION?>/resultados.php" method="GET" role="form">
		    <div class="input-group">
                <div class="input-group-btn search-panel">
				<?php 
                    $conex = conectar();
                    $c = new articulo();
                    $datos_c= $c->listarCategorias($conex);
                                
                    if (empty($datos_c)){
                    	echo "No hay categorias para elegir";        
                    }else{
                ?>
                    <select id="cat" name="cat" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<option value="" selected> Todas las categorías </option>
                    	<?php 
							for($i=0;$i<count($datos_c);$i++){
                                $id=$datos_c[$i]['id_cat'];
                                $cat=$datos_c[$i]['nomb_cat'];                               
                                echo "<option value=$id> $cat </option>";
                                }
                            }                            
                        ?> 
                    </select>
                </div>    
                <input type="text" id="busqueda" name="busqueda" class="form-control" placeholder="Busqueda...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
				</form>
            </div>
        </div>
	</div>
</div>
</section>


    

  			<div id="mi-slider" class="mi-slider">
				<ul>
					<li><a href="#"><img src="<?=$IMG?>/1.jpg" alt="img01"><h4>Botas</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/2.jpg" alt="img02"><h4>zapatos</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/3.jpg" alt="img03"><h4>mocasines</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/4.jpg" alt="img04"><h4>championes</h4></a></li>
				</ul>
				<ul>
					<li><a href="#"><img src="<?=$IMG?>/5.jpg" alt="img05"><h4>Cinturones</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/6.jpg" alt="img06"><h4>gorros &amp; </h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/7.jpg" alt="img07"><h4>Lentes de sol</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/8.jpg" alt="img08"><h4>Bufandas</h4></a></li>
				</ul>
				<ul>
					<li><a href="#"><img src="<?=$IMG?>/9.jpg" alt="img09"><h4>Casual</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/10.jpg" alt="img10"><h4>Retro</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/11.jpg" alt="img11"><h4>Sport</h4></a></li>
				</ul>
				<ul>
					<li><a href="#"><img src="<?=$IMG?>/12.jpg" alt="img12"><h4>Con ruedas</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/13.jpg" alt="img13"><h4>Carteras grandes</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/14.jpg" alt="img14"><h4>Para laptop</h4></a></li>
					<li><a href="#"><img src="<?=$IMG?>/15.jpg" alt="img15"><h4>maletin</h4></a></li>
				</ul>
				<nav>
					<a href="#">Zapatos</a>
					<a href="#">Accesorios</a>
					<a href="#">Relojes</a>
					<a href="#">Mochilas</a>
				</nav>
			</div>
		</div>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="<?=$JS?>/jquery.catslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>
	
</html>