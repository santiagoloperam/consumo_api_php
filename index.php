<?php 

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'http://localhost:80/api_php/usuarios.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);

	if (curl_errno($ch)) echo curl_error($ch);
	else $decoded = json_decode($response, true);
	//var_dump($decoded);

	curl_close($ch);

	$usuarios = $decoded["usuarios"];

	var_dump($usuarios);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Consumo API PHP</title>
 </head>
 <body>
 	<table border="1px">
 		<thead>
 			<td>id</td>
 			<td>nombre</td>
 			<td>apellido</td>
 			<td>Eliminar</td>
 			<td>Editar</td>
 		</thead>
 		<tbody>
 			<?php  			
 			foreach ($usuarios as $usu) {
 			 ?>

 			 	<tr>
 			 		<td><?php echo $usu["id"]; ?></td>
 			 		<td><?php echo $usu["name"]; ?></td>
 			 		<td><?php echo $usu["last_name"]; ?></td>
 			 		<td><a href="editar.php?id=<?php echo $usu["id"]; ?>">Editar</a></td>
 			 		<td><a href="eliminar.php?id=<?php echo $usu["id"]; ?>">Eliminar</a></td>
 			 	</tr>
 			<?php } ?>
 		</tbody>
 	</table>

 	<hr><br>

 	<form action="crear.php" method="POST">
 		<input type="text" name="name" placeholder="Nombre"><br>
 		<input type="text" name="last_name" placeholder="Apellido"><br>
 		<input type="submit" value="Guardar">
 	</form>

 </body>
 </html>