<?php 

class PersistenciaPersona
{
    public function agregarPersona($obj, $conex){

    //obtener datos del objeto
   $id_P=$obj->getId();
   $id_U=$obj->getIdUsuario();
   $nombre= $obj->getNombre();
   $apellido= $obj->getApellido();
   $correo= $obj->getCorreo();
   $telefono= $obj->getTel();
   $departamento= $obj->getDepartamento();
   $ciudad= $obj->getCiudad();
   $direccion= $obj->getCalle();
   $num_puerta= $obj->getNumPuerta();
   $tipo_usuario= $obj->getTipoUsuario();
   $password= $obj->getPassword();
   $t_credito= $obj->getTcredito();
   



   //Encripto la password antes de guardarla
   //$password=sha1($password);

   //Genera la sentencia a ejecutar
   //La sql que vale es la primera, pero hay que completar los parametros en el execute
   //TABLA PERSONA
   $sql= "INSERT INTO `persona`(`id_p`,`p_nomb`, `p_ap`, `tel`, `calle`, `num`) VALUES (:id,:nombre,:apellido,:telefono,:direccion,:num_puerta)";


   $result = $conex->prepare($sql);
   $result->execute(array(':id'=>$id_P,':nombre'=>$nombre,':apellido'=>$apellido,':telefono'=>$telefono,
                        ':direccion'=>$direccion,':num_puerta'=>$num_puerta));

    //TABLA USUARIO
    //falta fecha inscripcion `fecha_ins`
    //falta reputacion "rep"
    $sql="INSERT INTO `usuario`(`id_u`, `correo`, `pass_u`, `tipo`, `depto`, `ciudad`, `id_p`) VALUES 
    (:id_U,:correo,:password,:tipo,:departamento,:ciudad,:id_per)";

    $result = $conex->prepare($sql);
    $result->execute(array(':id_U'=>$id_U,':correo'=>$correo,':password'=>$password,':tipo'=>$tipo_usuario,
    ':departamento'=>$departamento,':ciudad'=>$ciudad,':id_per'=>$id_P));


  //printf("El último registro insertado tiene el id %d\n", mysql_insert_id());
   

    //Para saber si hay error
    if($result){
        return(true);
    }             
    else{
        return(false);
    }
}

//Devuelve true si el login coincide con la password NO SE USA
   public function verificarLoginPassword($obj, $conex)
   {
        //Obtiene los datos del objeto $obj
        $correo= trim($obj->getCorreo());
        $pass=trim($obj->getPassword());
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "select * from usuario where correo=:correo and pass_u=:pass";
		
        $consulta = $conex->prepare($sql);
		/* FORMA 1 de pasar los parametros es con el m�todo bindParam
		/* con bindParam ligamos los par�metros de la consulta a las variables
		$consulta->bindParam(':login', $login, PDO::PARAM_STR);
		$consulta->bindParam(':pass', $pass, PDO::PARAM_STR);
		$consulta->execute();
		*/
		
		/* FORMA 2es pasar los par�metros como argumentos del m�todo execute
		 utilizando un array asociativo */
		$consulta->execute(array(":correo" => $correo, ":pass" => $pass));
		
		/*Despues de ejecutar la consulta como es un SELECT debo utilizar el m�todo
		fetchAll que devuelve un array que contiene todas las filas del conjunto de resultados
		*/
		$result = $consulta->fetchAll();
		//Devuelvo el array que puede tener un registro o estar vacio si el usuario y contrase�a no coinciden
		return $result;
    }


}

