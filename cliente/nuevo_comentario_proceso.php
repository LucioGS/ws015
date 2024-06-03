<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	
	include "modelos/bbdd/comentario.php";
	
	nuevo_comentario($_SESSION["id"], $_POST["cod_ficha"], $_POST["comentario"]);
	
	header('Location: ficha.php?num_ficha='.$_POST["cod_ficha"]);


?>

