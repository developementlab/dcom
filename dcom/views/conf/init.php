<!DOCTYPE html>
	<html class="dcom">
		<head>
			<title> Lemur\'F</title>
			<link rel="icon" type="image/png" href="/dcom/src/public/dcom-css/img/kungfu.ico" />
			<link rel="stylesheet" href="/dcom/src/public/bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" type="text/css">
			<link rel="stylesheet" href="/dcom/src/public/bootstrap-3.3.6/dist/css/bootstrap.min.css" type="text/css">
			<link rel="stylesheet" href="/dcom/src/public/dcom-css/main.css" type="text/css">
		</head>
		<body class="dcom round">
			<h2 class="title">Dcom-db</h2>
			<hr>
			<form method="post" id="initConf">
				<div class="form-group">
				  	<label for="http_host">DB host:</label>
					<input type="text" name="http_host" id="http_host" class="form-control" id="http_host" />
				  	<label for="db_user">DB User:</label>
					<input type="text" name="db_user" class="form-control" id="db_user" />
				  	<label for="db_password">DB Password:</label>
					<input type="text" name="db_password" class="form-control" id="db_password" />
				  	<label for="db_name">DB Name:</label>
					<input type="text" name="db_name" class="form-control" id="db_name" />
					<button type="submit" name="confirm" class="btn btn-primary glyphicon glyphicon-floppy-save"> Run</button>
				</div>
			</form>
			<?php
				use dcom\components\conf\Conf;
				if (isset($_POST['confirm'])) {
					# code...
					Conf::init($_POST);
				}
			?>
			<script type="text/javascript" src="/dcom/src/public/dcom-js/jquery-1.11.2.min.js"></script>
			<script type="text/javascript" src="/dcom/src/public/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
		</body>
	</html>
