<?php
/** EN ESTA PAGINA LISTO LOS RESULTADOS DE LA BUSQUEDA
**/

require_once($PRESENTACION_DIR . 'header.php');
require_once($CLASES_DIR . 'art_pub.class.php');
require_once($CLASES_DIR . 'articulo.class.php');
require_once($LOGICA_DIR . 'funciones.php');

/** MEDIANTE GET RECIBO LA VARIABLE BUSQUEDA Y LA VARIABLE CAT CON EL ID DE LA CATEGORIA
	SI CAT ES NULL DEBE BUSCAR EN TODAS LAS CATEGORIAS
**/

	$busqueda = strip_tags($_GET['busqueda']);
    $id_cat = strip_tags($_GET['cat']);
    if($id_cat != ''){//Si la se ingreso una categoria
        $conex = conectar();
        $b = new articulo('',$busqueda,'',$id_cat,'','','');
        $res = $b->buscarArtNombreCat($conex);
    }else if ($id_cat == ''){//Si no se ingreso una categoria
        $conex= conectar();
        $b= new articulo ('',$busqueda,'','','','','');
        $res = $b->buscarArtNombre($conex);
    }
    //Resultados de la busqueda
    ?>
    <html>
        <head>  
            <!--<script src="<?= $JS?>"></script>-->
            <link rel="stylesheet" type="text/css" href="<?= $CSS ?>estilosPublicaciones.css"/>	
            <link rel="stylesheet" type="text/css" href="<?= $CSS ?>bootstrap.min.css"/>
    </head>
    <hgroup class="mb20">
		<h1>Resultados para: <?php echo $busqueda?></h1>						
	</hgroup>
    <?php 
    for($i=0;$i<count($res);$i++){
        $id_art = $res[$i]['id_a'];
        
        $conex = conectar();
        $p= new art_pub('',$id_art,'','','','','');
        $pp = $p->obtenerIdPubXart($conex);
        $id_pub = $pp[0]['id_pub'];
        /**CON LA ID DE LA PUB OBTENGO EL TIPO (VENTA O PERMUTA)**/
        $tipo_p = new art_pub($id_pub,'','','','','','');   
        $tipo_p = $tipo_p->obtenerTipo($conex);
           
        ?>
        <body>
<div class="container">
    <section class="col-xs-12 col-sm-6 col-md-12">
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="<?=$PRESENTACION?>/mostrarArticulo.php?id_art=<?=$id_art?>&id_pub=<?=$id_pub?>" title="Foto" class="thumbnail"><span><img src="<?=$res[$i]['imagen']?>" alt="Foto"/></span></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2 excrept">
				<ul class="meta-search">					
					<li><i class="glyphicon glyphicon-exclamation-sign"></i>Estado: <span><?php echo $res[$i]['estado']?></span><li>
					<li><i class="glyphicon glyphicon-usd"></i> Precio: <span><?php echo $res[$i]['precio']?></span></li>
                    <li><i class="glyphicon glyphicon-exclamation-sign"></i>Estado <h4 style='color:#3ADF00;'><span><?php echo $tipo_p?></span><li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7">
			<h3><a href="<?=$PRESENTACION?>/mostrarArticulo.php?id_art=<?=$id_art?>&id_pub=<?=$id_pub?>" title=""><?php echo $res[$i]['nom_a']?></a></h3>
            </div>
			<div class="row">
				<div class="col-sm-12" align="right">
                    <!--div opcional para botones
					<a href="<?= $LOGICA?>/procesarArticulo.php?role=mod&id_art=<?=$id_art?>&id_pub=<?=$id_pub?>" class="btn btn-primary" role="button" value="Modificar">Modificar</a>
					<a href="<?= $LOGICA?>/procesarArticulo.php?role=delete&id_art=<?=$id_art?>&id_pub=<?=$id_pub?>" id="btnEliminar" name="btnEliminar" class="btn btn-danger" role="button" value="Eliminar">Eliminar</a>
				-->
                </div>
			</div>
			<span class="clearfix"></span>
			</article>	
	</section>
</div><!--container-->
<?php
    }