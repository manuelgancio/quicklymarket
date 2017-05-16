<?php


function conectar()
{
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return($conexion);
    } catch (PDOException $e) {
        
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";

        exit();
    }
}


function desconectar($conexion)
{
   $conexion=null;
  
}

function salir() {
	session_unset();
	session_destroy();

}

	
	

 
?>    