<?php


	function listado_usuarios(){

		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$usuarios = $mbd->query('SELECT * FROM usuarios');
		$array = $usuarios->fetchAll(PDO::FETCH_ASSOC);
		return $array;
		
	}
	
	
	function login($user, $password){	
	
		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$sql = "SELECT * FROM usuarios WHERE user='" . $user . "' AND password='" . $password ."'";
		$usuarios = $mbd->query($sql);
		if ($usuarios->rowCount() > 0){	
			$usuario = $usuarios->fetch(PDO::FETCH_ASSOC);
			$id = $usuario["id"];
			return $id;
		}else{
			return 0;
		}
		
    }


	function datos_un_usuario($id){	
	
		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$sql = "SELECT * FROM usuarios WHERE id='" . $id ."'";
		$usuarios = $mbd->query($sql);
		$usuario = $usuarios->fetch(PDO::FETCH_ASSOC);
		return $usuario;
    }


	function nuevo_usuario($nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil){	
	
		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$sql = "INSERT INTO usuarios (nombre, apellidos, telefono, email, direccion, localidad, user, password, perfil) VALUES (?,?,?,?,?,?,?,?,?)";
		$mbd->prepare($sql)->execute([$nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil]);
		
    }


	function eliminar_usuario($id){	
	
		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$usuario = $mbd->prepare("DELETE FROM usuarios WHERE id = ?");
		$usuario->execute([$id]);
	
	}


	function actualizar_usuario($nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil, $id){
		
		$mbd = new PDO('mysql:host=localhost;dbname=cine', 'root', '');
		$sql = "UPDATE usuarios SET nombre = ?, apellidos = ?, telefono = ? , email = ? , direccion = ? , localidad = ? , user = ? , password = ? , perfil = ? WHERE id = ?";
		$mbd->prepare($sql)->execute([$nombre, $apellidos, $telefono, $email, $direccion, $localidad, $user, $password, $perfil, $id]);
		
	}


?>