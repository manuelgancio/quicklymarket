<?php

class art_pub  //publicacionn
{
    private $id;
    private $id_art;
    private $id_usu;
    private $fecha_inicio;
    private $fecha_fin;
    private $tipo_venta; //boolean (venta o permuta)
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
    $fecha_inicio->getFechaInicio();
    $fecha_fin->getFechaFin();
    $tipo->getTipoVenta();
    

}
public function modificarPublicacion(){

}
public function bajaPublicacion(){

}
public function listarPublicaciones(){

}
public function reportarPublicacion(){

}







}



