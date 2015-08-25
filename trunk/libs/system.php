<?php
    class System {
    	
		var $cacheEnable = 0;
		
		var $HTML;
		
		var $META;
		
		var $cache;
		
		/**
		 * Ustawia parametry strony
		 * @return 
		 * @param $HTML Object - tablica nazw boksow dla poszczegolnych grup
		 * @param $META Object - meta dane dla strony
		 */
		function System($HTML, $META) {
			$this->META = $META;
			$this->HTML = $HTML;
			$this->cache = & new Cache();
		}
		
		/**
		 * �aduje grupe boks�w dla danej grupy 
		 * (left, right, header itp)
		 * @return 
		 * @param $name Object
		 */
		function LoadHtml($name) {
			
			if (!empty($this->HTML[$name]))
			foreach ($this->HTML[$name] as $key => $box)
				$this->LoadBox($box, $key);
		
		}
		
		/**
		 * Pobieranie meta danych
		 * @return 
		 * @param $name Object
		 */
		function getMeta($name) {
			return trim(strip_tags($this->META[$name]));
		}
		
		/**
		 * �aduje pojedynczy boks
		 * @return 
		 * @param $box Object
		 */
		function LoadBox($box, $key) {
					
			if (is_array($box) && !empty($box['cacheKey']) && !empty($this->cacheEnable)) {	
			
				$data = $this->cache->getCache($box['cacheKey']);
				
				if (false !== $data) {
					echo $data;
					return;
				}
			}

	 		if (!is_array($box)) {
 				@include('datas/'.$box.'.php');
				include('boxes/'.$box.'.php');		
			} else {
				foreach ($box as $k => $v) {
					$BOX_ATTR[$k] = $v;
				}
				@include('datas/'.$key.'.php');
				include('boxes/'.$key.'.php');	
				
				if (!empty($box['cacheKey']) && !empty($this->cacheEnable)) 
					$this->cache->addCache($box['cacheKey']
						,$this->getIncludeContents('boxes/'.$key.'.php'));
						
			}			
		}
			
		/**
		 * Tworzenie stringa z przetworzonego htmla
		 * @return 
		 * @param $filename Object
		 */
		function getIncludeContents($filename) {
    		if (is_file($filename)) {
        		ob_start();
        		include $filename;
        		$contents = ob_get_contents();
        		ob_end_clean();
        		return $contents;
   			 }
    		return false;
		}
		
    };
?>
