<?php

function conectar(){
    try {
        $conexion = new PDO('mysql:localhost=localhost;dbname=bd','root','');
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


function elegirId(){


    $conex = conectar();

    $sql='SELECT max(Id_P) as Id_P from Persona';

    foreach ($conex->query($sql) as $row) {
       // print $row['Id_P'] ;

        $maxId = $row['Id_P'];
    }

    $newId = $maxId + 1; 
   

    return($newId);
}
