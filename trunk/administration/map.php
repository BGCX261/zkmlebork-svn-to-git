<?php
	session_start();
	include ('../libs/macro.php');
	includeFiles('../libs/');
	
	CheckAuth();
	
	$HTML['CENTER'] = array (
		'map'
	);	
		
	$HTML['HEADER'] = array (
		'nawigacja'
	);	

	$HTML['LEFT'] = array (
		'help' => array('helpId' => 1)
	);	
	$sys = & new System($HTML, $META);
	

	include('../views/view2coladminmap.php');


?>


