<?php 
	if (!isset($_POST['name'])) {
		header('Location: index.php');
	};

	/*$array = [
		'name' => $_POST['name'],
		'last_name' => $_POST['last_name']
	];

	$data = http_build_str($array);*/

	$data = array(
		"name"=>$_POST['name'],
		"last_name"=>$_POST['last_name']
	);

	//var_dump($data1);

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'http://localhost:80/api_php/usuarios.php');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

	$response = curl_exec($ch);

	if (curl_errno($ch)) echo curl_error($ch);
	else $decoded = json_decode($response, true);

	echo $response;

	curl_close($ch);


 ?>