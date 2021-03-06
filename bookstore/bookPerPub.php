<?php
	session_start();
	require_once "./functions/database_functions.php";

	if(isset($_GET['pubid'])){
		$pubid = $_GET['pubid'];
	} else {
		echo "¡Consulta incorrecta! ¡Intentalo otra vez!";
		exit;
	}


	$conn = db_connect();
	$pubName = getPubName($conn, $pubid);

	$query = "SELECT book_isbn, book_title, book_image FROM books WHERE publisherid = '$pubid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "No se pudo recopilar los datos " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "¡No se han encontrado libros! ¡Espere hasta que lleguen libros nuevos!";
		exit;
	}

	$title = "Libros por editorial";
	require "./template/header.php";
?>
	<p class="lead"><a href="publisher_list.php">Editoriales</a> > <?php echo $pubName; ?></p>
	<?php while($row = mysqli_fetch_assoc($result)){
?>
	<div class="row">
		<div class="col-md-3">
			<img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['book_image'];?>">
		</div>
		<div class="col-md-7">
			<h4><?php echo $row['book_title'];?></h4>
			<a href="book.php?bookisbn=<?php echo $row['book_isbn'];?>" class="btn btn-primary">Obtener detalles</a>
		</div>
	</div>
	<br>
<?php
	}
	if(isset($conn)) { mysqli_close($conn);}
	require "./template/footer.php";
?>
