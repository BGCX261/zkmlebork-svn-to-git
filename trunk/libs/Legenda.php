<?php

class Legenda extends DB{

function Legenda() {
		$this->DB();	
	}

function getLegenda() {
	$sql = 'select * from legenda';
	$data = $this->FetchData($sql);
	return $data;

}

function addLegenda($opis_legenda,$symbol){  
	 
	$sql = "INSERT INTO legenda (id_legenda,opis,symbol) VALUES  (NULL,:s:opis,:s:symbol)  ";
	$bind['s:opis'] = $opis_legenda;
	$bind['s:symbol'] = $symbol;
	return $this->DmlData($sql, $bind);		
}
function updateLegenda($id_legenda,$opis,$symbol){  
	$sql = "UPDATE legenda SET opis =:s:opis,symbol=:s:symbol where id_legenda = :i:id";
	$bind['i:id'] = $id_legenda;
	$bind['s:opis'] = $opis;
	$bind['s:symbol'] = $symbol;
	return $this->DmlData($sql, $bind);
		
}
function deleteLegenda($id_legenda){  
	$sql= "delete from legenda where id_legenda = :i:id_legenda ;";
    $bind['i:id_legenda'] = $id_legenda;
    return $this->DmlData($sql, $bind);		
}	

	
	
}


?>