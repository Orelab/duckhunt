<?php

$title = "The admin place";
$link = "stats";

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
$data = extends_data($data);	// see functions.php

echo array2html( $titles, $data );



require "inc/footer.php";



