<?php

class BusStop extends DB                                            
{                                                             
      
	/**
	 * Konstruktor tworzacy polaczenie do bazy
	 * @return 
	 */    
	function BusStop() {
		$this->DB();
	}
	function getPrzystanek() {
		$sql = 'SELECT ln.nazwa_linii, p.nazwa, t.kierunek, o.Pn_Pt, o.Sb, o.Nd, o.id_linii,o.id_przystanek,o.id_trasa
			FROM trasa t, odjazdy o, przystanek p,  linia ln
			WHERE t.id_trasa = o.id_trasa
			AND p.id_przystanek = o.id_przystanek
			AND ln.id_linii = o.id_linii
			ORDER BY `p`.`nazwa` ASC';
		$data = $this->FetchData($sql);
		return $data;
	}
<<<<<<< .working
	function getPrzystanekDetail($id_przystanek,$id_linii) {
=======
	function getPrzystanekDetail($id_przystanek,$id_linii) {
		echo $id_linii .' ';
		echo $id_przystanek;
>>>>>>> .merge-right.r71

		$sql = 'SELECT ln.nazwa_linii, p.nazwa, t.kierunek, o.Pn_Pt, o.Sb, o.Nd, o.id_linii,o.id_przystanek,o.id_trasa
			FROM trasa t, odjazdy o, przystanek p,  linia ln
			WHERE t.id_trasa = o.id_trasa
			AND p.id_przystanek = o.id_przystanek
			AND ln.id_linii = o.id_linii
			AND o.id_przystanek = '.$id_przystanek.'
			AND o.id_linii = '.$id_linii;
			
		$data = $this->FetchData($sql);

<<<<<<< .working
		$tmp = array();
		foreach ($data as $rec) {
			$record = array();
			$record['id_przystanek'] = $rec['id_przystanek'];
			$record['id_linii'] = $rec['id_linii'];
			$record['id_trasa'] = $rec['id_trasa'];
        	$record['Pn_Pt'] = explode(';',$rec['Pn_Pt']);
			$record['Sb'] = explode(';',$rec['Sb']);
			$record['Nd'] = explode(';',$rec['Nd']);
		
			foreach ($record['Pn_Pt'] as $key => $rec1) {		
			$record['Pn_Pt'][$key] = explode(' ',$rec1);			
			}
							
			foreach ($record['Sb'] as $key => $rec2) {		
			$record['Sb'][$key] = explode(' ',$rec2);			
			}
			
			foreach ($record['Nd'] as $key => $rec2) {		
			$record['Nd'][$key] = explode(' ',$rec2);			
			}
					//$record['Odjazd2']=$odjazd2;	
					//var_dump($record['Odjazd2'][0][1])	;	
	
		$tmp[] = $record;
		
		}		
	return $tmp[0];
		
	}
	
	function addOdjazdy($id_trasa,$id_przystanek,$Pn_Pt,$Sb,$Nd,$id_linii){  
	 
	$sql = "INSERT INTO odjazdy (id_trasa,id_przystanek,Pn_Pt,Sb,Nd,id_linii) VALUES  (:i:id_trasa,:i:id_przystanek,:s:Pn_Pt,:s:Sb,:s:Nd,:i:id_linii)  ";
	$bind['i:id_trasa'] = $id_trasa;
	$bind['i:id_przystanek'] = $id_przystanek;
	$bind['s:Pn_Pt'] = $Pn_Pt;
	$bind['s:Sb'] = $Sb;
	$bind['s:Nd'] = $Sb;
    $bind['i:id_linii'] = $id_linii;
	return $this->DmlData($sql, $bind);		
}
=======
		$tmp = array();
		foreach ($data as $rec) {
			$record = array();
			$record['id_przystanek'] = $rec['id_przystanek'];
			$record['id_linii'] = $rec['id_linii'];
        	$record['Pn_Pt'] = explode(';',$rec['Pn_Pt']);
			$record['Sb'] = explode(';',$rec['Sb']);
		
		
		
				foreach ($record['Pn_Pt'] as $rec2) {		
					if(strstr($rec2, ' ')){
						echo "jestem";
					$odjazd1[] = explode(' ',$rec2);
				}else
				$odjazd1[] = explode(';',$rec['Pn_Pt']);;
					
				}
					$record['Odjazd1']=$odjazd1;
					
					
					
					
				foreach ($record['Sb'] as $rec3) {
					if(strstr($rec2, ' ')){
					$odjazd2[] = explode(' ',$rec3);
					}else
				$odjazd2[] = explode(';',$rec['Sb']);
				}
					$record['Odjazd2']=$odjazd2;	
					var_dump($record['Odjazd2'][0][1])	;	
	
		
		$tmp[] = $record;
		}
>>>>>>> .merge-right.r71

<<<<<<< .working
function deleteOdjazdy($id_linii,$id_przystanek){  
	$sql= "delete from odjazdy where id_linii = :i:id_linii AND id_przystanek = :i:id_przystanek ;";
    $bind['i:id_linii'] = $id_linii;
	$bind['i:id_przystanek'] = $id_przystanek;
    return $this->DmlData($sql, $bind);		
}



	function updatePrzystanek($id_trasa,$id_przystanek,$Pn_Pt,$Sb,$Nd,$id_linii){  
		$sql = "UPDATE odjazdy SET id_trasa =:i:id_trasa,id_przystanek =:i:id_przystanek,Pn_Pt =:s:Pn_Pt,Sb =:s:Sb,Nd =:s:Nd,id_linii =:i:id_linii 
				where id_przystanek =:i:id_przystanek AND id_linii =:i:id_linii";
		$bind['i:id_trasa'] = $id_trasa;
=======
		
	return $tmp[0];
		
	}
	
	function addOdjazdy($id_trasa,$id_przystanek,$Pn_Pt,$Sb,$Nd,$id_linii){  
	 
	$sql = "INSERT INTO odjazdy (id_trasa,id_przystanek,Pn_Pt,Sb,Nd,id_linii) VALUES  (:i:id_trasa,:i:id_przystanek,:s:Pn_Pt,:s:Sb,:s:Nd,:i:id_linii)  ";
	$bind['i:id_trasa'] = $id_trasa;
	$bind['i:id_przystanek'] = $id_przystanek;
	$bind['s:Pn_Pt'] = $Pn_Pt;
	$bind['s:Sb'] = $Sb;
	$bind['s:Nd'] = $Sb;
    $bind['i:id_linii'] = $id_linii;
	return $this->DmlData($sql, $bind);		
}

function deleteOdjazdy($id_linii,$id_przystanek){  
	$sql= "delete from odjazdy where id_linii = :i:id_linii AND id_przystanek = :i:id_przystanek ;";
    $bind['i:id_linii'] = $id_linii;
	$bind['i:id_przystanek'] = $id_przystanek;
    return $this->DmlData($sql, $bind);		
}



	function updatePrzystanek($id_przystanek,$nazwa){  
		$sql = "UPDATE przystanek SET nazwa =:s:nazwa where id_przystanek = :i:id_przystanek";
>>>>>>> .merge-right.r71
		$bind['i:id_przystanek'] = $id_przystanek;
		$bind['s:Pn_Pt'] = $Pn_Pt;
		$bind['s:Sb'] = $Sb;
		$bind['s:Nd'] = $Nd;
		$bind['i:id_linii'] = $id_linii;
		
		return $this->DmlData($sql, $bind);
		
	}
	
	
  
	function getAllBusStop() {
		$sql = 'select * from przystanek ORDER BY `nazwa` ASC';
		
		return $this->FetchData($sql);
	}  
	
	function updateBusStop($id, $nazwa, $wsp) {
		$sql = 'update przystanek set nazwa = :s:nazwa, wspolrzedne = :s:wspolrzedne
			where id_przystanek=:i:id;';	
			
		$bind['s:nazwa'] = $nazwa;
		$bind['s:wspolrzedne'] = $wsp;
		$bind['i:id'] = $id;
		
		return $this->DmlData($sql, $bind);
	}
	
	function clearWsp($id) {
		$sql = 'update przystanek set wspolrzedne = \'\'
			where id_przystanek=:i:id;';	
			
		$bind['i:id'] = $id;
		
		return $this->DmlData($sql, $bind);		
	}
	
	function getBusStopInfo($id) {
		$sql = '
		select 
			p.nazwa,
			l.nazwa_linii,
			t.trasa,
			oo.pn_pt,
			oo.sb,
			oo.nd

		from odjazdy oo 

		INNER JOIN linia l ON (l.id_linii = oo.id_linii) 
		INNER JOIN przystanek p ON (oo.id_przystanek = p.id_przystanek) 
		INNER JOIN trasa t ON (t.id_trasa = oo.id_trasa)  

		where oo.id_przystanek = :i:id
		';	
			
		$bind['i:id'] = $id;
		
		return $this->FetchData($sql, $bind);		
	}
	                                                          
}  


?>