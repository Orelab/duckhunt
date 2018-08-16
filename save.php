<?php


require "inc/functions.php";



/*
	controling some errors
*/

$errors = [];


if( ! $_POST['where'] )
{
	$errors['where'] = 'You did not write where you were...';
}

if( ! $_POST['when'] )
{
	$errors['when'] = 'You did not write when it was...';
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
	INSERT INTO report (`where`, `when`, `howmany`)
	VALUES (:where, :when, :howmany);
';

$stmt = $dbh->prepare($sql);

$stmt->execute(array(
	"where" => $_POST['where'],
	"when" => $_POST['when'],
	"howmany" => $_POST['howmany']
));




/*
	Returning the original page with success message
*/

$success = "Thank you for your help !";

header("Location: index.php?success=$success");



