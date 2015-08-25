<?php
	session_start();
	include ('libs/macro.php');
	includeFiles('libs/');
	
	$HTML['CENTER'] = array (
		'map'
	);	
		
	$HTML['HEADER'] = array (
		'header',
	);	

	$HTML['LEFT'] = array (
		'witamy',
		'kontakt'
	);	
			
	$META['title'] = 'Strona główna - MZK Lębork';

	$sys = & new System($HTML, $META);

	include('views/view2colmap.php');


?>


