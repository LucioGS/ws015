<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	
	$la_ficha = $_GET["num_ficha"];
	
	include "modelos/bbdd/perfil.php";
	include "vistas/nuevo_comentario.htm"; 

?>
