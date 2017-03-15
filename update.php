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
	$coreUpdateBadge = '<span class="label label-primary" style="font-size:.4em">OUTDATED</span>';
	$coreUpdateString = 'Please download the current version from <a href="https://github.com/DecentralizedAmateurPagingNetwork/Core/releases" target="_blank">here</a>.';
} else {
	$coreUpdateBadge = '<span class="label label-success" style="font-size:.4em">UP TO DATE</span>';
	$coreUpdateString = 'You are running the current version.';
}

if ($givenWebVersion !== $currentWebVersion) {
	$webUpdateBadge = '<span class="label label-primary" style="font-size:.4em">OUTDATED</span>';
	$webUpdateString = 'Please download the current version from <a href="https://github.com/DecentralizedAmateurPagingNetwork/Web/releases" target="_blank">here</a>.';
} else {
	$webUpdateBadge = '<span class="label label-success" style="font-size:.4em">UP TO DATE</span>';
	$webUpdateString = 'You are running the current version.';
}

?>

<div class="col-lg-4">
	<h2>DAPNET Core <?=$coreUpdateBadge?></h2>
	<p><b><?=$coreUpdateString?></b><br />
	Your version: <b><?=$givenCoreVersion?></b><br />
	Current version: <b><?=$currentCoreVersion?></b></p>
</div>

<div class="col-lg-4">
	<h2>DAPNET API</h2>
	<p>Your version: <b><?=$givenApiVersion?></b></p>
</div>

<div class="col-lg-4">
	<h2>DAPNET Web <?=$webUpdateBadge?></h2>
	<p><b><?=$webUpdateString?></b><br />
	Your version: <b><?=$givenWebVersion?></b><br />
	Current version: <b><?=$currentWebVersion?></b></p>
</div>
