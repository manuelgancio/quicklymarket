<?php
require_once($CLASES_DIR .'articulo.class.php');
require_once($LOGICA_DIR .'funciones.php');

?>
<?php
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}
require_once($PRESENTACION_DIR . 'header.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
        <script src="<?= $JS?>jquery-3.1.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
           
        <script src="<?= $JS?>publicarForm.js"></script>
        <script src="<?= $JS?>validar.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= $CSS ?>publicarForm.css"/>	
        <link rel="stylesheet" type="text/css" href="<?= $CSS ?>bootstrap.min.css"/>
	    	
    </head>
<body>
<div class="container">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            
 <form action="<?= $LOGICA?>/procesarArticulo.php" method='POST' id='AltaArticulo' role="form" enctype="multipart/form-data"  onsubmit="return validarformArticulo(this)">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                    <h3>Datos del artículo</h3>
                        <div class="step1">
                            <div class="row">
                            <div class="col-md-6">
                                <label for="nombre">Nombre/Título</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre artículo">
                                <div id="error_msg_nom"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                                <div id="error_msg_desc"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="categoria">Categoría</label>
                                <?php 
                                $conex = conectar();
                                $c = new articulo();
                                $datos_c= $c->listarCategorias($conex);
                                
                                    if (empty($datos_c)){
                                        echo "No hay categorias para elegir";        
                                    }else{
                                        ?>
                                        <select name="categoria" id="categoria" class="dropselectsec">
                                            <option value='' selected> Seleccione una categoría </option> 
                                        <?php for($i=0;$i<count($datos_c);$i++){
                                            $id=$datos_c[$i]['id_cat'];
                                            $cat=$datos_c[$i]['nomb_cat'];                               
                                            echo "<option value= $id > $cat </option>";
                                            }
                                    }                            
                                     ?>
                                        </select>
                                        <div id="error_msg_cat"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="precio">Precio</label>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="UYU">
                                <div id="error_msg_precio"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <label for="estado" >Estado</label>
                                    <label class="radio-inline">
                                      <input type="radio" name="estado" id="estado" value="Nuevo"> Nuevo
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="estado" id="estado" value="Usado"> Usado
                                    </label>
                                    <div id="error_msg_estado"></div>
                            </div>
                            <div class="col-md-6">
                            <label for="stock">Cantidad</label>
                                <div class="row">
                                    <div class="col-md-3 col-xs-3">
                                        <input type="text" class="form-control" id="stock" name="stock" placeholder="">
                                    </div>
                                </div>
                            </div>                
                        </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <!--<li><button type="submit" id="btnAltaArticulo" name="btnAltaArticulo"  onclick="habilitarSiguiente()" class="btn btn-primary">Guardar</button></li>
                            -->
                            <li><button type="button"  id="btnSiguiente" class="btn btn-primary next-step" >Siguiente</button></li>
                        </ul>   
                    </div>
                    
                    <!--SUBIR IMAGENES-->
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Ingrese una imágen (opcional)</h3>
                        <p>Imágen:</p>
                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                        <ul></ul>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                        <!--<li><button type="submit" id="btnAltaArticulo" name="btnAltaArticulo"  onclick="habilitarSiguiente()" class="btn btn-primary next-step">Guardar y Continuar</button></li>-->
                        <!--</form>-->
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Datos de la publicación</h3>
                        <p>Usando QuicklyMarket usted puede elegir entre vender o permutar su producto.</p>

                        <!--<form action="<?= $LOGICA?>/procesarArticulo.php" method='POST' id='AltaPublicacion' role="form" enctype="multipart/form-data">-->
                        <div class="row">
                            <div class="col-md-6">
                                    <label for="tipo" >Tipo</label>
                                    <label class="radio-inline">
                                      <input type="radio" name="tipo" id="tipo" value="1"> Venta
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="tipo" id="tipo" value="0"> Permuta
                                    </label>
                            </div>
                            <div id="error_msg_tipo"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fecha_inicio">Fecha inicio</label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" step="1"  value="<?php echo date("Y-m-d");?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <label for="duracion"> Duración de la publicación </label>
                            <select name="duracion" id="duracion" class="dropselectsec">
                                <option value='15'> 15 Días </option> 
                                <option value='30'> 30 Días </option>
                                <option value='45'> 45 Días </option>
                                <option value='60'> 60 Días </option> 
                            </select>
                            <div id="error_msg_duracion"></div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
                            <li><button type="submit" id="btnAltaArticulo" name="btnAltaArticulo" class="btn btn-primary">Guardar y Finalizar</button></li>
                        </ul>
                    </div>
                    <!--<div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Publicación completada!</h3>
                        <p>Felicitaciones, su publicación esta lista.</p>
                        <p>Puede ver su publicación en sus publicaciones</p>
                    </div>-->
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
</body>
