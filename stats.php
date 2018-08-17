<?php

$title = "Duck Hunt";
$link = "index";

require "inc/functions.php";
require "inc/header.php";


$dbh = db_connect($cfg);

$titles = [
	"latitude" => "Latitude",
	"longitude" => "Longitude",
	"day" => "Day",
	"hour" => "Hour",
	"howmany" => "Number"
];

$data = $dbh->query('SELECT * FROM report')->fetchAll();
$data = extends_data($data);	// see functions.php


?>


	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" id="map-tab" data-toggle="tab" href="#map-panel">Map</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats-panel">Stats</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="list-tab" data-toggle="tab" href="#list-panel">List</a>
		</li>
	</ul>

	<div class="tab-content" id="myTabContent">

		<div class="tab-pane fade show active" id="map-panel" role="tabpanel">
			<div id="map_summary"></div>
			<script type="text/javascript">
				var poi = <?=json_encode($data)?>;
			</script>
		</div>

		<div class="tab-pane fade" id="stats-panel" role="tabpanel">
			<p>here an array containing the following datas for each day !</p>
			<p>tot ducks</p>
			<p>tot rows</p>
		</div>

		<div class="tab-pane fade" id="list-panel" role="tabpanel">
			<?= array2html( $titles, $data ) ?>
		</div>

	</div>

<?php

require "inc/footer.php";


