<?php


	function nuevo_comentario($id_usu, $id_ficha, $comentario){	
	
		try {
			$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
			$sql = "INSERT INTO comentarios (id_usuario, id_recurso, comentario) VALUES (?,?,?)";
			$mbd->prepare($sql)->execute([$id_usu, $id_ficha, $comentario]);
			$retorno = "ok";
		} catch (PDOException $e) {
			$retorno = $e->getMessage();
		}
		return $retorno;
		
    }


	function listado_comentarios_por_recurso($id_recurso){
		
		$retorno = [];
		try {
			$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
			$sql = "SELECT 
					usuarios.nombre as el_nombre, 
					usuarios.apellidos as los_apellidos, 
					comentarios.timestamp as fechayhora, 
					comentarios.comentario as el_comentario
					FROM comentarios 
					JOIN usuarios ON comentarios.id_usuario = usuarios.id
					WHERE comentarios.id_recurso = '$id_recurso'";
			$comentarios = $mbd->query($sql);
			$retorno["valores"] = $comentarios->fetchAll(PDO::FETCH_ASSOC);
			$retorno["resultado"] = "ok";
		} catch (PDOException $e) {
			$retorno["valores"] = $e->getMessage();
			$retorno["resultado"] = "ko";
		}
		return $retorno;
		
	}
	
	
	function ranking_comentarios_por_usuario(){

		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');	
		$sql = "SELECT 
					usuarios.nombre as el_nombre, 
					usuarios.apellidos as los_apellidos, 
					count(comentarios.id) as cuenta
				FROM comentarios 
				JOIN usuarios ON comentarios.id_usuario = usuarios.id
				GROUP BY id_usuario
				ORDER BY cuenta DESC";
		$comentarios = $mbd->query($sql);
		$array = $comentarios->fetchAll(PDO::FETCH_ASSOC);
		return $array;
		
	}
	
	
	function ranking_comentarios_por_recurso(){

		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');	
		$sql = "SELECT 
					id_recurso as recurso, 
					count(id) as cuenta
				FROM comentarios 
				GROUP BY id_recurso
				ORDER BY cuenta DESC";
		$comentarios = $mbd->query($sql);
		$array = $comentarios->fetchAll(PDO::FETCH_ASSOC);
		return $array;
		
	}
	
	
?>