<?php

function conectar(){
    try {
        $conexion = new PDO('mysql:localhost=localhost;dbname=basebase','root','');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return($conexion);
        }
        catch (PDOException $e){
            print ="<p>Error: No se puede conectar a la base de datos.</p> \n";
            
            exit();
            }
}

function desconectar(){
    $conexion=null;
}


