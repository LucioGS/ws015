<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}
	
	include "modelos/bbdd/comentario.php"; 
	include "modelos/bbdd/perfil.php";
	
	$un_array = ranking_comentarios_por_usuario();	
	
	include "vistas/ranking_comentarios_por_usuario.htm"; 

?>

