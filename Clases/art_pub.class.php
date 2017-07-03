<?php

class art_pub  //publicacion
{
    private $id;
    private $id_art;
    private $id_usu;
    private $fecha_inicio;
    private $fecha_fin;
    private $tipo_venta; //boolean (venta o permuta) 1 = venta 0= permuta
    private $estado_pub; //Bit - 0 = bloqueada o fin por fecha o sin stock - 1 = En curso 
    private $comentarios;//NO ESTA EN LA BASE

function __construct($id='',$id_art='',$id_usu='',$fecha_inicio='',$fecha_fin='',$tipo_venta='',$estado_pub='',$comentarios=''){
    $this->id=$id;
    $this->id_art=$id_art;
    $this->id_usu=$id_usu;
    $this->fecha_inicio=$fecha_inicio;
    $this->fecha_fin=$fecha_fin;
    $this->tipo_venta=$tipo_venta;
    $this->estado_pub=$estado_pub;
    $this->comentarios=$comentarios;
}

//Metodos SET

public function setId($id){
    $this->id=$id;
}
public function setIdArt($id_art){
    $this->id_art=$id_art;
}
public function setIdUsu($id_usu){
    $this->id_usu=$id_usu;
}
public function setFechaInicio($fecha_inicio){
    $this->fecha_inicio=$fecha_inicio;
}
public function setFechaFin($fecha_fin){
    $this->fecha_fin=$fecha_inicio;
}
public function setTipoVenta($tipo_venta){
    $this->tipo_venta=$tipo_venta;
}
public function setEstadoVenta($estado_pub){
    $this->estado_pub=$estado_pub;
}
public function setComentarios($comentarios){
    $this->comentarios=$comentarios;
}
 
//Metodos Get 

public function getId(){
    return $this->id;
}
public function getIdArt(){
    return $this->id_art;
}
public function getIdUsu(){
    return $this->id_usu;
}
public function getFechaInicio(){
    return $this->fecha_inicio;
}
public function getFechaFin(){
    return $this->fecha_fin;
}
public function getTipoVenta(){
    return $this->tipo_venta;
}
public function getEstadoPub(){
    return $this->estado_pub;
}
public function getComentarios(){
    return $this->comentarios;
}

//otros metodos

public function altaPublicacion($conex){
    $id_art=$this->getIdArt();
    $id_usu=$this->getIdUsu();
    $fecha_inicio=$this->getFechaInicio();
    $fecha_fin=$this->getFechaFin();
    $tipo=$this->getTipoVenta();
    $estado_pub=$this->getEstadoPub();// 1- activa 0=finalizaada o bloqueada

    $sql = "INSERT INTO `publica` (`fecha_in`,`fecha_fin`,`tipo`,`id_u`,`id_a`,`e_pub`)
    VALUES (:fecha_inicio, :fecha_fin, :tipo, :id_usu, :id_art,:e_pub)";

    $result = $conex->prepare($sql);
    $result->execute(array(':fecha_inicio'=>$fecha_inicio, ':fecha_fin'=>$fecha_fin,':tipo'=>$tipo
    , ':id_usu'=>$id_usu, ':id_art'=>$id_art,':e_pub'=>$estado_pub));

    // Guardo el id de la publicacion luego de insertar para redirigir a la publicacion finalizada
    $id_publicacion = $conex->lastInsertId();

    return ($id_publicacion);
}
public function listarPublicacion($conex){
/** FUNCION PARA LISTAR UNA PUBLICACION EN PARTICULAR 
    A PARTIR DE SU ID Y QUE ESTE ACTIIVA (OSEA QUE E_PUB = 1)
**/
    $id_pub =$this->getId();

    $sql="SELECT * FROM `publica` WHERE `id_pub` =:id AND `e_pub` = 1";

    $result = $conex->prepare($sql);
    $result->execute(array(':id'=>$id_pub));
    $result = $result->fetchALL();

    return ($result);

}
public function pubFinalizada($conex){
/** CAMBIA EL ESTADO DE LA PUBLICACION A 0 
    PARA USUAR CUANDO EL USUARIO COMPRO UN ARTICULO Y Y NO QUEDA EN STOCK
    O CUANDO SE BLOQUEA UNA PUBLICACION
**/ 
    $id_pub = $this->getId();

    $sql = "UPDATE `publica` SET `e_pub`=0 WHERE `id_pub` = :id_pub";
    $result = $conex->prepare($sql);
    $result->execute(array(':id_pub'=>$id_pub));

}
public function modificarPublicacion(){

}
public function bajaPublicacion($conex){
/**CAMBIA EL ATRIBULO E_PUB A 0 PARA QUE LA PUBLICACION NO FIGURE
**/
    $id_pub =$this->getId();
    $sql="UPDATE publica SET `e_pub` = 0 WHERE `id_pub` = :id_pub";

    $result =$conex->prepare($sql);
    $result->execute(array(':id_pub'=>$id_pub));
    
    if ($result){
        return (true);
    }else{
        return (false);
    }
}
public function listarPublicaciones($conex){
/** LISTO TODAS LAS PUBLICACIONES DE UN USUARIO SEGUN SU ID SOLO SI ESTA ACTIVA (ESTADO = 0)
**/
    $id_usu=$this->getIdUsu();
    // Consulta
    $sql= "SELECT `fecha_in`,`fecha_fin`,`tipo`,`id_a`,`id_pub` FROM `publica` WHERE `id_u` = :id_usu AND `e_pub`= 1";

    $result = $conex->prepare($sql);
    $result->execute(array(':id_usu'=>$id_usu));
    $result = $result->fetchALL();
    
    return($result);
    
}
public function obtenerIdPubXart($conex){
/** OBTENGO EL ID DE LA PUBLICACION CON EL ID DEL ARTICULO VINCULADO A ESTA
**/
    $id_art =$this->getIdArt();
    $sql="SELECT id_pub FROM publica WHERE id_a = :id_art AND e_pub = 1"; 

    $result = $conex->prepare($sql);
    $result->execute(array('id_art'=>$id_art));
    $result = $result->fetchALL();

    return($result);

}
public function reportarPublicacion(){

}




}



