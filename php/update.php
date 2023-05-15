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
	$user =[
			"id" => $_POST['id'],
			"nombre" => $_POST['nombre'], 
			"primerApellido" => $_POST['primerApellido'], 
			"segundoApellido" => $_POST['segundoApellido'], 
			"edad" => $_POST['edad'], 
			"direccion" => $_POST['direccion'],
			"codigoPostal" => $_POST['codigoPostal'],
			"provincia" => $_POST['provincia'],
			"municipio" => $_POST['municipio'],
			"pais" => $_POST['pais'],
			"email" => $_POST['email'],
			"telFijo" => $_POST['telFijo'],
			"telMovil" => $_POST['telMovil']
	];
	// UPDATE `users` SET `nombre` = 'Marcos', `primerApellido` = 'Campos', `segundoApellido` = 'Rios', `edad` = '7', `direccion` = 'C/marte nº4,6A', `codigoPostal` = '36820', `provincia` = 'Pontevedra', `municipio` = 'Porriño', `pais` = 'España', `email` = 'marcoscr@mail.com' WHERE `users`.`id` = 4;

	// $sql = "UPDATE users SET id = :id, nombre = :nombre, primerApellido = :primerApellido, segundoApellido = :segundoApellido, edad = :edad, direccion = :direccion, codigopostal = :codigopostal, provincia = :provincia, municipio = :municipio, pais = :pais, email = :email, , telFijo = :telFijo, telMovil = :telMovil WHERE id = :id";

	$sql= "UPDATE `users` SET
	 nombre = '".$user['nombre']."',
	 primerApellido = '".$user['primerApellido']."',
	 segundoApellido = '".$user['segundoApellido']."',
	 edad = ".$user['edad'].",
	 direccion = '".$user['direccion']."',
	 codigoPostal = '".$user['codigoPostal']."',
	 provincia = '".$user['provincia']."',
	 municipio = '".$user['municipio']."',
	 pais = '".$user['pais']."',
	 email = '".$user['email']."',
	 telFijo = '".$user['telFijo']."',
	 telMovil = '".$user['telMovil']."'
	 WHERE id =".$_GET['id'];

	$statement = $connection->prepare($sql);
	$statement->execute($user);
	} 
	catch(PDOException $error) {
	echo $sql . "<br>" . $error->getMessage();
	}
}
if (isset($_GET['id'])) {
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
			$user = $statement->fetch(PDO::FETCH_ASSOC);
	} 
	catch(PDOException $error) {
	echo $sql . "<br>" . $error->getMessage();
	}
} else {
	echo "Algo ha salido mal!";
	exit;
}
?>

<?php if (isset($_POST['submit']) && $statement) : ?>
<blockquote style="color:white;"><?php echo escape($_POST['nombre']); ?> Se ha actualizado satisfactoriamente.</blockquote>
<?php endif; ?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="resultado">  
		<h1>Modificar un usuario</h1>


<form method="post"> <?php foreach ($user as $key => $value) : ?>
	 <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label> 
	 <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
	  <?php endforeach; ?> 
	 <br/><br/><input type="submit" name="submit" value="Submit"><br/><br/> 
</form>

<button id="cont4" type="button" onclick="window.location.href='index.php'">Volver a principal</button><br/><br/>
 </div>   
     <footer>
        &copy magdalena rios guardiola
 	</footer>
</body>	
</html>  