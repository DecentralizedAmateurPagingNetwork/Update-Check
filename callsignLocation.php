<?php
	// download current data from Hamnetdb
	file_put_contents("data.csv", file_get_contents("http://hamnetdb.net/csv.cgi?tab=site"));
	$csvFile = file("data.csv");

	// parse each line as csv-data
	$data = [];
	foreach ($csvFile as $line) {
		$data[] = str_getcsv(trim($line));
	}

	// build JSON-object with relevant data
	$out = array("data" => array());
	for ($i = 2; $i < sizeof($data); $i++) {
		$out["data"][] = array("name" => $data[$i][1], "callsign" => $data[$i][2], "longitude" => str_replace(',', '.', $data[$i][3]), "latitude" => str_replace(',', '.', $data[$i][4]));
	}

	// output
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	echo json_encode($out);
?>
