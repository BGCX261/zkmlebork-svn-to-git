<?php
	session_start();
	include ('libs/macro.php');
	includeFiles('libs/');
	
	$HTML['CENTER'] = array (
		'taryfa'
	);	
		
	$HTML['HEADER'] = array (
		'header',
	);	

	$HTML['LEFT'] = array (
		'witamy',
		'kontakt'
	);	
			
	$META['title'] = 'Taryfa - MZK Lębork';

	$sys = & new System($HTML, $META);

	include('views/view2col.php');


?>


