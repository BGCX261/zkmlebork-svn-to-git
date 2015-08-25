<?php
	session_start();
	include ('libs/macro.php');
	includeFiles('libs/');
	
	$HTML['DATA'] = array (
		'businfo'
	);	
		

	$sys = & new System($HTML, $META);

	include('views/emptyview.php');


?>
