<?php 
/** EN ESTA PAGINA PROCESO LA PERMUTA DE UN ARTICULO

    POR GET TENGO ID PUBLICACION, ID ARTICULO, Y CANTIDAD SELECCIONADA POR QUIEN OFERTA 

    PRIMERO VOY A GUARDAR EN LA TABLA SELECCIONA los datos del articulo seleccionado por quien oferta
    en id_u va el id de la persona que oferta y en id_v el id del que recive la oferta

    SEGUNDO DE ALGUNA FORMA OBTENGO LOS DATOS DEL OBJETO QUE SE OFRECE EN RETORNO Y LOS HAGO OTRO INSERT EN LA TABLA SELECCIONA

    TERCERO EN LA TABLA PERMUTA GUARDO LOS DATOS DE LAS DOS SELECCIONES 
    DEBO MOSTRAR AL USUARIO LA OFERTA QUE RECIBE Y QUE ESTE ACEPTE O NO 
    SI ACEPTA HAGO UN UPDATE EN LA TABLA PERMUTA Y PONGO EL ATRIBUTO CONCRETA EN 1 ASI SE QUE LA PERMUTA FUE ACEPTADA Y REALIZADA 

    AHI RESTO LA CANTIDAD DE ARTICULOS PERMUTADOS

**/

  $id_art_ofertado =$_POST['selPermu'];
  $cant_ofertada =$_POST['txtCant'];
  $id_usu_compra =$_POST['id_usu_compra'];
  $id_art =$_POST['id_art'];
  $cant_art_1 =$_POST['txtCantArt1'];
  echo 'id articulo 1: '.$id_art; 
  echo '<br>';
  echo 'id art ofertado : '.$id_art_ofertado;
  echo '<br>';
  echo 'cant ofertada: '.$cant_ofertada;    
  echo '<br>';
  echo 'id usu compra'.$id_usu_compra;
  echo '<br>';
  echo 'cant art 1: '.$cant_art_1;