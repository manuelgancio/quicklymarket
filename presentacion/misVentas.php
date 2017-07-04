<?php
/**EN ESTA PAGINA MUESTRO LAS VENTAS REALIZADAS POR EL USUARIO

    BUSCO EN LA TABLA SELECCIONA CON EL ID DEL USUARIO EN ATRIBUTO ID_VENDENDOR
    Y LLAMO A LA FUNCION LISTAR VENTAS DE LA CLASE ART_COM
**/

require_once($CLASES_DIR .'articulo.class.php');
require_once($CLASES_DIR .'art_com.class.php');
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
/** CONECTO A LA BD**/
    $conex = conectar();
/**CON EL CORREO DEL USUARIO OBTENGO SU ID**/
    $correo = $_SESSION['Correo'];
    $id_usu = obtenerIdPersona($correo);
    $id_usu = $id_usu[0]['id_u'];
    
    $c = new art_com('','','',$id_usu,'','','','');
    $c = $c->listarVentas($conex);
    
    if ($c != null){
		for($i=0;$i<count($c);$i++){
			
			$id_art = $c[$i]['id_a'];
			$id_com = $c[$i]['id_sel'];
            $fecha_com =$c[$i]['fecha_comp'];
			// Con el id del articulo creo el objeto articulo y llamo a la funcion listar articulo
			$aa = new articulo ($id_art,'','','','','','','','');
			$art = $aa->listarArticulo($conex);
			for($x=0;$x<count($art);$x++){
                ?>
                <body>
<div class="container">
    <section class="col-xs-12 col-sm-6 col-md-12">
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Foto"  class="thumbnail"><img src="<?=$art[$x]['imagen']?>" alt="Foto" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2 excrept">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-calendar"></i> Fecha Venta: <span><?php echo $c[$i]['fecha_comp']?></span></li>
					<li><i class="glyphicon glyphicon-exclamation-sign"></i>Estado: <span><?php echo $art[$x]['estado']?></span><li>
					<li><i class="glyphicon glyphicon-usd"></i> Precio total: <span><?php $precio = $art[$x]['precio']*$c[$i]['cant']; echo$precio?></span></li>
					<li><i class="glyphicon glyphicon-bookmark"></i> Cantidad vendida: <span><?php echo $c[$i]['cant']?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7">
				<h3><?php echo $art[$x]['nom_a']?></a></h3>
				<p><?php echo $art[$x]['descripcion']?></p>	
			</div>
			<div class="row">
				<div class="col-sm-12" align="right">
                <!--BOTONES-->
				</div>
			</div>
			<span class="clearfix"></span>
			</article>	
	</section>
</div><!--container-->
<?php
            }
        }
    }else{
        echo 'No tiene ventas concretadas!';
    }

