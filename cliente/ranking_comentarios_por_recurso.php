<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}
	
	include "modelos/bbdd/comentario.php"; 
	include "modelos/bbdd/perfil.php";
	include "modelos/api.php";
	
	$un_array = ranking_comentarios_por_recurso();	
	$resultado = [];
	$n = 0;
	foreach ($un_array as $un_recurso){		
		$ficha = datos_recurso($un_recurso["recurso"]);
		$titulo = $ficha["Title"];		
		$resultado[$n]["titulo"] = $titulo;
		$resultado[$n]["la_cuenta"] = $un_recurso["cuenta"];		
		$n++;
	}
	
	include "vistas/ranking_comentarios_por_recurso.htm"; 

?>

