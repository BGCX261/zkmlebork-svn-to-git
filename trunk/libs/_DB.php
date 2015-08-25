<?php
/**
 * Klasa obslugujaca zapytania do bazy danych
 * Wszystkie klasy dziedzicza po tej klasie
 */
class DB {
    	
	var $base;
	
	var $memsql = '';
		
	/**
	* Konstruktor - polaczenie do bazy
	* @return 
	*/
	function DB() {
		$this->base = @mysql_connect(
			'localhost',
			'root',
			'');
		@mysql_select_db('mydb');
		//@mysql_query('SET NAMES utf8');
	}

	
	/**
	 * Zwraca tablice rekord�w
	 * z zapytania, uwzglednia bindowanie zmiennych
	 */
	function FetchData($sql, $bind = array()) {
			
			
		foreach ($bind as $key => $val) {
			$type = $key[0];
			if ($type == 's') {
				$sql = str_replace(':'.$key, '\''.$val.'\'', $sql);
			} else if ($type == 'i') {
				$sql = str_replace(':'.$key, $val, $sql);
			}
		}

		$result = mysql_query($sql);
			
		$data = array();

		while ($row = @mysql_fetch_array($result)) {
        	$data[] = $row;
        }
		
  		return $data;
	}
	/**
	 * Zwraca jeden rekord 
	 */
    function getOneRow($table,$id_row ,$id) {
	$sql = 'select * from '.$table.' where '.$id_row. ' = ' .$id;
	$data = $this->FetchData($sql);
	return $data[0];
	}
	
	/**
	 * Update/delete/add na bazie danych
	 */
	function DmlData($sql, $bind = array()) {
		
		
		
		if (!empty($bind))
		foreach ($bind as $key => $val) {
			$type = $key[0];
			if ($type == 's') {
				$sql = @str_replace(':'.$key, '\''.$val.'\'', $sql);
			} else if ($type == 'i') {
				$sql = @str_replace(':'.$key, $val, $sql);
			}
		}

		return mysql_query($sql);
	}
	
	/**
	 * Zwraca modyfikowane wiersze
	 * @return 
	 */
	function AffectedRows() {
		return @mysql_affected_rows();
	}

	/**
	 * Start transakcji
	 * @return 
	 */
	function StartTransaction() {
		$sql = 'BEGIN;';
		return mysql_query($sql);
	}

	/**
	* Commitowanie transakcji
	* @return 
	*/
	function Commit() {
		$sql = 'COMMIT;';
		return mysql_query($sql);
	}
	
	/**
	 * Wycofanie transakcji
	 * @return 
	 */
	function Rollback() {
		$sql = 'ROLLBACK;';
		return mysql_query($sql);
	}	
	
	/**
	 * Pobranie id ostatnio dodanego wiersza
	 * @return 
	 */
	function getInsertId() {
		return mysql_insert_id();
	}

	/**
	 * Pobranie ostatniego komunikatu o bledzie
	 * @return 
	 */
	function getError() {
		return mysql_error($this->base);
	}
		
}
?>
