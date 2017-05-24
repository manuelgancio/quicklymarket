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
   $password= $obj->getPassword();
   $t_credito= $obj->getTcredito();
   $tipo_usuario= $obj->getTipoUsuario();

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
}

