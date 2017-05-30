<?php


    $PATH = $_SERVER["DOCUMENT_ROOT"];
    
    //echo $PATH;

    #PARA LLAMAR DESDE HTML#
    $PRESENTACION='/presentacion';
    $CLASES='/clases/';
    $CSS='/css/';
    $LOGICA='/logica';
    $PERSISTENCIA='/persistencia/';
    $JS ='/js/';
    $IMG ='/images';
    $CONFIG ='/config/';
    #PARA LLAMAR DESDE PHP#
    $PRESENTACION_DIR = $PATH .'/presentacion/';
    $CLASES_DIR = $PATH .'/clases/';
    $LOGICA_DIR = $PATH .'/logica/';
    $PERSISTENCIA_DIR = $PATH .'/persistencia/';
    $CSS_DIR = $PATH .'/css/';
    $JS_DIR = $PATH .'/js/';
    $IMG_DIR =$PATH .'/images/';
    $CONFIG_DIR =$PATH .'/config/';


include($CONFIG_DIR.'dbconfig.php');