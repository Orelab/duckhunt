<?php

$title = "The admin place";
$link = "index";

require "inc/functions.php";
require "inc/header.php";


$dbh = db_connect($cfg);


$response = $dbh->query('SELECT * FROM report;');


$titles = [
	"where" => "Place",
	"when" => "Date",
	"howmany" => "Number"
];

$data = $response->fetchAll();

echo array2html( $titles, $data );



$response->closeCursor();







require "inc/footer.php";



