<?php

class articulo
{
    private $id;
    private $nombre;
    private $descripcion;
    private $categoria;
    private $tipo; //boolean (venta o permuta) true= venta false=permuta
    private $precio;
    private $estado; //boolean (nuevo/usado) true= nuevo false= usado
    private $stock; 
    private $img;


function __construct($id='',$nombre='',$descripcion='',$categoria='',$tipo='',$precio='',$estado='',$stock='',$img=''){
    $this->id=$id;
    $this->nombre=$nombre;
    $this->descripcion=$descripcion;
    $this->categoria=$categoria;
    $this->tipo=$tipo;
    $this->precio=$precio;
    $this->estado=$estado;
    $this->stock=$stock;
    $this->img=$img;
}

// Metodos SET

public function setId($id){
    $this->id=$id;
}
public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setDescripcion($descripcion){
    $this->descripcion=$descripcion;
}
public function setCategoria($categoria){
    $this->categoria=$categoria;
}
public function setTipo($tipo){
    $this->tipo=$tipo;
}
public function setEstado($estado){
    $this->estado=$estado;
}
public function setStock($stock){
    $this->stock=$stock;
}

//Metodos Get 

public function getId(){
    return $this->id;
}
public function getNombre(){
    return $this->nombre;
}
public function getDescripcion(){
    return $this->descripcion;
}
public function getCategoria(){
    return $this->categoria;
}
public function getTipo(){
    return $this->tipo;
}
public function getEstado(){
    return $this->estado;
}
public function getStock(){
    return $this->stock;
}

//Otros metodos

public function publicarArticulo(){

}
public function modificarArticulo(){

}
public function bajaArticulo(){

}
public function comprarArticulo(){

}
public function listarArticulos(){

}
public function comentarArticulo(){

}
public function verInformacionVendedor()
{
    
}


}