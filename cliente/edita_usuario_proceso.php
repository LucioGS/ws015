<?php 

	session_start();
	if(!isset($_SESSION["perfil"])){header('Location: salir.php');}
	if($_SESSION["perfil"] != 1){header('Location: salir.php');}
	
	include "modelos/bbdd/usuario.php";
	
	actualizar_usuario($_POST["nombre"], $_POST["apellidos"], $_POST["telefono"], $_POST["email"], $_POST["direccion"], $_POST["localidad"], $_POST["user"], $_POST["password"], $_POST["perfil"], $_POST["id"]);
	
	header('Location: ficha_usuario.php?id_usuario=' . $_POST["id"]);

?>

