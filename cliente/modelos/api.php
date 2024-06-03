<?php


	function acceso_api($url){

		$url = str_replace(' ', '%20', $url);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$data = curl_exec($curl);
		curl_close($curl);
		$data_convertido = json_decode($data, true);
		return $data_convertido;
	
	}
	

	function datos_recurso($ficha){

		$datos = acceso_api("https://www.omdbapi.com/?apikey=fe8a7565&i=$ficha");
		return $datos;

	}

	
	function listado_recursos($titulo, $year, $tipo){
		
		$datos = acceso_api("https://www.omdbapi.com/?apikey=fe8a7565&s=$titulo&y=$year&type=$tipo");
		return $datos;
		
	}
	
	

?>