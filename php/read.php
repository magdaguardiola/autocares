<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscar</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>



<?php 
function escape($html) {
 return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
  }

if (isset($_POST['submit'])) {
	try {
		$hostname = "localhost";
		$database = "test";
		$username = "magda";
		$password = "magda"; 
		$connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

		$sql = "SELECT * FROM users WHERE municipio = :municipio";
		$location = $_POST['municipio'];
		$statement = $connection->prepare($sql); $statement->bindParam(':municipio', $location, PDO::PARAM_STR); $statement->execute();
		$result = $statement->fetchAll();
	} 
	catch(PDOException $error) {
	echo $sql . "<br>" . $error->getMessage();
	}
}
?>

<?php
if (isset($_POST['submit'])) {
if ($result && $statement->rowCount() > 0) { ?>

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
							 <!--<td><button id="cont4" type="submit" name="submit" onclick="window.location.href='update.php?id=<?php//  escape($row["id"]); ?>'">Modificar</button></td>
							<td><button id="cont4" type="button" onclick="window.location.href='delete.php?id=<?php //echo escape($row["id"]); ?>'">Borrar</button></td> -->
							 <td><a id="cont3" href="update.php?id=<?php echo escape($row["id"]); ?>">Modificar</a></td>  
							 <td><a id="cont3" href="delete.php?id=<?php echo escape($row["id"]); ?>">Borrar</a></td>  
						</tr>
					<?php endforeach; ?>
				</tbody>
        </table><br/>

		<?php } else { ?>
		<blockquote>No se encontraron registros para <?php echo escape($_POST['municipio']); ?>.</blockquote>
		<?php }
		} ?>
	</div><br/>
    <div id="resultado">
	    <h2>Encuentra un usuario en base a su localidad</h2>
			<form method="post">
			<label for="municipio">municipio</label>
			<input type="text" id="municipio" name="municipio"><input id="cont3"type="submit" name="submit" value="Buscar">
			</form><br/>
	        <button id="cont4" type="button" onclick="window.location.href='index.php'">Volver a principal</button><br/><br/>
     </div>   
     <footer>
        &copy magdalena rios guardiola
 	</footer>
</body>	
</html>