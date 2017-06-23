<?php

/** EN ESTA PÁGINA MUESTRO TODAS LAS PUBLICACIONES
	REALIZADAS POR EL USUARIO
**/

require_once($CLASES_DIR .'articulo.class.php');
require_once($CLASES_DIR .'art_pub.class.php');
require_once($LOGICA_DIR .'funciones.php');

if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido!! " . $_SESSION['Correo'];
}
require_once($PRESENTACION_DIR . 'header.php');
?>
<html>
	<head> 
	<meta> 
    	<!--<script src="<?= $JS?>"></script>-->
    	<link rel="stylesheet" type="text/css" href="<?= $CSS ?>estilosPublicaciones.css"/>	
    	<link rel="stylesheet" type="text/css" href="<?= $CSS ?>bootstrap.min.css"/>
</meta>
</head>
<?php

	// conecto a la base
	$conex = conectar();
	// Obtengo id del usuario
	$correo_u = $_SESSION['Correo'];
	$id_usu = obtenerIdPersona($correo_u);
    $id_usu = $id_usu[0]['id_u'];  

	$pp = new art_pub('','',$id_usu,'','','');
	$pub= $pp->listarPublicaciones($conex);
	
	if ($pub != null){
		for($i=0;$i<count($pub);$i++){
			// Id art es el id del articulo de la publicacion
			$id_art = $pub[$i]['id_a'];
			$id_pub = $pub[$i]['id_pub'];
			// Con el id del articulo creo el objeto articulo y llamo a la funcion listar articulo
			$aa = new articulo ($id_art,'','','','','','','','');
			$art = $aa->listarArticulo($conex);
			//foreach ($art as $articulo){
			for($x=0;$x<count($art);$x++){
		
		
	?>
<body>
<div class="container">

    <hgroup class="mb20">
		<h1>Mis Publicaciones</h1>						
	</hgroup>

    <section class="col-xs-12 col-sm-6 col-md-12">
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Foto"  class="thumbnail"><img src="<?=$art[$x]['imagen']?>" alt="Foto" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2 excrept">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-calendar"></i> Fecha inicio: <span><?php echo $pub[$i]['fecha_in']?></span></li>
					<li><i class="glyphicon glyphicon-calendar"></i> Fecha fin: <span><?php echo $pub[$i]['fecha_fin']?></span></li>
					<li><i class="glyphicon glyphicon-exclamation-sign"></i>Estado: <span><?php echo $art[$x]['estado']?></span><li>
					<li><i class="glyphicon glyphicon-usd"></i> Precio: <span><?php echo $art[$x]['precio']?></span></li>
					<li><i class="glyphicon glyphicon-bookmark"></i> Cantidad: <span><?php echo $art[$x]['stock']?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7">
				<h3><a href="<?=$PRESENTACION?>/mostrarArticulo.php?id_art=<?=$id_art?>&id_pub=<?=$id_pub?>" title=""><?php echo $art[$x]['nom_a']?></a></h3>
				<p><?php echo $art[$x]['descripcion']?></p>	
			</div>
			<div class="row">
				<div class="col-sm-12" align="right">
					<a href="#" class="btn btn-primary" role="button" value="Modificar">Modificar</a>
					<a href="<?= $LOGICA?>/procesarArticulo.php?id_art=<?=$id_art?>&id_pub=<?=$id_pub?>" id="btnEliminar" name="btnEliminar" class="btn btn-danger" role="button" value="Eliminar">Eliminar</a>
				</div>
			</div>
			<span class="clearfix"></span>
			</article>	
	</section>
</div><!--container-->
<?php
			}
		}
	}