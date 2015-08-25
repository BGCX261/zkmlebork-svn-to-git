<?php

class DBManager extends DB{

function DBManager() {
		$this->DB();	
	}

function getLegenda() {
	$sql = 'select * from legenda ';
	$data = $this->FetchData($sql);
	return $data;
}
	
	
}


?>