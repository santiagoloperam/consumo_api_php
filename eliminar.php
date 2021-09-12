<?php 
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	};
	//var_dump($_GET['id']);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:80/api_php/usuarios.php?id='.$_GET['id']);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	

		$response = curl_exec($ch);

		if (curl_errno($ch)) echo curl_error($ch);
		else $decoded = json_decode($response, true);

		//echo $response;

		curl_close($ch);

		header('Location: index.php');
 ?>