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
<html lang="en" class="no-js">
	<head>
		
    </head>
    <body>
	    <div class="container">	
		    <form action='' method='POST' id='AltaArticulo'>
                <table>
                    <tr>
                    <th><input type='text' id='nombre' name='nombre' placeholder='Nombre articulo'></th>
                    </tr><tr>
                    <th><input type='text' id='descripcion' name='descripcion' placeholder='Descripcion'></th>
                    </tr><tr>
                    <th><select id='categoria' name='categoria' placeholder='categoria'>
                        <option value=''>Categoria</option>
                    </select>
                    </th>
                    </tr><tr>
                    <th>Tipo <input type="radio" name="Venta" value="true"> Venta</th>
                    <th><input type="radio" name="Permuta" value="false"> Permuta</th>
                    </tr><tr>
                    <th><input type='text'name='Precio' id='Precio' placeholder='Precio'></th>
                    </tr><tr>
                    <th>Estado <input type="radio" name="estado" id='estado'value="true"> Nuevo</th>
                    <th><input type="radio" name="estado" id='estado' value="false">Usado</th>
                    </tr><tr>
                    <th><input type='text' id='stock' name='stock' placeholder='Stock'></th>
                    </tr><tr>
                    <th><input type='submit' id='btnAltaArticulo' name='btnAltaArticulo' value='Guardar Artículo'></th>
                    </tr>
                </table>
            </form>
        </div> <!--container-->
    </body>
</html>