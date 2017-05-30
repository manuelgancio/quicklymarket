<?php

function conectar(){
    
    try {
        $conexion = new PDO('mysql:host=' .DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return($conexion);
        }
        catch (PDOException $e){
            print "<p>Error: No se puede conectar a la base de datos.</p> \n";
            
            exit();
            }
}

function desconectar(){
    $conexion=null;
}


function elegirIdPersona(){
    $conex = conectar();
    $sql='SELECT max(Id_P) as Id_P from Persona';

    foreach ($conex->query($sql) as $row) {
       // print $row['Id_P'] ;

        $maxId = $row['Id_P'];
    }

    $newId = $maxId + 1; 

    return($newId);
}

function elegirIdUsuario(){
    $conex = conectar();
    $sql='SELECT max(Id_u) as Id_U from usuario';

    foreach ($conex->query($sql) as $row){
        $maxId = $row['Id_U'];
    }
    $newId = $maxId + 1; 

    return($newId);
}
