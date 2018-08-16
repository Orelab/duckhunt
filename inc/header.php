<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?= $title ?: "Duck Hunt" ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="node_modules/moment/min/moment.min.js"></script>
	<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="node_modules/pc-bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="assets/app.js"></script>

	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="node_modules/pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="assets/style.css">

</head>
<body>


	<header class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="#">
			<img src="assets/duck.png" width="75" height="75" class="d-inline-block align-top" alt="" />
		</a>
		<div>
			<h1>Duck Hunt</h1>
			<p>Tel where ducks are flying ;)</p>
		</div>
		<a href="<?=$link?:"admin"?>.php">Go <?=$link?:"admin"?></a>
	</header>

