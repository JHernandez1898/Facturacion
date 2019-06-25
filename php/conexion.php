<?php 
date_default_timezone_set('America/Mexico_City');

 function conectar(){
  $strHost ="localhost";
  $strUsuario = "root";
  $strClave = "";
  $strBaseDeDatos = "facturacionamerica";
  $idCone = mysqli_connect ($strHost, $strUsuario, $strClave,$strBaseDeDatos) or
           die ("Error conectando al servidor $strBaseDeDatos con el
                 nombre de usuario $strUsuario");

  return $idCone;
 }
 