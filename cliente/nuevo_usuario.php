<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}
	
	include "modelos/bbdd/perfil.php";
	
	$perfiles = listado_perfiles();
	
	include "vistas/nuevo_usuario.htm"; 

?>
