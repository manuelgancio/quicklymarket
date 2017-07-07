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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= $CSS ?>estilosPublicaciones.css"/>	
    <link rel="stylesheet" type="text/css" href="<?= $CSS ?>bootstrap.min.css"/>
    <script src="<?= $JS?>mostrarArticulo.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= $CSS ?>mostrarArticulo.css"/>	
    <!--<script src="<?= $JS?>"></script>-->
    <script type="text/javascript">
        function form_submit() {
        document.getElementById("formPermuta").submit();
        }    
    </script>
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
                        <div>
                            <form action="<?= $LOGICA?>/procesarCompra.php" role="form" id="formCompra" method="GET">
                                <input type="hidden" value="<?= $id_art?>" id="id_art" name="id_art" form="formCompra">
                                <input type="hidden" value="<?= $id_pub?>" id="id_pub" name="id_pub" form="formCompra">
                                <select id="cant" name="cant" class="drop-select" form="formCompra">
                                    <?php
                                    for($i=1;$i<=$art[0]['stock'];$i++){
                                        ?>
                                        <option value="<?=$i?>"><?php echo $i?></option>
                                        <?php
                                    }?>
                                </select>
                        </div>
                    </div>
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                    <!--AL COMPRAR MANDO EL ID DE LA PUBLICACION POR URL-->
                    <?php 
                        if ($pub[0]['tipo'] == '1'){
                            ?>
                            <input type="submit" class="btn btn-success" value="Comprar" form="formCompra">
                        </form >
                    <?php 
                        }else{ 

                            ?>
                            </form>
                            <!--<input type="hidden" value="y" id="btnPermuta" name="btnPermuta">
                            <input type="submit" class="btn btn-success" value="Permuta">-->
                            <a href=# class="btn btn-success" data-toggle="modal" data-target="#miModal">Permutar </a>
                            
                    <?php
                        }
                    ?>
                    <form action="../logica/procesarPermuta.php" name="formPermuta" id="formPermuta" method="POST">
                    </div>                                        
                </div>
                <!-- MODAL PERMUTA -->
                    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog" role="document">
		                    <div class="modal-content">
		                    	<div class="modal-header">
			                    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                    <span aria-hidden="true">&times;</span>
				                    </button>
				                    <h4 class="modal-title" id="myModalLabel">Permutar Artículo</h4>
			                    </div>
			                    <div class="modal-body">
                                <p>Seleccione que articulo desea ofrecer como permuta y en que cantidad.<br>
                                Recuerda, si ofreces un trato justo es mas probable que tu permuta sea aceptada!</p>
				                    
                                    
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col-sm-5">
                                        <label for="selPermu">Artículo: </label>
                                        <select id="selPermu" name="selPermu" class="form-control" form="formPermuta">
                                        <?php
                                        $correo_u = $_SESSION['Correo'];
                                        $id_usu = obtenerIdPersona($correo_u);
                                        $id_usu = $id_usu[0]['id_u'];  

                                        $pp = new art_pub('','',$id_usu,'','','');
                                        $pub= $pp->listarPermutas($conex);
                                        
                                        if ($pub != null){
                                            
                                            for($i=0;$i<count($pub);$i++){
                                                // Id art es el id del articulo de la publicacion
                                                $id_art_c = $pub[$i]['id_a'];
                                                $id_pub_c = $pub[$i]['id_pub'];
                                                                                            
                                                // Con el id del articulo creo el objeto articulo y llamo a la funcion listar articulo
                                                $aa = new articulo ($id_art_c,'','','','','','','','');
                                                $art = $aa->listarArticulo($conex);
                                                for($x=0;$x<count($art);$x++){
                                                    $nom_art = $art[$x]['nom_a'];
                                                    $cant=$art[$x]['stock'];
                                        ?>
                                            <option value="<?=$id_art_c?>"> <?php echo $nom_art?></option>
                                        <?php
                                                }   
                                            }
                                        }else{
                                            ?>
                                            <option value="" selected>No tiene permutas publicadas!</option>
                                            <?php 
                                        }
                                        ?>
                                        </select>
                                        </div><!--col sm 6-->
                                           <div class="col-sm-3">
                                                <label for="txtCant">Cant oferta: </label>
                                                <input type="text" class="form-control" id="txtCant" name="txtCant" form="formPermuta" placeholder="">
                                            </div> <!--col sm 2-->

                                            <input type="hidden" value=<?=$id_usu?> name="id_usu_compra" id="id_usu_compra" form="formPermuta">
                                            <input type="hidden" value =<?=$id_art?> name="id_art" id="id_art" form="formPermuta">

                                            <div class="col-sm-2">
                                                <label for="txtCant">Cant.</label>
                                                <input type="text" class="form-control" id="txtCantArt1" name="txtCantArt1" form="formPermuta">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="btnPermuta" >&nbsp;</label>
                                                <input type="submit" onclick="form_submit()" form="formPermuta" id="btnPermuta" class="btn btn-success success" >Ofertar
                                               <!-- <input type="button" onclick="form_submit()" id="btnPermuta" name="btnPermuta"  form="formPermuta" class="btn btn-success">Ofertar-->
                                               
                                            </div> <!--col-sm-2 btn-->   
                                    </form>                                            
                                    </div> <!--row-->
                                    <p style="margin-top:10px;">Enviaremos tu oferta.<br>Si es aceptada se te avisara en la sección notificaciones de tu perfil.</p>
                                                                  
			                    </div><!--body-->
                                
		                    </div>
	                    </div>
                    </div>
                     
        <!--FIN MODAL-->
                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Descripción</li>
                        <li>Comentarios</li>
                       
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
