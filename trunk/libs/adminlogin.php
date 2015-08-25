<?php

class AdminLogin extends DB                                            
{                                                             
      
	/**
	 * Konstruktor tworzacy polaczenie do bazy
	 * @return 
	 */    
	function AdminLogin() {
		$this->DB();
	}
  
  /**
   * Metoda sprawdza login i haslo administratora
   * nalezy oprzec to o baze danych
   * 
   * @return true/false
   * @param $login Object
   * @param $haslo Object
   */
	function checkAdmin($login, $haslo) {
		if($login == 'admin' && $haslo == 'admin') {  
			return true;                                                
		}                                                         
		else {                                                     
			return false;	
		}
  }                                                            
}  


?>