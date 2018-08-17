<?php


require "inc/functions.php";



/*
	controling some errors
*/

$errors = [];


if( ! $_POST['latitude'] || ! $_POST['longitude']  )
{
	$errors['where'] = 'Please, click somewhere in the map !';
}

if( ! $_POST['when'] )
{
	$errors['when'] = 'Please, choose a correct date';
}

if( ! $_POST['howmany'] )
{
	$errors['howmany'] = 'Just tel us how many with a positive number !';
}


if( count($errors) )
{
	header('Location: index.php?' . http_build_query($errors));
	exit();
}




/*
	And now, let's do the job :
	recording data in the database !
*/

$dbh = db_connect($cfg);

$sql = '
	INSERT INTO report (`latitude`, `longitude`, `when`, `howmany`)
	VALUES (:latitude, :longitude, :when, :howmany);
';

$stmt = $dbh->prepare($sql);

$stmt->execute(array(
	"latitude" => $_POST['latitude'],
	"longitude" => $_POST['longitude'],
	"when" => $_POST['when'],
	"howmany" => $_POST['howmany']
));




/*
	Returning the original page with success message
*/

$success = "Thank you for your help !";

header("Location: index.php?success=$success");



