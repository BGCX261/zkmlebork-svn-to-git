<?php
	session_start();
	include ('libs/macro.php');
	includeFiles('libs/');
	
	$HTML['CENTER'] = array (
		'historia'
	);	
		
	$HTML['HEADER'] = array (
		'header',
	);	

	$HTML['LEFT'] = array (
		'witamy',
	);	
			
	$META['title'] = 'O firmie - MZK Lębork';

	$sys = & new System($HTML, $META);

	include('views/view2col.php');


?>


