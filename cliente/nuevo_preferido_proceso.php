<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 2){header('Location: salir.php');}
	
	include "modelos/bbdd/preferido.php";
	
	nuevo_preferido($_GET["id_usuario"], $_GET["num_ficha"]);
	
	header('Location: filtro.php');

?>

