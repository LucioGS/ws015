<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	
	include "modelos/api.php";
	include "modelos/bbdd/perfil.php";
	
	$titulo = $_POST["titulo"];
	$year = $_POST["year"];
	$tipo = $_POST["tipo"];

	$un_array = listado_recursos($titulo, $year, $tipo);
	
	include "vistas/listado.htm"; 

?>


	
	
