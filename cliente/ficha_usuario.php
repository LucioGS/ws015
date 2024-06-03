<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}
	
	include "modelos/bbdd/usuario.php";
	include "modelos/bbdd/perfil.php";
	
	$datos_usuario = datos_un_usuario($_GET["id_usuario"]);
	
	include "vistas/ficha_usuario.htm"; 

?>
