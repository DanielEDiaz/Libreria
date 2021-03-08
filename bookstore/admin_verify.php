<?php
	session_start();
	if(!isset($_POST['submit'])){
		echo "¡Algo ha salido mal! ¡intentalo otra vez!";
		exit;
	}
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$name = trim($_POST['name']);
	$pass = trim($_POST['pass']);

	if($name == "" || $pass == ""){
		echo "¡El campo de Nombre o contraseña está vacío!";
		exit;
	}

	$name = mysqli_real_escape_string($conn, $name);
	$pass = mysqli_real_escape_string($conn, $pass);
	$pass = sha1($pass);

	$query = "SELECT name, pass from admin";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Datos no encontrados" . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($name != $row['name'] && $pass != $row['pass']){
		echo "El usuario o la contraseña son incorrectos. ¡Intente otra vez!";
		$_SESSION['admin'] = false;
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	$_SESSION['admin'] = true;
	header("Location: admin_book.php");
?>
