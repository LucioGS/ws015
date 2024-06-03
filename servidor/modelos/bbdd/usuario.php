<?php


	function listado_usuarios(){
		
		$retorno = [];
		try {
			$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
			$usuarios = $mbd->query('SELECT * FROM usuarios');
			$retorno["valores"] = $usuarios->fetchAll(PDO::FETCH_ASSOC);
			$retorno["resultado"] = "ok";
		} catch (PDOException $e) {
			$retorno["valores"] = $e->getMessage();
			$retorno["resultado"] = "ko";
		}
		return $retorno;
		
	}
	
	
	function login($user, $password){	
	
		$retorno = [];
		try {
			$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
			$sql = "SELECT * FROM usuarios WHERE user='" . $user . "' AND password='" . $password ."'";
			$usuarios = $mbd->query($sql);
			if ($usuarios->rowCount() > 0){	
				$usuario = $usuarios->fetch(PDO::FETCH_ASSOC);
				$id = $usuario["id"];
				$retorno["valores"] = $id;
			}else{
				$retorno["valores"] = 0;
			}
			$retorno["resultado"] = "ok";
		} catch (PDOException $e) {
			$retorno["valores"] = $e->getMessage();
			$retorno["resultado"] = "ko";
		}
		return $retorno;
		
    }


	function datos_un_usuario($id){
		
		$retorno = [];
		try {
			$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
			$sql = "SELECT * FROM usuarios WHERE id='" . $id ."'";
			$usuarios = $mbd->query($sql);
			$retorno["valores"] = $usuarios->fetch(PDO::FETCH_ASSOC);
			$retorno["resultado"] = "ok";
		} catch (PDOException $e) {
			$retorno["valores"] = $e->getMessage();
			$retorno["resultado"] = "ko";
		}
		return $retorno;
		
    }


	function nuevo_usuario($nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil){	

		try {
			$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
			$sql = "INSERT INTO usuarios (nombre, apellidos, telefono, email, direccion, localidad, user, password, perfil) VALUES (?,?,?,?,?,?,?,?,?)";
			$mbd->prepare($sql)->execute([$nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil]);
			$retorno = "ok";
		} catch (PDOException $e) {
			$retorno = $e->getMessage();
		}
		return $retorno;

    }


	function eliminar_usuario($id){	

		try {
			$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
			$usuario = $mbd->prepare("DELETE FROM usuarios WHERE id = ?");
			$usuario->execute([$id]);
			$retorno = "ok";
		} catch (PDOException $e) {
			$retorno = $e->getMessage();
		}
		return $retorno;

	}


	function actualizar_usuario($nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil, $id){
		
		try {
			$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
			$sql = "UPDATE usuarios SET nombre = ?, apellidos = ?, telefono = ? , email = ? , direccion = ? , localidad = ? , user = ? , password = ? , perfil = ? WHERE id = ?";
			$mbd->prepare($sql)->execute([$nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil, $id]);
			$retorno = "ok";
		} catch (PDOException $e) {
			$retorno = $e->getMessage();
		}
		return $retorno;
		
	}




?>