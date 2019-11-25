<!-- Zaira Bravo Sánchez - 2nd DAW -->

<?php
include('../Helpers/headCode.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){  
	//Guardamos datos del form
	$email = $_POST['email']; 
	$newPass = generaPass();
	$newPassEncrypted = md5($newPass);
	recordarContraseña($email, $newPassEncrypted);
}

include_once "template/head.php";//incluimos el head
?>

<!-- 
**********************************
**	HTML 
**********************************
-->

<body id="content-login">
	<main class="text-center p-3 bg-secondary text-white col-4 m-auto">
		<h1>Recuperar contraseña</h1>
		<hr>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<div class="form-group"> 
				<label for="exampleInputEmail1">Email</label>
				<input class="form-control" id="email" name="email" type="text">		
			</div>
			<input class="btn btn-primary col-12" type="submit" value="Enviar nueva contraseña">
		</form>
		<hr>
        <a href="index.php"><button type="button" class="btn btn-secondary">Volver a inicio</button></a>
	</main>	
</body>