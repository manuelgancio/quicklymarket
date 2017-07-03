<?php

class art_com
{
    private $id;
    private $fecha_com;
    private $id_comprador;
    private $id_vendedor;
    private $id_art;
    private $id_pub;
    private $cant;
    private $calificacion;

function __construct($id='',$fecha_com='',$id_comprador='',$id_vendedor='',$id_art='',$id_pub='',$cant='',$calificacion=''){

    $this->id=$id;
    $this->fecha_com=$fecha_com;
    $this->id_comprador=$id_comprador;
    $this->id_vendedor=$id_vendedor;
    $this->id_art=$id_art;
    $this->id_pub=$id_pub;
    $this->cant=$cant;
    $this->calificacion=$calificacion;
}

#METODOS SET

public function setId($id){
    $this->id=$id;
}
public function setFechaCom($fecha_com){
    $this->fecha_com=$fecha_com;
}
public function setIdCom($id_comprador){
    $this->id_comprador=$id_comprador;
}
public function setIdVen($id_vendedor){
    $this->id_vendedor=$id_vendedor;
}
public function setIdArt($id_art){
    $this->id_art=$id_art;
}
public function setIdPub($id_pub){
    $this->id_pub=$id_pub;
}
public function setCant($cant){
    $this->cant=$cant;
}
public function setCali($calificacion){
    $this->calificacion=$calificacion;
}

#METODOS GET
public function getId(){
    return $this->id;
}
public function getFechaCom(){
    return $this->fecha_com;
}
public function getIdCom(){
    return $this->id_comprador;
}
public function getIdVen(){
    return $this->id_vendedor;
}
public function getIdArt(){
    return $this->id_art;
}
public function getIdPub(){
    return $this->id_pub;
}
public function getCant(){
    return $this->cant;
}
public function getCali(){
    return $this->calificacion;
}

#otros metodos 

public function comprarArticulo($conex){
/** GUARDO EN LA TABLA SELECCIONA EL ID DE LA PESONA QUE COMPRA, ID DEL VENDEDOR,
ID DEL ARTICULO, FECHA DE COMPRA CANT COMPRADA
**/

    $fecha_compra =$this->getFechaCom();
    $id_art =$this->getIdArt();
    $id_comprador =$this->getIdCom();
    $id_vendedor =$this->getIdVen();
    $cant = $this->getCant();
    
    $sql ="INSERT INTO `selecciona`(`fecha_comp`, `id_u`, `id_a`, `cant`, `id_v`) VALUES 
    (:fecha_comp,:id_comprador,:id_art,:cant,:id_vendedor)";
    $result = $conex->prepare($sql);
    $result->execute(array(':fecha_comp'=>$fecha_compra,'id_comprador'=>$id_comprador,':id_art'=>$id_art,':cant'=>$cant,':id_vendedor'=>$id_vendedor));
    

}
public function listarVentas($conex){
/**LISTO LAS PUBLICACIONES VENDIDAS DE UNA PERSONA SEGUN SU ID
**/
}
public function listarCompras($conex){
/**LISTA LAS PUBLICACIONES VENDIDAS DE UNA PERSONA SEGUN SU ID
**/
}

}