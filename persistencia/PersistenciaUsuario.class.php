<?php
class PersistenciaUsuario
{
    //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
    public function agregar($obj, $conex)
    {
        //Obtiene los datos del objeto $obj
       
        $login= $obj->getLogin();
        $password = $obj->getPassword();
        $nombre=$obj->getNombre();
        $apellido=$obj->getApellido();
        $categoria = $obj->getCategoria();
        $ci = $obj->getCedula();
        $correo = $obj->getCorreo();
        $celular = $obj->getCelular();
        $horario = $obj->getHorario();
        $fecNac = $obj->getFecNac();
        
		//Encripto la password antes de guardarla
        $password=sha1($password);
      
        
        //Genera la sentencia a ejecutar
		//La sql que vale es la primera, pero hay que completar los parametros en el execute
		
		$sql = "insert into usuario (login,password,nombre,apellido,categoria,ci,correo,celular,horario,fecNac) values (:login, :password,:nombre,:apellido,:categoria, :ci, :correo, :celular, :horario, :fecnac)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":login" => $login, ":password" => $password,
								":nombre" => $nombre,":apellido" => $apellido,
								":categoria" => $categoria,":ci" => $ci,
								":correo" => $correo,":celular" => $celular,
								":horario" => $horario,":fecnac"=>$fecNac));
        
        
        //Para saber si ocurrió un error
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }

     

   //Devuelve true si el login coincide con la password
   public function verificarLoginPassword($obj, $conex)
   {
        //Obtiene los datos del objeto $obj
        $login= trim($obj->getLogin());
        $pass= sha1(trim($obj->getPassword()));

        $sql = "select * from usuario where login=:login and password=:pass";
		
        $consulta = $conex->prepare($sql);
		/* FORMA 1 de pasar los parametros es con el método bindParam
		/* con bindParam ligamos los parámetros de la consulta a las variables
		$consulta->bindParam(':login', $login, PDO::PARAM_STR);
		$consulta->bindParam(':pass', $pass, PDO::PARAM_STR);
		$consulta->execute();
		*/
		
		/* FORMA 2es pasar los parámetros como argumentos del método execute
		 utilizando un array asociativo */
		$consulta->execute(array(":login" => $login, ":pass" => $pass));
		
		/*Despues de ejecutar la consulta como es un SELECT debo utilizar el método
		fetchAll que devuelve un array que contiene todas las filas del conjunto de resultados
		*/
		$result = $consulta->fetchAll();
		//Devuelvo el array que puede tener un registro o estar vacio si el usuario y contraseña no coinciden
		return $result;
    }

   public function consTodos( $conex)
   {
       
        $sql = "select * from usuario";
		
        $result = $conex->prepare($sql);
		$result->execute();
		$resultados=$result->fetchAll();
        //Obtiene el registro de la tabla Usuario 

       return $resultados;
    }
    
    public function consUno($obj, $conex)
   {
        $id= trim($obj->getId());   
        $sql = "select * from usuario where id=:id";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id" => $id));
		$resultados=$result->fetchAll();
        //Obtiene el registro de la tabla Usuario 

       return $resultados;
    }
	
	public function modificar($obj, $conex)
   {
        $id= trim($obj->getId()); 
        $nombre=$obj->getNombre();
        $apellido=$obj->getApellido();
        $categoria = $obj->getCategoria();
        $ci = $obj->getCedula();
        $correo = $obj->getCorreo();
        $celular = $obj->getCelular();
        $horario = $obj->getHorario();
        $fecNac = $obj->getFecNac();
		
        $sql = "update usuario set nombre=:nombre,apellido=:apellido ,categoria=:categoria, ci=:ci, correo=:correo, celular=:celular,horario=:horario,fecnac=:fecnac where id=:id";
	   
		
        $result = $conex->prepare($sql);
		
	    $result->execute(array(":nombre" => $nombre,":apellido" => $apellido,
								":categoria" => $categoria,":ci" => $ci,
								":correo" => $correo,":celular" => $celular,
								":horario" => $horario,
	    						":fecnac" => $fecNac,
								":id"=>$id));
        
       return $result;
    }
	
	public function eliminar($obj, $conex)
    {
        $id= trim($obj->getId());      		
        $sql = "delete from usuario where id=:id";

        $result = $conex->prepare($sql);
		
	    $result->execute(array(":id"=>$id));
        		
       return $result;
    }
 }

?>
