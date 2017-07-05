<?php

require_once($CLASES_DIR .'persona.class.php');
require_once($LOGICA_DIR .'funciones.php');

if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == True){
	echo "Bienvenido! " . $_SESSION['Correo'];
}

?>
<html>
	<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="<?= $JS?>/perfil.js"></script>
		<link rel="stylesheet" type="text/css"  href='<?= $CSS?>/bootstrap.min.css'>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
    <header><?php
    require_once($PRESENTACION_DIR . 'header.php');
    ?>
    </header>
	<body>
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-horizontal admin-menu">
                    <li class="active"><a href="" data-target-id="perfil"><i class="glyphicon glyphicon-user"></i> Mis datos</a></li>
                    <li><a href="" data-target-id="change-password"><i class="glyphicon glyphicon-lock"></i> Cambiar contraseña</a></li>
                    <li><a href="" data-target-id="settings"><i class="glyphicon glyphicon-bell"></i> Notificaciones</a></li>
                    <li><a href="" data-target-id="logout"><i class="glyphicon glyphicon-usd"></i> Premium</a></li>
                </ul>
            </div>

            <div class="col-md-12  admin-content" id="perfil">
			<?php #PHP PARA CARGAR LOS DATOS DEL USUARIO
			$conex=conectar();
			$correo = $_SESSION['Correo'];
			$p = new persona('','','','',$correo,'','','','','','','','','','');
			$pp = $p->listarPersona($conex);
			//die(var_dump($pp));
			?>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nombre</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $pp[0]['p_nomb'] .' '.$pp[0]['p_ap'];?>
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Correo</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $_SESSION['Correo'];?>
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Teléfono</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $pp[0]['tel'];?>
                    </div>
                </div>
				<div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dirección</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $pp[0]['calle'] .' '.$pp[0]['num'];?>
                    </div>
                </div>
            </div><!-- fin tab perfil-->

			<!--NOTIFICACION DE CUANDO ALGO VENDIO-->
   			<div class="col-md-12  admin-content" id="settings">
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Notificaciones</h3>
                    </div>
                    <div class="panel-body">
                        <div class="label label-success">No tiene notificaciones!</div>
                    </div>
                </div>
            </div>
			<!--CAMBIO CONTRASEÑA-->
            <div class="col-md-12  admin-content" id="change-password">
                <form action="<?=$LOGICA?>/procesarCambioPassword.php" method="POST">
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="pass1" class="control-label panel-title">Nueva contraseña</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pass1" name="pass1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="conf_pass" class="control-label panel-title">Confirme la contraseña</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="conf_pass" id="conf_pass" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info border" style="margin: 1em;">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="pull-left">
                                    <input type="submit" class="form-control btn btn-primary" name="btnCambioPass" id="btnCambioPass">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
			<!--PARA PASAR A PREMIUM-->
           <!-- <div class="col-md-9  admin-content" id="settings"></div>
			<div class="col-md-9  admin-content" id="logout">
					<div class="panel panel-info" style="margin: 1em;">
						<div class="panel-heading">
							<h3 class="panel-title">Confirm Logout</h3>
						</div>
						<div class="panel-body">
							Do you really want to logout ?  
							<a  href="#" class="label label-danger"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								<span >   Yes   </span>
							</a>    
							<a href="/account" class="label label-success"> <span >  No   </span></a>
						</div>
						<form id="logout-form" action="#" method="POST" style="display: none;">
						</form>
                	</div>
         	   </div>
			</div>-->
</div><!--container-->
</body>