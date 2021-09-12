<?php 

	if (isset($_POST['name'])) {
		$data = array(
		"name"=>$_POST['name'],
		"last_name"=>$_POST['last_name']
		);
		var_dump($data);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:80/api_php/usuarios.php?id='.$_POST['id']);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

		$response = curl_exec($ch);

		if (curl_errno($ch)) echo curl_error($ch);
		else $decoded = json_decode($response, true);

		echo $response;

		curl_close($ch);

		header('Location: index.php');
	};

	if (!isset($_GET['id'])) {
		header('Location: index.php');
	};

	$ch = curl_init();

	//var_dump('http://localhost:80/api_php/usuarios.php?id='.$_GET['id']);
	curl_setopt($ch, CURLOPT_URL, 'http://localhost:80/api_php/usuarios.php?id='.$_GET['id']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);

	if (curl_errno($ch)) echo curl_error($ch);
	else $decoded = json_decode($response, true);

	curl_close($ch);

	$usuario = $decoded["usuario"];
	var_dump($usuario);

	

 ?>

 <form action="editar.php" method="POST">
 		<input type="hidden" name="id" placeholder="Nombre" value="<?php echo $usuario["id"] ?>"><br>
 		<input type="text" name="name" placeholder="Nombre" value="<?php echo $usuario["name"] ?>"><br>
 		<input type="text" name="last_name" placeholder="Apellido"value="<?php echo $usuario["last_name"] ?>"><br>
 		<input type="submit" value="Guardar">
</form>