<?php
	session_start();
	include ('../libs/macro.php');
	includeFiles('../libs/');
	
	CheckAuth();
	
	$HTML['CENTER'] = array (
		'odjazdy'
	);	
		
	$HTML['HEADER'] = array (
	
	);	

	$HTML['LEFT'] = array (
		
	);	
	$sys = & new System($HTML, $META);
	

	include('../views/view2coladmin.php');


?>


