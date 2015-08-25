<?php
	session_start();
	include ('../libs/macro.php');
	@includeFiles('../libs/');

	CheckAuth();

	$HTML['CENTER'] = array (
		'form_legenda' => array('cacheKey' => 'form_legenda'),
		'legenda' => array('cacheKey' => 'legenda'),
	);	
		
	$HTML['HEADER'] = array (
		'nawigacja' => array ('cacheKey' => 'nawigacja'),
	);	

	$HTML['LEFT'] = array (
		'help',
	);	
			
	$META['title'] = 'Adminstracja MZK Lębork - Legenda';

	
	$sys = & new System($HTML, $META);

	include('../views/view2coladmin.php');


?>

