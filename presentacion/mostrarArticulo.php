<?php 

if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}
include_once($LOGICA_DIR . 'funciones.php');
include_once($CLASES_DIR . 'art_pub.class.php');
include_once($CLASES_DIR . 'articulo.class.php');

require_once($PRESENTACION_DIR . 'header.php');

/** POR LA URL PASE LA VARIABLE ID_ART Y ID_PUB 
    LAS CUALES USARE PARA CONSULTAR EN LA BASE ESA PUBLICACION
    Y MOSTRARLO EN PANTALLA
**/
//Obtengo las variables que pase por la url
$id_art = $_GET['id_art'];
$id_pub = $_GET['id_pub'];
$conex = conectar();

//Creo el obj publicacion con el id y llamo a la funcion listarPublicacion
    $p = new art_pub($id_pub,'','','','','');
	$pub= $p->listarPublicacion($conex);
    
//Creo el obj articulo con el id y llamo a la funcion listarArticulo
    $a = new articulo ($id_art,'','','','','','','','');
	$art = $a->listarArticulo($conex);



?>
<html>
<head> 
<meta> 
    	<!--<script src="<?= $JS?>"></script>-->
    	<link rel="stylesheet" type="text/css" href="<?= $CSS ?>estilosPublicaciones.css"/>	
    	<link rel="stylesheet" type="text/css" href="<?= $CSS ?>bootstrap.min.css"/>
        <script src="<?= $JS?>mostrarArticulo.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= $CSS ?>mostrarArticulo.css"/>	
</meta>
</head>
    <body>
        <div class="container">
        	<div class="row">
               <div class="col-xs-4 item-photo">
                    <img style="max-width:100%;" class="thumbnail" src="<?=$art[0]['imagen']?>" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo $art[0]['nom_a']?></h3>    
                    <!--<h5 style="color:#337ab7">vendido por <a href="#">Samsung</a> · <small style="color:#337ab7">(5054 ventas)</small></h5>-->
        
                    <!-- Precios -->
                    <h6 class="title-price"><small>PRECIO</small></h6>
                    <h3 style="margin-top:0px;"><?php echo '$U ' . $art[0]['precio']?></h3>
        
                    <!-- Detalles especificos del producto -->
                    <!--<div class="section">
                        <h6 class="title-attr" style="margin-top:15px;" ><small>COLOR</small></h6>                    
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>-->
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr"><small>ESTADO</small></h6>                    
                        <div>
                            <h3 style="margin-top:0px;"><?php echo $art[0]['estado']?></h3>
                        </div>
                    </div>   
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>DISPONIBLES</small></h6>                    
                        <div>
                            <h3 style="margin-top:0px;"><?php echo $art[0]['stock']?></h3>
                        </div>
                    </div>                
        
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                    <!--AL COMPRAR MANDO EL ID DE LA PUBLICACION POR URL-->
                        <a href="<?=$LOGICA?>/procesarCompra.php?id_pub=<?=$id_pub?>&id_art=<?=$id_art?>" class="btn btn-success"><span style="margin-right:20px" aria-hidden="true"></span> Comprar</a>
                        </div>                                        
                </div>                              
        
                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Descripción</li>
                        <li>Garantía</li>
                        <li>Vendedor</li>
                        <li>Envío</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <p>
                            <?php echo $art[0]['descripcion'];?>
                            </p>
                        </p>
                      
                    </div>
                </div>		
            </div>
        </div>        
    </body>
</html>
