<?php
	$book_isbn = $_GET['bookisbn'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM books WHERE book_isbn = '$book_isbn'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "No se elimino correctamente " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_book.php");
?>
