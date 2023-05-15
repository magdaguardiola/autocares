 <?php

	 $statement = FALSE; 
	 $age_options = array( '
		options' => array( 'min_range' => 0, 'max_range' => 999, ) 
	);


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

	$new_user = array( 
		"nombre" => $_POST['nombre'], 
		"primerApellido" => $_POST['primerApellido'], 
		"segundoApellido" => $_POST['segundoApellido'], 
		"edad" => $_POST['edad'], 
		"direccion" => $_POST['direccion'],
		"codigopostal" => $_POST['codigopostal'],
		"provincia" => $_POST['provincia'],
		"municipio" => $_POST['municipio'],
		"pais" => $_POST['pais'],
		"email" => $_POST['email'],
		"telFijo" => $_POST['telFijo'],
		"telMovil" => $_POST['telMovil']
	);

	   $email_a = $new_user["email"];
       $age_a = $new_user["edad"];
		if (filter_var($email_a, FILTER_VALIDATE_EMAIL)== FALSE) {
		 ?> 
	 	  <blockquote><?php echo "La dirección de correo ($email_a) es inválida."; ?></blockquote> 

	 <?php 
		} else if (filter_var($age_a, FILTER_VALIDATE_INT, $age_options) == FALSE) {
	 ?> 
	  <blockquote><?php echo "La edad ($age_a) es inválida (entre 0 y 999).\n"; ?></blockquote>
	   <?php } else {



	$sql = sprintf( 
		"INSERT INTO %s (%s) values (%s)", 
		"users", 
		implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user)) );

	$statement = $connection->prepare($sql);
	$statement->execute($new_user);
	} 
  }	
	catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}
}
?>
<?php if (isset($_POST['submit']) && $statement) : ?> <blockquote><?php echo escape($_POST['nombre']); ?> Se ha agregado satisfactoriamente.</blockquote>
<?php endif; ?> 



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario de consulta</title>
	<link rel="stylesheet" type="text/css" href="css/estilos1.css">
</head>
<body>
  <div id="formulario">
		<h1>Formulario de consulta</h1>
		<hr>
	<form method="post" action="#">

		<ul>
			<div class="foco">
			     <li>Nombre y apellidos</li>
			      <input id="nombre" type="text" name="nombre" maxlength=30 minlength=3 value="" autofocus="" /> <br/>
			      <label for="nom">Nombre</label><br/>
			      <input id="primerApellido" type="text" name="primerApellido" maxlength=30 minlength=3 value=""/> <br/>
			      <label for="primerApellido">Primer apellido</label><br/>
			      <input id="segundoApellido" type="text" name="segundoApellido" maxlength=30 minlength=3 value=""/> <br/>
			      <label for="segundoApellido">Segundo apellido</label>
			      <!-- rango de edad entre una edad y otra  -->
			      <li>Edad</li>
	             <input id="edad" type="number" name="edad" min="18" maxlength=3 value=""><br/>
	             <label for="edad">Edad</label><br/>
			       
	         </div>    
		
	    <hr>
	        <div class="foco">
	     		<li>Dirección</li>
	            <input id="direccion" type="text" name="direccion" maxlength=50 value=""/><br/>
	            <label for="direccion">Calle,número,piso,puerta</label><br/>
	            <div id="cont">
		            <div id="subcont1">
			            <input id="codigopostal" type="tel" pattern="[0-9]{5}"maxlength=5 name="codigopostal" value=""/> <br/>
			            <label for="codigopostal">Código postal</label><br/>
			            <input id="provincia" type="text" name="provincia" maxlength=30 value=""/> <br/>	
			            <label for="provincia">Provincia</label><br/>
				            
		            </div>
		            <div id="subcont2">
			            <input id="municipio" type="text" name="municipio" maxlength=30 value=""/> <br/>
			            <label for="municipio">Municipio</label><br/>
			            <input id="pais" type="text" name="pais" maxlength=30 value=""/> <br/>
			            <label for="pais">Pais</label><br/>
		            </div>
		        </div>
	        </div>

	    <hr>
	        <div class="foco">
	        	 <li>Email</li>
	        	 <input id ="email" type="email" name="email" maxlength=50 pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"><br/>
	        	 <label for="email">Email</label><br/>
	        </div> 	 
	    <hr>
			<div class="foco">
				 <li>Teléfono</li>
				 <div id="cont2">
				 	     <div id="subcont3">
						 <input id ="telFijo" type="tel" name="telFijo" pattern="[0-9]{9}"maxlength=9 value=""><br/>
			             <label for="telFijo">Fijo</label><br/><br/>
			             </div>
			             <div id="subcont4">
						 <input id ="telMovil" type="tel" name="telMovil" pattern="[0-9]{9}"maxlength=9 value=""><br/>
						 <label for="telMovil">Movil</label><br/><br/>
						 </div>
	             </div>
	         </div>
	      
	    </ul>

	    <hr>    
	      		  <button id="cont4" type="button" onclick="window.location.href='index.php'">Volver a principal</button>
	      		  <input id="cont3" type="submit" name="submit" value="Enviar consulta"><br/><br/>
	            

    
     </form>

  </div>

 <footer>
        &copy magdalena rios guardiola
 </footer>

</body>
</html>

