<?php
//update przystanków
if (!empty($_POST['dane']) || !empty($_POST['busdel'])) {
		
	$data = $_POST['dane'];
	$wsp = $_POST['mapwsp'];
	
	$delete = explode(',',$_POST['busdel']);
	
	$lib = & new BusStop();
	
	$data = explode(',',$data);
	
	$buses= array();
	
	foreach ($data as $bus) {
		$tab = explode(';',$bus);
		
		$tmp = array();
		$tmp['id'] = $tab[0];
		$tmp['name'] = $tab[1];
		$tmp['wsp'] = $tab[2].','.$tab[3];
		
		$buses[] = $tmp;
	}
	
	$lib->StartTransaction();
	
	$ok = 0;
	
	foreach ($buses as $bus) {
		
		if ($lib->updateBusStop($bus['id'],$bus['name'],$bus['wsp'])) {
			$ok ++;
		}	
	}
	
	foreach ($delete as $del) {
		if ($lib->clearWsp($del)) {
			$ok ++;
		}			
	}
	
	if (count($buses) + count($delete) == $ok) {
		$lib->Commit();
		$MSG = 'Lokalizacje przystanków zosta³y zapisane';
	} else {
		$lib->Rollback();
		$MSG = 'B³±d zapisu przystanków: '.$lib->getError();	
	}
}


?>
