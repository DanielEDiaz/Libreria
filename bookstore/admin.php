<?php
	 ini_set("default_charset", "UTF-8");
	 mb_internal_encoding("UTF-8");
	 ini_set('display_errors', 1);
	 ini_set('display_startup_errors', 1);
	 error_reporting(E_ALL);
	 $title = "Administration section";
	 require_once "./template/header.php";
?>

	<form class="form-horizontal" method="post" action="admin_verify.php">
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Nombre</label>
			<div class="col-md-4">
				<input type="text" name="name" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="pass" class="control-label col-md-4">Contraseña</label>
			<div class="col-md-4">
				<input type="password" name="pass" class="form-control">
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary">
	</form>

<?php
	require_once "./template/footer.php";
?>
