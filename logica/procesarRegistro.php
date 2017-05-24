<?php

require_once('../clases/persona.class.php');
require_once('/funciones.php');

$nombre = strip_tags($_POST['Nombre']);
$apellido = strip_tags($_POST['Apellido']);
$correo = strip_tags($_POST['Correo']);
$telefono = strip_tags($_POST['Telefono']);
$pais = strip_tags($_POST['Pais']);
$cuidad = strip_tags($_POST['Ciudad']);
$direccion = strip_tags($_POST['Direccion']);
$num_puerta = strip_tags($_POST['NumeroPuerta']);
$password = strip_tags($_POST['Password']);
$t_cretido = strip_tags($_POST['T_credito']);

//funcion elegir id 
$id_P = idelegirId();


//conectar a la bd
$conex = conectar();

//crear objeto con los datos ingresados en el from
$p = new Persona($id_P,$nombre,$apellido,$correo,$telefono,$pais,$ciudad,
$direccion,$num_puerta,$password,$t_cretido);

$p->altaPersona($conex);



