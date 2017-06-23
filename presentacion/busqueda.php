<?php
?>
<html>
<head> 
<meta>
    <link href='<?= $CSS?>/bootstrap.min.css' rel="stylesheet">
</meta>
</head>
<body style="margin-top:20px;">
<div class="container">
    <div class="row">    
        <div class="col-xs-8 col-xs-offset-2">
		    <div class="input-group">
            <form action="<?= $LOGICA?>/procesarBusqueda.php" method="GET" id="frmBuscar" name="frmBuscar" role="form">
                <div class="input-group-btn search-panel">
                    <select id="categoria" name="categoria" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <option value='' selected> Todas las categorías </option> 
                        
                    </select>   
                </div>       
                <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar">
                <span class="input-group-btn">
                    <button id="btnBuscar" name="btnBuscar" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
               </span>
               </form>
            </div>
        </div>
	</div>
</div><!--container-->
</body>

