<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 2){header('Location: salir.php');}
	
	include "modelos/bbdd/usuario.php";
	
	eliminar_usuario($_GET["id_usuario"]);
	
	header('Location: usuarios.php');

?>

