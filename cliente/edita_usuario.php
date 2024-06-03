<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}
	
	include "modelos/bbdd/perfil.php";
	include "modelos/bbdd/usuario.php";
	
	$datos_usuario = datos_un_usuario($_GET["id_usuario"]);
	$perfiles = listado_perfiles();
	
	include "vistas/edita_usuario.htm"; 

?>
