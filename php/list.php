<?php
$sql = "SELECT * FROM users";
		try {
				$hostname = "localhost";
				$database = "test";
				$username = "magda";
				$password = "magda";
				$connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

				$statement = $connection->prepare($sql);
				$statement->execute();
				$result = $statement->fetchAll();
		} 
		catch(PDOException $error) {
				echo $sql . "<br>" . $error->getMessage();
		}
?>
<?php if ($result && $statement->rowCount() > 0) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resultados</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="resultado">
		<h1>Resultados</h1>
			<table>
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>1º Apellido</th>
							<th>2º Apellido</th>
							<th>Edad</th>
							<th>Direccion</th>
			                <th>Código postal</th>
							<th>Provincia</th>
							<th>Municipio</th>
							<th>Pais</th>
							<th>Correo Electrónico</th>
							<th>Teléfono fijo</th>
							<th>Teléfono movil</th>
						</tr>
					</thead>
				<tbody>

					<?php foreach ($result as $row) { ?>
						<tr>
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["nombre"]; ?></td>
							<td><?php echo $row["primerApellido"]; ?></td>
							<td><?php echo $row["segundoApellido"]; ?></td>
							<td><?php echo $row["edad"]; ?></td>
							<td><?php echo $row["direccion"]; ?></td>
							<td><?php echo $row["codigoPostal"]; ?> </td>
							<td><?php echo $row["provincia"]; ?></td>
							<td><?php echo $row["municipio"]; ?> </td>
							<td><?php echo $row["pais"]; ?></td>
							<td><?php echo $row["email"]; ?> </td>
							<td><?php echo $row["telFijo"]; ?></td>
							<td><?php echo $row["telMovil"]; ?> </td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<?php } else { ?>
				<blockquote>No hay datos</blockquote>
			<?php } ?>
			<br/>
			<button id="cont4" type="button" onclick="window.location.href='index.php'">Volver a principal</button>

			<!-- <a href="index.php">Volver a la pagina principal</a> -->
	</div>
	<footer>
        &copy magdalena rios guardiola
 	</footer>
</body>	
</html>		
