<?php
	session_start();
	include ('../libs/macro.php');
	@includeFiles('../libs/');

	CheckAuth();

	$HTML['CENTER'] = array (
		'form_linia',
		'linia' );
		
	$HTML['HEADER'] = array (
		'nawigacja' );	

	$HTML['LEFT'] = array (
		'help' => array('helpId' => 2) );	
		
	$META['title'] = 'Adminstracja MZK Lębork - Linia';

	
	$sys = & new System($HTML, $META);

	include('../views/view2coladmin.php');


?>

