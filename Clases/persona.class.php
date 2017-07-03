<?php
require_once($PERSISTENCIA_DIR .'PersistenciaPersona.class.php');
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
public function login($conex){

    $correo=$this->getCorreo();
    $pass=$this->getPassword();
    //Verifico que el correo este en la base
    $sql="SELECT * FROM usuario where correo =:correo";

        $result = $conex->prepare($sql);
        $result->execute(array('correo'=>$correo));

        $resultado = $result->fetchALL();
        if (empty($resultado)){
            $correoOk = false;
            return false;
        }else{
            $correoOk = true;
            //Si el correo esta bien traigo la password hasheada de la base    }
            $sql="SELECT pass_u FROM usuario WHERE correo=:correo";
            $result = $conex->prepare($sql);
            $result->execute(array('correo'=>$correo));
            $resultado = $result->fetchALL();
            $pass_hash =$resultado[0]['pass_u'];
            /** $pass es la password ingresada en el login sin hashear
                $pass_hash es la password hasheada traida de la BD
            **/
            if (password_verify($pass, $pass_hash)) {
                // las password coinciden, login correcto
                return true;
            }else{
                // Passwords no coinciden
                return false;
            }
        }
}
public function altaPersona($conex){
    $pp=new PersistenciaPersona;
    return ($pp->agregarPersona($this, $conex));
}
public function modificarPersona(){

}
public function cambiarContraseña($conex){
/**UPDATE LA NUEVA CONTRASEÑA
**/
    $correo = $this->getCorreo();
    $newPass = $this->getPassword();

    $sql ="UPDATE `usuario` SET `pass_u`=:pass WHERE correo =:correo";
    $result=$conex->prepare($sql);
    $result->execute(array('pass'=>$newPass,'correo'=>$correo));
    
    return (true);
}
public function bajaPersona(){

}
public function registro(){

}
public function listarPersona($conex){
/**DEVUELVE LOS DATOS DE LA PERSONA

    CON EL CORREO DEL USUARIO CONSULTO EL ID_P  DE LA TABLA USUARIO
    Y CON ESE ID CONSULTO EN LA TABLA PERSONA EL RESTO DE LOS DATOS(NOMBRE APE TEL DIR)
**/
    $correo=$this->getCorreo();
    $sql="SELECT `id_p` FROM `usuario` WHERE correo =:correo";
    $id_p = $conex->prepare($sql);
    $id_p->execute(array('correo'=>$correo));
    $id_p = $id_p->fetchALL();
    $id_p = $id_p[0]['id_p'];
    
    $sql="SELECT `p_nomb`,`p_ap`,`tel`,`calle`,`num` FROM `persona` WHERE `id_p` = :id_p";
    $result=$conex->prepare($sql);
    $result->execute(array('id_p'=>$id_p));
    $result = $result->fetchALL();

    return ($result);
}
public function obtenerIdUsu($conex){
/**DEVUELVE EL ID DEL USUARIO SEGUN SU CORREO **/
    $correo =$this->getCorreo();

    $sql="SELECT `id_u` FROM `usuario` WHERE `correo` =:correo";
    $result =$conex->prepare($sql);
    $result->execute(array(':correo'=>$correo));
    $result = $result->fetchALL();

    return($result);
}
public function modificarPerfil(){

}
public function verComprasRealizadas(){

}
public function verVentasRealizadas(){

}
public function verPublicaciones(){

}

public function logout(){

}

}
