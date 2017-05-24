<?php
//require_once('../index.php');
if(!isset($_SESSION['PHPSESSID']) !="0") {
	session_start(); }

echo "Bienvenido! " . $_SESSION['Correo'];