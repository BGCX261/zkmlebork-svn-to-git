<?php

class Trasa extends DB{

function Trasa() {
		$this->DB();	
	}

function getTrasa() {
	$sql = 'select * from trasa ORDER BY id_trasa ASC';
	$data = $this->FetchData($sql);
	$tmp = array();
		foreach ($data as $rec) {
		$record = array();
		$record['id_trasa'] = $rec['id_trasa'];
		$record['kierunek'] = $rec['kierunek'];
		$tab = explode(';',$rec['trasa']);
		$record['trasa'] = explode(';',$rec['trasa']);
		$tmp[] = $record;
		}
	return $tmp;
}

function addTrasa($kierunek,$trasa){  
	 
	$sql = "INSERT INTO trasa (id_trasa,kierunek,trasa) VALUES  (NULL,:s:kierunek,:s:trasa)  ";
	$bind['s:kierunek'] = $kierunek;
	$bind['s:trasa'] = $trasa;
	return $this->DmlData($sql, $bind);		
}


function deleteTrasa($id_trasa){  
	$sql= "delete from trasa where id_trasa = :i:id_trasa ;";
    $bind['i:id_trasa'] = $id_trasa;
    return $this->DmlData($sql, $bind);		
}


function getDetails($table,$id_row ,$id) {
	$sql = 'select * from '.$table.' where '.$id_row. ' = ' .$id;
	$data = $this->FetchData($sql);
	
	$tmp = array();
		foreach ($data as $rec) {
		$record = array();
		$record['id_trasa'] = $rec['id_trasa'];
		$record['kierunek'] = $rec['kierunek'];		
		$tab = explode(';',$rec['trasa']);
		$record['trasa'] = explode(';',$rec['trasa']);
		$tmp[] = $record;
		}
	
	return $tmp[0];

}

function updateTrasa($id_trasa,$kierunek,$trasa){  
	$sql = "UPDATE trasa SET kierunek=:s:kierunek, trasa =:s:trasa where id_trasa = :i:id_trasa";
	$bind['i:id_trasa'] = $id_trasa;
	$bind['s:kierunek'] = $kierunek;
	$bind['s:trasa'] = $trasa;
	return $this->DmlData($sql, $bind);
		
}
	
	
	
	
	
}


?>