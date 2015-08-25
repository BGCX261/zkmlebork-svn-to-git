<?php

class Linia extends DB{

function Linia() {
		$this->DB();	
	}

function getLinia() {
	$sql = 'select * from linia ORDER BY nazwa_linii ASC';
	$data = $this->FetchData($sql);
	return $data;
}

function addLinia($nazwa_linii){  
	 
	$sql = "INSERT INTO linia (id_linii,nazwa_linii) VALUES  (NULL,:s:nazwa_linii)  ";
	$bind['s:nazwa_linii'] = $nazwa_linii;
	return $this->DmlData($sql, $bind);		
}


function updateLinia($id_linii,$nazwa_linii){  
	
	$sql = "UPDATE linia SET nazwa_linii =:s:nazwa_linii where id_linii = :i:id_linii";
	$bind['i:id_linii'] = $id_linii;
	$bind['s:nazwa_linii'] = $nazwa_linii;
	return $this->DmlData($sql, $bind);
		
}

function deleteLinia($id_linii){  
	$sql= "delete from linia where id_linii = :i:id_linii ;";
    $bind['i:id_linii'] = $id_linii;
    return $this->DmlData($sql, $bind);		
}

	
}


?>