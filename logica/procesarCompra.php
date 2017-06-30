<?php 
session_start();
/** PROCESO LA COMPRA DE UN ARTICULO 
    POR _GET RECIBO EL ID DE LA PUBLICACION 
    POR SESSION TENGO EL CORREO DEL USUARIO QUE COMPRA

    AL COMPRAR GUARDO FECHA EN LA TABLA SELECCIONA EN LA BASE
**/
    //Si no inicio sesion debe hacerlo
    if($_SESSION['logged'] != true){
    ?>
        <script type="text/javascript">
            window.alert("Debe iniciar sesión.");
            
        </script>
        <?php
    } else {
    $id_pub = $_GET['id_pub'];


    }