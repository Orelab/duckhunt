<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?= $title ?: "Duck Hunt" ?></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="node_modules/pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="node_modules/leaflet/dist/leaflet.css">
	<link rel="stylesheet" type="text/css" href="assets/style.css">

	<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="node_modules/moment/min/moment.min.js"></script>
	<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="node_modules/pc-bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="node_modules/leaflet/dist/leaflet.js"></script>
	<script type="text/javascript" src="assets/app.js"></script>

</head>
<body>


	<header class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
		<img src="assets/duck.png" width="75" height="75"
				class="d-inline-block align-top" alt="" />
		<button class="navbar-toggler collapsed" type="button" 
			data-toggle="collapse" data-target="#navbarText">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse" id="navbarText" style="">
			<div>
				<h2>Duck Hunt</h2>
				<p>Observe & report where you see ducks flying<p>
			</div>
			<ul class="navbar-nav ml-md-auto d-md-flex">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Report</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin.php">Admin</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="stats.php">Stats</a>
				</li>
			</ul>
		</div>
	</header>



	<div class="container">
		<div class="row">
			<div class="col-sm-12">