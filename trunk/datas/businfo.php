<?php
    //wyciaganie info o przystanku
	if (!empty($_GET['id'])) {
		$lib =  & new BusStop(); 
		$data = $lib->getBusStopInfo($_GET['id']);
	}
?>
