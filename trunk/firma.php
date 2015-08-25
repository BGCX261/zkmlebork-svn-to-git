<?php
	session_start();
	include ('libs/macro.php');
	includeFiles('libs/');
	
	$HTML['CENTER'] = array (
		'firma'
	);	
		
	$HTML['HEADER'] = array (
		'header',
	);	

	$HTML['LEFT'] = array (
		'witamy',
		'kontakt'
	);	
			
	$META['title'] = 'O firmie - MZK Lębork';

	$sys = & new System($HTML, $META);

	include('views/view2col.php');


?>


