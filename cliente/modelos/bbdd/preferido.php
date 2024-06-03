<?php


	function listado_preferidos(){

		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$preferidos = $mbd->query('SELECT * FROM preferidos');
		$array = $preferidos->fetchAll(PDO::FETCH_ASSOC);
		return $array;
		
	}
	

	function nuevo_preferido($id_usu, $id_ficha){	
	
		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$sql = "INSERT INTO preferidos (id_usuario, id_recurso) VALUES (?,?)";
		$mbd->prepare($sql)->execute([$id_usu, $id_ficha]);
		
    }


?>