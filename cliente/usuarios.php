<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}
	
	include "modelos/bbdd/usuario.php"; 
	include "modelos/bbdd/perfil.php";
	
	$un_array = listado_usuarios();	
	
	include "vistas/usuarios.htm"; 

?>

