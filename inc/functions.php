<?php

require_once "configuration.php";



function db_connect( $cfg )
{
	try
	{
		return new PDO('mysql:host=localhost;dbname=' . $cfg['db'], $cfg['login'], $cfg['pass']);
	}
	catch(PDOException $e)
	{
		die( $e->getMessage() );
	}
}



function extends_data( $data )
{
	foreach( $data as &$d )
	{
		// adding "day" & "hour" values

		$d['day'] = date('d/m/Y', strtotime($d['when']));
		$d['hour'] = date('H:i', strtotime($d['when']));

		// adding a beautyfull location field ;)

		$map = '<div class="place" data-lat="%s" data-lon="%s"></div>';
		$d['place'] = sprintf($map, $d['latitude'], $d['longitude']);
	}
	return $data;
}


/*
	This function converts a PHP array in HTML array
	 - $titles : a key/val array of titles
	 		(keys must corresponds to arr parameters)
	 - $arr : a list of objects to be ceon verted to a HTML array
	 		(parameter names must correspond to the title keys to work)
	 - returns : the HTML string
*/
function array2html( $titles, $arr )
{
	$html = '<table class="table"><thead><tr>';

	foreach( $titles as $key => $val )
	{
		$html .= '<th>' . $val . '</th>';
	}

	$html .= '</tr></thead><tbody>';

	foreach($arr as $row )	// for each row
	{
		$html .= '<tr>';

		foreach( $titles as $key => $val )
		{
			$html .= '<td>' . $row[$key] . '</td>';
		}

		$html .= '</tr>';
	}

	$html .= '</tr></tbody></table>';

	return $html;
}