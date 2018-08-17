<?php

$title = "The admin place";
$link = "index";

require "inc/functions.php";
require "inc/header.php";


$dbh = db_connect($cfg);

$titles = [
	"place" => "Location",
	"day" => "Day",
	"hour" => "Hour",
	"howmany" => "Number"
];

$data = $dbh->query('SELECT * FROM report')->fetchAll();


foreach( $data as &$d )
{
	// adding "day" & "hour" values

	$d['day'] = date('d/m/Y', strtotime($d['when']));
	$d['hour'] = date('H:i', strtotime($d['when']));

	// adding a beautyfull location field ;)

	$map = '<div class="place" data-lat="%s" data-lon="%s"></div>';
	$d['place'] = sprintf($map, $d['latitude'], $d['longitude']);
}

echo array2html( $titles, $data );



require "inc/footer.php";



