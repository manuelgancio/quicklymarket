<?php

class articulo
{
    private $id;
    private $nombre;
    private $descripcion;
    private $categoria;
    private $precio;
    private $estado; 
    private $stock; 
    private $img;
    private $id_usu;


function __construct($id='',$nombre='',$descripcion='',$categoria='',$precio='',$estado='',$stock='',$img='',$id_usu=''){
    $this->id=$id;
    $this->nombre=$nombre;
    $this->descripcion=$descripcion;
    $this->categoria=$categoria;
    $this->precio=$precio;
    $this->estado=$estado;
    $this->stock=$stock;
    $this->img=$img;
    $this->id_usu=$id_usu;
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
public function setEstado($estado){
    $this->estado=$estado;
}
public function setStock($stock){
    $this->stock=$stock;
}
public function setPrecio($precio){
    $this->precio=$precio;
}
public function setImg($img){
    $this->img=$img;
}
public function setIdUsu($id_usu){
    $this->id_usu=$id_usu;
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
public function getEstado(){
    return $this->estado;
}
public function getStock(){
    return $this->stock;
}
public function getPrecio(){
    return $this->precio;
}
public function getImg(){
    return $this->img;
}
public function getIdUsu(){
    return $this->id_usu;
}
//Otros metodos

public function altaArticulo($conex){

    $nombre=$this->getNombre();
    $descripcion=$this->getDescripcion();
    $categoria = $this->getCategoria();
    $precio=$this->getPrecio();
    $estado=$this->getEstado();
    $stock=$this->getStock();
    $img=$this->getImg();
    $id_usu=$this->getIdUsu();


    $sql= "INSERT INTO `articulo`(`nom_a`, `precio`, `estado`, `stock`,`descripcion`,`imagen`,`id_cat`,`id_u`) VALUES (:nombre,
    :precio, :estado, :stock, :descripcion,:img, :categoria, :id_usu)";

    $result = $conex->prepare($sql);
    $result->execute(array(':nombre'=>$nombre, ':precio'=>$precio,':estado'=>$estado,':stock'=>$stock,'descripcion'=>$descripcion,
    'img'=>$img, 'categoria'=>$categoria,'id_usu'=>$id_usu));

    //Guardo el id del articolo, luego se inserta en la tabla publicaciones como clave foranea
    $id_articulo = $conex->lastInsertId();
    

    return($id_articulo);
    
}

public function listarCategorias($conex){

    $sql="SELECT id_cat, nomb_cat from categoria";

    $result = $conex->prepare($sql);
    $result->execute(); 

    $resultado = $result->fetchALL();

    return $resultado;
}
public function modificarArticulo(){
}
public function bajaArticulo(){

}
public function comprarArticulo(){

}
public function listarArticulo($conex){
/** DEVUELVE ARRAY CON LOS DATOS DEL ARTÍCULO BUSCANDO EL ART EN LA BASE CON SU ID
**/

    $id = $this->getId();

    $sql = "SELECT `nom_a`, `precio`, `estado`, `stock`, `imagen`, `id_cat`, `descripcion` FROM `articulo` WHERE `id_a` = :id_art";

    $result = $conex->prepare($sql);
    $result->execute(array(':id_art'=>$id));
    $result = $result->fetchALL();
    
    return ($result);

}
public function comentarArticulo(){

}
public function verInformacionVendedor()
{
    
}


}