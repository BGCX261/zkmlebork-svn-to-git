<?php
	session_start();
	include ('../libs/macro.php');
	@includeFiles('../libs/');

	CheckAuth();

	$HTML['CENTER'] = array (
		'form_przystanek',
		'przystanek',
	);	
		
	$HTML['HEADER'] = array (
		'nawigacja',
	);	
		
	$META['title'] = 'Adminstracja MZK Lębork - Przystanek';

	
	$sys = & new System($HTML, $META);

	include('../views/view3col.php');


?>

