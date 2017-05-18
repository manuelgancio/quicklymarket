<?php
require_once('../persistencia/PersistenciaUsuario.class.php');

class Usuario
{
    private $id;
    private $login;
    private $password;
    private $nombre;
    private $apellido;
    private $categoria; //Empleado o Usuario
    private $ci; //Ci. esto se va.
    private $correo;
    private $celular; // telefono
    private $horario; //esto se va.
    private $fecNac;
	
	//Agregar Tipo: Premium o basico.
  

    
    function __construct($i='',$l='', $p='', $n='', $a='', $ca='', $ci='',$co='',$ce='',$h='',$f='')
    {
        $this->id= $i;
        $this->login= $l;
        $this->password= $p;
        $this->nombre= $n;
        $this->apellido= $a;
        $this->categoria= $ca;
        $this->ci= $ci;
        $this->correo= $co;
        $this->celular= $ce;
        $this->horario=$h;
        $this->fecNac=$f;
    }
    
    //Métodos set
    
    public function setId($i)
    {
      $this->id= $i;
    }
    
    public function setLogin($l)
    {
      $this->login= $l;
    }
    
    public function setPassword($p)
    {
      $this->password= $p;
    }
    
	public function setNombre($n)
    {
      $this->nombre= $n;
    }
    
     public function setApellido($a)
    {
      $this->apellido= $a;
    }

    public function setCategoria($ca)
    {
      $this->categoria= $ca;
    }
    
     
    public function setCedula($ci)
    {
      $this->cedula=$ci;
    }
    
 	public function setCorreo($co)
    {
      $this->correo=$co;
    }
    
	public function setCelular($ce)
    {
      $this->celular=$ce;
    }
    
	public function setHorario($h)
    {
      $this->horario=$h;
    }
    
    public function setFecNac($f)
    {
    	$this->fecNac=$f;
    }
    
    //Métodos get
    
    public function getId()
    {
      return $this->id;
    }
    
    public function getLogin()
    {
      return $this->login;
    }
    
    public function getPassword()
    {
      return $this->password;
    }
    
  	public function getNombre()
    {
      return $this->nombre;
    }
    
    public function getApellido()
    {
      return $this->apellido;
    }
    
    public function getCategoria()
    {
      return $this->categoria;
    }
    
    public function getCedula()
    {
      return $this->ci;
    }
    
  
    public function getCorreo()
    {
      return $this->correo;
    }
    
	public function getCelular()
    {
      return $this->celular;
    }
    
	public function getHorario()
    {
      return $this->horario;
    }
    
    public function getFecNac()
    {
    	return $this->fecNac;
    }
    
    
    //Otros Métodos
    public function alta($conex)
    {
        $pu=new PersistenciaUsuario;
        return ($pu->agregar($this, $conex));
    }
    
   
    public function baja($conex)
    {
        $pu=new PersistenciaUsuario;
        return($pu->eliminar($this, $conex));
    }
    
    
    public function modificacion($conex)
    {
      $pu=new PersistenciaUsuario;
      return($pu->modificar($this, $conex));
    }
    
    public function consultaTodos($conex)
    {
      $pu=new PersistenciaUsuario;
      $datos= $pu->consTodos($conex);
      return $datos;
    }
    
	public function consultaUno($conex)
    {
      $pu=new PersistenciaUsuario;
      $datos= $pu->consUno($this,$conex);
      return $datos;
    }
    //Devuelve true si el Login y el Password coinciden
    public function coincideLoginPassword($conex)
    {
        $pu= new PersistenciaUsuario;
        return $pu->verificarLoginPassword($this, $conex);
        
    }
}

?>
