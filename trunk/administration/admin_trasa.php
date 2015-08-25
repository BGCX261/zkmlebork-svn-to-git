<?php
	session_start();
	include ('../libs/macro.php');
	@includeFiles('../libs/');
	CheckAuth();
	$HTML['CENTER'] = array (
		'form_trasa',
		'trasa',
	);	
		
	$HTML['HEADER'] = array (
		'nawigacja',
	);	
	$HTML['LEFT'] = array (
		'help',
	);			
	$META['title'] = 'Adminstracja MZK Lębork - Trasa';
	$sys = & new System($HTML, $META);
	include('../views/view2coladmin.php');
?>

