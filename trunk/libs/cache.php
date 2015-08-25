<?php
/**
 * Klasa do oblugi cachowania cegiel
 * (pozniej rozszerze to o cachowanie dowolnych elementow)
 * @return 
 */
class Cache {
    	
	function Cache() {
			
	}
	
	function formatKey($key) {
		$key = explode(',',$key);
		
		foreach ($key as $i => $val) {
			if ($i != 0) $key[$i] = $_GET[$val];
		}	
		
		$key = implode('_',$key);	
		
		return $key;
	}
	/**
	 * Pobranie cache
	 * @return 
	 * @param $key Object
	 */
	function getCache($key) {
			
		$key = $this->formatKey($key);
			
		if (!@file_exists('cache/'.$key)) 
			return false;
		
		$data = @file_get_contents('cache/'.$key);
		$data = @unserialize($data);
		
		return base64_decode($data);	
	}
	
	/**
	 * Dodanie cache/ aktualizacja cache
	 * @return 
	 * @param $key Object
	 * @param $data Object
	 */
	function addCache($key, $data) {
  		
		$key = $this->formatKey($key);
		
		$fh = @fopen('cache/'.$key,'w');
		$data = base64_encode($data);
		@fwrite($fh,serialize($data));
		@fclose($fh);
	}
		
	/**
	 * Usuniecie cache
	 * @return 
	 * @param $key Object
	 */
	function dropCache($key) {	
	
		$key = $this->formatKey($key);
			
		@unlink('cache/'.$key);
	}
	
	/**
	 * Usuniecie wszystkich cache
	 * @return 
	 */
	function dropAllCache() {
		$dir=@opendir('../cache/');	
		
		while($file_name=@readdir($dir)) {
		    if(($file_name!=".")&&($file_name!="..")) {
		        @unlink('../cache/'.$file_name);
        	}
	    }
		@closedir($dir);
	}
};
?>
