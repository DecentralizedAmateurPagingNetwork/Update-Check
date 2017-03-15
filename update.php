<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin, Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization');

if (!isset($_GET['core']) || empty($_GET['core'])) {
	$givenCoreVersion = '0.0.0';
} else {
	$givenCoreVersion = htmlspecialchars(trim($_GET['core']));
}

if (!isset($_GET['api']) || empty($_GET['api'])) {
	$givenApiVersion = '0.0.0';
} else {
	$givenApiVersion = htmlspecialchars(trim($_GET['api']));
}

if (!isset($_GET['web']) || empty($_GET['web'])) {
	$givenWebVersion = '0.0.0';
} else {
	$givenWebVersion = htmlspecialchars(trim($_GET['web']));
}

$currentCoreVersion = trim(file_get_contents('./dapnet-core-current-version.txt'));
$currentWebVersion = trim(file_get_contents('./dapnet-web-current-version.txt'));

if ($givenCoreVersion !== $currentCoreVersion) {
	$coreUpdateString = '<span style="background: rgba(255, 0, 0, 0.5)">An update is available.</span> Please download the current version from <a href="https://github.com/DecentralizedAmateurPagingNetwork/Core/releases" target="_blank">here</a>.';
} else {
	$coreUpdateString = '<span style="background: rgba(0, 255, 0, 0.5)">You are running the current version.</span>';
}

if ($givenWebVersion !== $currentWebVersion) {
	$webUpdateString = '<span style="background: rgba(255, 0, 0, 0.5)">An update is available.</span> Please download the current version from <a href="https://github.com/DecentralizedAmateurPagingNetwork/Web/releases" target="_blank">here</a>.';
} else {
	$webUpdateString = '<span style="background: rgba(0, 255, 0, 0.5)">You are running the current version.</span>';
}

?>

<style>h2, p { font-family: sans-serif; } h2 { margin: 0; } p { margin-top: .3em; }</style>

<h2>DAPNET Core</h2>
<p><b><?=$coreUpdateString?></b><br />
Your version: <b><?=$givenCoreVersion?></b><br />
Current version: <b><?=$currentCoreVersion?></b></p>

<h2>DAPNET API</h2>
<p>Your version: <b><?=$givenApiVersion?></b></p>

<h2>DAPNET Web</h2>
<p><b><?=$webUpdateString?></b><br />
Your version: <b><?=$givenWebVersion?></b><br />
Current version: <b><?=$currentWebVersion?></b></p>
