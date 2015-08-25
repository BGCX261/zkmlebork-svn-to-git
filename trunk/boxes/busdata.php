<?php
	header("Content-type: application/xml"); 
	
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<busstops>';
	
	foreach ($data as $stop) {
		list($x,$y) = explode(',',$stop['wspolrzedne']);
		
		echo '
			<busstop>
				<id>'.$stop['id_przystanek'].'</id>
				<nazwa>'.$stop['nazwa'].'</nazwa>
				<wspx>'.$x.'</wspx>
				<wspy>'.$y.'</wspy>
			</busstop>
		';	
	}
	
	echo '</busstops>';
?>
