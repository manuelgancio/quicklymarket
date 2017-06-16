<?php
require_once($CLASES_DIR .'persona.class.php');
require_once($LOGICA_DIR .'funciones.php');

if(isset($_POST['submit_reg'])){

    $nombre = strip_tags($_POST['Nombre']);
    $apellido = strip_tags($_POST['Apellido']);
    $correo = strip_tags($_POST['Correo']);
    $telefono = strip_tags($_POST['Telefono']);
    $departamento = strip_tags($_POST['Departamento']);
    $ciudad = strip_tags($_POST['Ciudad']);
    $direccion = strip_tags($_POST['Direccion']);
    $num_puerta = strip_tags($_POST['Numero']);
    $password = strip_tags($_POST['Password']);
    $t_cretido = strip_tags($_POST['T_credito']);

// Valida que el correo no este ingresado en la base de datos 
   if (comprobarCorreo($correo) == false){
        ?>
            <script type="text/javascript">
                window.alert('El correo ya está registrado');
                location.href="../presentacion/index.php";
            </script>
        <?php

   }else {
        //hashear la password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //funcion elegir id 
        $id_P = elegirIdPersona();
        $id_U = elegirIdUsuario();

        //tipo usuario premium o basico 1= premium 0 = basico
        $tipo_usuario = 0;

        //conectar a la bd
        $conex = conectar();

        //crear objeto con los datos ingresados en el from
        $p = new Persona($id_P,$id_U,$nombre,$apellido,$correo,$telefono,$departamento,$ciudad,
        $direccion,$num_puerta,'',$tipo_usuario,$password,'',$t_cretido);

        $p->altaPersona($conex);

        ?>
            <script type="text/javascript">
                location.href="../presentacion/index.php";
            </script>
        <?php

        desconectar($conex);
   }
}




