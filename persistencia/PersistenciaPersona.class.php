<?php 

class PersistenciaPersona
{
    public function agregarPersona($obj, $conex){

    
   //obtener datos del objeto
   $id_P=$obj->get_Id();
   $nombre= $obj->getNombre();
   $apellido= $obj->getApellido();
   $correo= $obj->getCorreo();
   $telefono= $obj->getTel();
   $pais= $obj->getPais();
   $ciudad= $obj->getCiudad();
   $direccion= $obj->getCalle();
   $num_puerta= $obj->getNumPuerta();
   $password= $obj->getPassword();
   $t_credito= $obj->getTcredito();


   //Encripto la password antes de guardarla
   //$password=sha1($password);

   //Genera la sentencia a ejecutar
   //La sql que vale es la primera, pero hay que completar los parametros en el execute
   $sql= "INSERT INTO `persona`('Id_P',`P_Nomb`, `P_Ap`, `tel`, `calle`, `nro`) VALUES (:id,:nombre,:apellido,:telefono,:direccion,:num_puerta)";


   //INSERT INTO `usuario`(`correo`, `pass_u`,`ciudad`, `id_p`) VALUES (:correo,:password,:ciudad,)
    // cambiar aca para agregar el id a la bd
   $result = $conex->prepare($sql);
   $result->execute(array(':nombre'=>$nombre,':apellido'=>$apellido,':telefono'=>$telefono,
                        ':direccion'=>$direccion,':num_puerta'=>$num_puerta,));


  //printf("El último registro insertado tiene el id %d\n", mysql_insert_id());
   


   $iddd = elegirId();
   echo $iddd;

    //Para saber si hay error
    if($result){
        return(true);
    }             
    else{
        return(false);
    }
}
}

