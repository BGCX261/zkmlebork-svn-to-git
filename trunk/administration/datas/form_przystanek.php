<?php$lib = new BusStop();$przystanek = $lib->getAllBusStop();$tmp = array();foreach ($_POST['hours'] as $key => $hour) {	$tmp[] = $hour.' '.$_POST['legend'][$key];}$str = implode(';',$tmp);//echo $str."<br /><br />";	if (!empty($_POST['Save'])) { //tutaj zapis		$hours = implode(';',$_POST['hours']); //sklejenie do stringa		echo $hours;	}	//to sa przykladowe dane o odjazdach	//my oczywiscie wyciagniemy je z bazy :]	$odj = '12:45;13:05;13:54;15:12';	$odj = explode(';',$odj);if(!empty($_POST['dodaj_odjazdy'])  ){	$tmp = array();	foreach($_POST['hours1'] as $key => $hours )	$tmp1[] = $hours . ' '.$_POST['legend1'][$key]; 		foreach($_POST['hours2'] as $key => $hours )	$tmp2[] = $hours . ' '.$_POST['legend2'][$key]; 		foreach($_POST['hours3'] as $key => $hours )	$tmp3[] = $hours . ' '.$_POST['legend3'][$key]; 		$Pn_Pt = implode(';',$tmp1);	$Sb = implode(';',$tmp2);	$Nd = implode(';',$tmp3);			if ($lib->addOdjazdy($_POST['id_trasa'],$_POST['id_przystanek'],$Pn_Pt,$Sb,$Nd,$_POST['id_linii'])){		$message = 'Odjazdy zostały pomyślnie dodane';		$MSG = Msg($message,1);	} else {		$message = 'Błąd dodawania odjazdów.';		$MSG = Msg($message,0);			}	   }if(!empty($_POST['usun_odjazd'])){	echo $_POST['id_linii'];		if ($lib->deleteOdjazdy($_POST['id_linii'],$_POST['id_przystanek'])) {			$message = 'Odjazdy została pomyślnie usunięte';		$MSG = Msg($message,1);	} else {		$message = 'Błąd usuwania odjazdów';		$MSG = Msg($message,0);			}}if (!empty($_POST['id_linii'])  ){    $id_linii = $_POST['id_linii'];	$id_przystanek= $_POST['id_przystanek'];    $przystanek_more = $lib->getPrzystanekDetail($id_przystanek,$id_linii);}if (! empty($_POST['save_odjazdy'])){		$id_przystanek = $_POST['id_przystanek'];	$id_linii =  $_POST['id_linii'];	$id_trasa =  $_POST['id_trasa'];		$tmp = array();	foreach ($_POST['hours1'] as $key1 => $value1) {        $hours1[0]=$value1;		$hours1[1]=$_POST['legend1'][$key1];		$tmp[]=trim($hours1[0].' '.$hours1[1]);			}	   $Pn_Pt = implode(';', $tmp);      	$tmp2 = array();	foreach ($_POST['hours2'] as $key1 => $value1) {        $hours2[0]=$value1;		$hours2[1]=$_POST['legend2'][$key1];		$tmp2[]=trim($hours2[0].' '.$hours2[1]);			}	   $Sb = implode(';', $tmp2);       $tmp3 = array();	foreach ($_POST['hours3'] as $key1 => $value1) {        $hours3[0]=$value1;		$hours3[1]=$_POST['legend3'][$key1];		$tmp3[]=trim($hours3[0].' '.$hours3[1]);			}	   $Nd = implode(';', $tmp3);    echo $id_trasa . ' ' . $id_przystanek . ' ' .$Pn_Pt.' '.$Sb.' '.$Nd.' '.$id_linii;       if ($lib->updatePrzystanek($id_trasa, $id_przystanek,$Pn_Pt,$Sb,$Nd,$id_linii)) {    	$message = 'Odjazdy zostały pomyślnie zaktualizowane';    	$MSG = Msg($message, 1);	} else {    	$message = 'Błąd aktualizacji odjazdów.';    	$MSG = Msg($message, 0);			}	}	$lib2 = new Linia();$linia = $lib2->getLinia();	$lib3 = new Trasa();$trasa = $lib3->getTrasa();	$lib4 = new Legenda();$legenda= $lib4->getLegenda();		?>