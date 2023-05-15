<?php
function escape($html) {
return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
$success = null;

if (isset($_POST["submit"])) {
  try {
		$hostname = "localhost";
		$database = "test";
		$username = "magda";
		$password = "magda";
		$connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		$id = $_POST["submit"];
		$sql = "DELETE FROM users WHERE id = :id";
		$statement = $connection->prepare($sql);
		$statement->bindValue(':id', $id);
		$statement->execute();
		$success = "User successfully deleted";
		} 
		catch(PDOException $error) {
			echo $sql . "<br>" . $error->getMessage();
		}
}

try {
		$hostname = "localhost";
		$database = "test";
		$username = "magda";
		$password = "magda";
		$connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		$id = $_GET['id']; 
		$sql = "SELECT * FROM users WHERE id = :id";
		$statement = $connection->prepare($sql);
		$statement->bindValue(':id', $id);
		$statement->execute();
		$result = $statement->fetchAll();
		} 
		catch(PDOException $error) {
			echo $sql . "<br>" . $error->getMessage();
		}
?>
 
 	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Borrar</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="resultado">
		<h1>Borrado de usuarios</h1>

		<?php if ($success) echo $success; ?>
		<form method="post">
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
						<th>Borrar</th>
					</tr>
				</thead>
			<tbody>
				<?php foreach ($result as $row) : ?>
				<tr>
					<td><?php echo escape($row["id"]); ?></td>
					<td><?php echo escape($row["nombre"]); ?></td>
					<td><?php echo escape($row["primerApellido"]); ?></td>
					<td><?php echo escape($row["segundoApellido"]); ?></td>
					<td><?php echo escape($row["edad"]); ?></td>
					<td><?php echo escape($row["direccion"]); ?></td>
					<td><?php echo escape($row["codigoPostal"]); ?> </td>
					<td><?php echo escape($row["provincia"]); ?></td>
					<td><?php echo escape($row["municipio"]); ?> </td>
					<td><?php echo escape($row["pais"]); ?></td>
					<td><?php echo escape($row["email"]); ?> </td>
					<td><?php echo escape($row["telFijo"]); ?></td>
					<td><?php echo escape($row["telMovil"]); ?> </td>
				    <td><button id="cont4" type="submit" name="submit" value="<?php echo escape($row["id"]); ?>">Borrar</button></td> 
			    </tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</form>
		<button id="cont4" type="button" onclick="window.location.href='index.php'">Volver a principal</button><br/><br/>
     </div>   
     <footer>
        &copy magdalena rios guardiola
 	</footer>
</body>	
</html>
