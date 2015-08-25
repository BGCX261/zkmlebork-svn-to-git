<?php
	include ('../libs/macro.php');
	includeFiles('../libs/');
	
	CheckAuth();
	
	$HTML['DATA'] = array (
		'busdata'
	);	
				
	$sys = & new System($HTML, $META);
	

	include('../views/emptyview.php');

?>



