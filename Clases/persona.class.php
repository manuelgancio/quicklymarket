<?php
require_once('../persistencia/PersistenciaPersona.class.php');
require_once('../persistencia/PersistenciaUsuario.class.php');
class Persona
{
    private $id;
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $tel;
    private $departamento;
    private $ciudad;
    private $calle;
    private $num_puerta;
    private $apto;

    private $tipo_usuario; // premium o basico -  basico = 0 premium = 1 en la base 
    private $password;
    private $reputacion;
    private $t_credito;


    function __construct($id='',$id_usuario='',$nombre='',$apellido='',$correo='',$tel='',$departamento='',$ciudad='',$calle='',$num_puerta='',
    $apto='',$tipo_usuario='',$password='',$reputacion='',$t_credito='')
    {
        $this->id=$id;
        $this->id_usuario=$id_usuario;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->correo=$correo;
        $this->tel=$tel;
        $this->departamento=$departamento;
        $this->ciudad=$ciudad;
        $this->calle=$calle;
        $this->num_puerta=$num_puerta;
        $this->apto=$apto;

        $this->tipo_usuario=$tipo_usuario;
        $this->password=$password;
        $this->reputacion=$reputacion;
        $this->t_credito=$t_credito;
    }

//Metodos SET

public function setId($id){
    $this->id=$id;
}
public function setIdUsuario($id_usuario){
    $this->id_usuario=$id_usuario;
}
public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setApellido($apellido){
    $this->apellido=$apellido;
}
public function setCorreo($correo){
    $this->correo=$correo;
}
public function setTel($tel){
    $this->tel=$tel;
}
public function setDepartamento($departamento){
    $this->departamento=$departamento;
}
public function setCiudad($ciudad){
    $this->ciudad=$cuidad;
}
public function setCalle($calle){
    $this->calle=$calle;
}
public function setNumPuerta($num_puerta){
    $this->num_puerta=$num_puerta;
}
public function setApto($apto){
    $this->apto=$apto;
}
public function setPassword($password){
    $this->password=$password;
}
public function setReputacion($reputacion){
    $this->reputacion=$reputacion;
}
public function setTcredito($t_credito){
    $this->t_credito=$t_credito;
}

//Metos GET

public function getId(){
    return $this->id;
}
public function getIdUsuario(){
    return $this->id_usuario;
}
public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function getCorreo(){
    return $this->correo;
}
public function getTel(){
    return $this->tel;
}
public function getDepartamento(){
    return $this->departamento;
}
public function getCiudad(){
    return $this->ciudad;
}
public function getCalle(){
    return $this->calle;
}
public function getNumPuerta(){
    return $this->num_puerta;
}
public function getApto(){
    return $this->apto;
}
public function getTipoUsuario(){
    return $this->tipo_usuario;
}
public function getPassword(){
    return $this->password;
}
public function getReputacion(){
    return $this->reputacion;
}
public function getTcredito(){
    return $this->t_credito;
}

//Mas metodos

public function altaPersona($conex){
    $pp=new PersistenciaPersona;
    return ($pp->agregarPersona($this, $conex));
}
public function modificarPersona(){

}
public function bajaPersona(){

}
public function registro(){

}
public function verPerfil(){

}
public function modificarPerfil(){

}
public function verComprasRealizadas(){

}
public function verVentasRealizadas(){

}
public function verPublicaciones(){

}
public function login(){

}
public function logout(){

}
public function coincideLoginPassword($conex){
    $pu= new PersistenciaUsuario;
    return $pu->verificarLoginPassword($this, $conex);   
}


}
