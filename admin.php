<?php

$title = "The admin place";
$link = "index";

require "inc/functions.php";
require "inc/header.php";


$dbh = db_connect($cfg);



$titles = [
	"where" => "Place",
	"when" => "Date",
	"howmany" => "Number"
];

$data = $dbh->query('SELECT * FROM report')->fetchAll();

echo array2html( $titles, $data );





require "inc/footer.php";



