<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}
	
	include "modelos/bbdd/preferido.php";
	include "modelos/api.php";
	include "modelos/bbdd/perfil.php";
	
	$un_array = listado_preferidos();
	$array_final = [];
	$n = 0;
	
	foreach($un_array as $preferido){
			if ($preferido["id_usuario"] == $_GET["id_usuario"]){
				$data_convertido = datos_recurso($preferido["id_recurso"]);
				$array_final[$n]["Title"] = $data_convertido["Title"];
				$array_final[$n]["Year"] = $data_convertido["Year"];
				$array_final[$n]["Type"] = $data_convertido["Type"];
				$n++;
			}	
	}
	
	include "vistas/preferidos.htm"; 

?>
