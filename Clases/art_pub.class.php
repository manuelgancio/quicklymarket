<?php

class art_pub  //publicacion
{
    private $id;
    private $id_art;
    private $id_usu;
    private $fecha_inicio;
    private $fecha_fin;
    private $tipo_venta; //boolean (venta o permuta) 1 = venta 0= permuta
    private $estado_venta; //en curso o finalizada// NO ESTA EN LA BASE 
    private $comentarios;//NO ESTA EN LA BASE

function __construct($id='',$id_art='',$id_usu='',$fecha_inicio='',$fecha_fin='',$tipo_venta='',$estado_venta='',$comentarios=''){
    $this->id=$id;
    $this->id_art=$id_art;
    $this->id_usu=$id_usu;
    $this->fecha_inicio=$fecha_inicio;
    $this->fecha_fin=$fecha_fin;
    $this->tipo_venta=$tipo_venta;
    $this->estado_venta=$estado_venta;
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
public function setEstadoVenta($estado_venta){
    $this->estado_venta=$estado_venta;
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
public function getEstadoVenta(){
    return $this->estado_venta;
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


    $sql = "INSERT INTO `publica` (`fecha_in`,`fecha_fin`,`tipo`,`id_u`,`id_a`)
    VALUES (:fecha_inicio, :fecha_fin, :tipo, :id_usu, :id_art)";

    $result = $conex->prepare($sql);
    $result->execute(array(':fecha_inicio'=>$fecha_inicio, ':fecha_fin'=>$fecha_fin,':tipo'=>$tipo
    , ':id_usu'=>$id_usu, ':id_art'=>$id_art));

    // Guardo el id de la publicacion luego de insertar para redirigir a la publicacion finalizada
    $id_publicacion = $conex->lastInsertId();

    return ($id_publicacion);
}
public function listarPublicacion($conex){
/** FUNCION PARA LISTAR UNA PUBLICACION EN PARTICULAR 
    A PARTIR DE SU ID
**/
    $id_pub =$this->getId();

    $sql="SELECT * FROM `publica` WHERE `id_pub` =:id";

    $result = $conex->prepare($sql);
    $result->execute(array(':id'=>$id_pub));
    $result = $result->fetchALL();

    return ($result);

}
public function modificarPublicacion(){

}
public function bajaPublicacion(){

}
public function listarPublicaciones($conex){
/** LISTO TODAS LAS PUBLICACIONES DE UN USUARIO SEGUN SU ID
**/
    $id_usu=$this->getIdUsu();
    // Consulta
    $sql= "SELECT `fecha_in`,`fecha_fin`,`tipo`,`id_a`,`id_pub` FROM `publica` WHERE `id_u` = :id_usu";

    $result = $conex->prepare($sql);
    $result->execute(array(':id_usu'=>$id_usu));
    $result = $result->fetchALL();
    
    return($result);
    
}
public function reportarPublicacion(){

}







}



