<?php

$title = "Duck Hunt";
$link = "index";

require "inc/functions.php";
require "inc/header.php";


$dbh = db_connect($cfg);



//-- map & list

$titles = [
	"latitude" => "Latitude",
	"longitude" => "Longitude",
	"day" => "Day",
	"hour" => "Hour",
	"howmany" => "Number"
];

$data = $dbh->query('SELECT * FROM report')->fetchAll();
$data = extends_data($data);	// => functions.php



//-- stats

$sql = '
	SELECT
		`when` AS day,
		sum(`howmany`) AS `total_ducks`,
		count(`id`) AS `num_rows`
	FROM `report`
	GROUP BY DAY(`when`);
';

$stats = $dbh->query($sql)->fetchAll();

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
			<table class="table">
				<tr>
					<th>Day</th>
					<th>Total reports</th>
					<th>Total ducks reported</th>
				</tr>
				<?php foreach( $stats as $s ): ?>
				<tr>
					<td><?=date('d/m/Y', strtotime($s['day']))?></td>
					<td><?=$s['num_rows']?></td>
					<td><?=$s['total_ducks']?></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>

		<div class="tab-pane fade" id="list-panel" role="tabpanel">
			<?= array2html( $titles, $data ) ?>
		</div>

	</div>

<?php

require "inc/footer.php";


