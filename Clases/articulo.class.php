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
public function comprarArticulo($conex){
/** RESTO LA CANTIDAD DE ARTICULOS COMPRADOS DE LA TABLA ARTICULO ITEM STOCK 
**/
    $id_art = $this->getId();
    $cant = $this->getStock();

    $sql ="SELECT `stock` FROM `articulo` WHERE `id_a` =:id_art";
    $result = $conex->prepare($sql);
    $result->execute(array(':id_art'=>$id_art));
    $result = $result->fetchALL();
    
    $stock = $result[0]['stock'];
    
    $stock = $stock - $cant;

    $sql="UPDATE `articulo` SET `stock`= :stock WHERE `id_a` = :id_art";
    $result = $conex->prepare($sql);
    $result->execute(array(':stock'=>$stock,':id_art'=>$id_art));
    
    $flag =0;
    if($stock == 0){
        $flag = 1;
        return ($flag);
    }else{
        return ($flag);
    }


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
public function buscarArtNombreCat($conex){
/**BUSCA EN LA BASE TODOS LOS ARTICULOS CON ESE NOMBRE Y EN ESA CATEGORIA
**/

    $nombre =$this->getNombre();
    $cat = $this->getCategoria();
    
    $sql="SELECT a.id_a, a.nom_a, a.precio, a.estado, a.stock from categoria c join articulo a on
    c.id_cat = a.id_cat join publica p on a.id_a = p.id_a where a.nom_a like :nombre and c.id_cat= :categoria and e_pub = 1";
    
    $result = $conex->prepare($sql);
    $result->execute(array(':nombre'=>'_%'.$nombre.'_%',':categoria'=>$cat));
    $result = $result->fetchALL(); 
    
    return $result;
   
}
public function buscarArtNombre($conex){
/** BUSCA EN LA BASE TODOS LOS ARTICULOS CON ESE NOMBRE Y ESTADO ACTIVO
**/
    $nombre = $this->getNombre();

    $sql="SELECT a.id_a, a.nom_a, a.precio, a.estado, a.stock from articulo a join publica p on a.id_a = p.id_a 
    where a.nom_a like :nombre and e_pub = 1";

    $result =$conex->prepare($sql);
    $result->execute(array('nombre'=>'%'.$nombre.'_%'));
    $result = $result->fetchALL();

    return ($result);
}
public function idUsu($conex){
/** DEVUELVE EL ID DEL USUAIRO QUE SUBIO EL ART **/

    $id_art = $this->getId();
    $sql ="SELECT id_u FROM articulo WHERE id_a =:id_art";
    $result = $conex->prepare($sql);
    $result->execute(array(':id_art'=>$id_art));
    $result = $result->fetchALL();
    
    return ($result);
}
public function comentarArticulo(){

}
public function verInformacionVendedor()
{
    
}


}