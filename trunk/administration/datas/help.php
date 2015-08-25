<?php
    $id = $BOX_ATTR['helpId'];
	
	$def = 'Brak pomocy dla administracji modulem';	
	
	switch($id) {
		case 1:  //modul mapy
			$help = 'Administracja modułem mapy umożliwia rozmieszczanie pzystanków na mapie miejscowości.
			Aby tego dokonać należy przesunąć mapę w wyznaczone miejsce, z rowijalnej listy wybrać przystanek,
			wcisnąć przycisk z ikonką przystanku, a nastepnie kliknąć w wybrane miejsce na mapie.<br /><br />
			Umieszczony przystanek znika z listy rozwijalnej.<br /><br />
			Aby usunąć przystanek z mapy należy go zaznaczyć (Pojawi się wówczas biała otoczka wokół przystanku),
			a następnie kliknąć przycisk oznaczony krzyżykiem. Usunięte zostana przystkie zaznaczone przystanki.<br /><br />
			<b>UWAGA:</b> Zmiany na mapie zachowane są dopiero po kliknięciu przycisku "s". 
			';
			
			break;
		default:
			$help = $def;		
	}
	
	if (empty($help))
		$help = $def;

?>