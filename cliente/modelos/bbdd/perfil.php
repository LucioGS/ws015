<?php


	function perfil_un_usuario($id){	
	
		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$sql = "SELECT * FROM perfiles WHERE id='" . $id ."'";
		$perfiles = $mbd->query($sql);
		$perfil = $perfiles->fetch(PDO::FETCH_ASSOC);
		return $perfil["nombre"];
		
    }


	function listado_perfiles(){	
	
		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$sql = "SELECT * FROM perfiles";
		$perfiles = $mbd->query($sql);
		$listado_perfiles = $perfiles->fetchAll(PDO::FETCH_ASSOC);
		return $listado_perfiles;
		
    }


?>