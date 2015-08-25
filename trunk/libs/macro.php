<<<<<<< .working
<?php

	function send_mail($mail, $msg, $mails) {
				
		$formsend = mail(
      		$mails,
      		"Wiadomosc z www.kwatera.turystyka.pl",
      		$msg,
      		"From:$mail\r\n"
		);
			
		if ($formsend)
			return true;
		else
			return false;
		
	}

	function format($str) {
	$str  = str_replace("\n",'',$str);
	$str  = str_replace("\r",'',$str);
	$str = htmlspecialchars($str);
	
	return $str;
	}
		
	function includeFiles($dirPath) {
		$dir=opendir($dirPath);	
		
		include_once($dirPath.'_DB.php');
		
		while($file_name=readdir($dir)) {
		    if(($file_name!=".")&&($file_name!="..") && substr($file_name,0,1) != '.') {
		        include_once($dirPath.$file_name);
        	}
	    }
		closedir($dir);
	}
	
	/**
	 * Pokazuje boks z komuniaktem na srodku strony
	 * @return 
	 * @param $msg Object
	 * @param $type Object
	 */
	function MsgBox($msg, $type) {
		if ($type == 1) $color = 'green';
		else if ($type == 0) $color = 'red';
		
		echo '
				<div id="msgback"></div>
				<div id="msgbox" class="msgbox">
					<div>'.$msg.'<br />
					<input type="button" onclick="document.getElementById(\'msgback\').style.display=\'none\';document.getElementById(\'msgbox\').style.display=\'none\';" value="" />
					</div>
				</div>	
			';
	}
	
		/**
	 * Ustawia tekst w boksie komunikat�w
	 * @return 
	 * @param $msg Object
	 * @param $type Object
	 */
	function Msg($msg, $type) {
		if ($type == 1) $color = 'green';
		else if ($type == 0) $color = 'red';
		
		return '<div class="message" style="color:'.$color.';">'.$msg.'</div>';				
	}
	
	function ResizeAndUpload($tempname,$orginname,$type,$uploaddir) {
		
		switch ($type) {
			case 'small': 
				$newwidth = 94;
				$newheight = 70;
				break;
			case 'medium':
				$newwidth = 250;
				$newheight = 190;
			 	break;
			case 'large': 
				$newwidth = 700;
				$newheight = 500;
				break;		
		}
	
		$uploadedfile = $tempname;
		$src = @imagecreatefromjpeg($uploadedfile);
	
		list($width,$height)=@getimagesize($uploadedfile);

		$picW = $newwidth;

		$picH=@($height/$width)*$picW;
	
		if ($picH > $newheight) {		
			$picH = $newheight;
			$picW=@($width/$height)*$picH;	
		}
		
		//tworze obrazek
		$tmp=@imagecreatetruecolor($picW,$picH);
		$bg_color = @imagecolorallocate($tmp, 255, 255, 255);
		@imagefill($tmp, 0, 0, $bg_color);
	
		//rysuje zmniejszone zdjecie na plotnie
		$x = 0;//($newwidth - $picW)/2;
		$y = 0;//($newheight - $picH)/2;
		@imagecopyresampled($tmp, $src, $x, $y, 0, 0, $picW, $picH, $width, $height);
	
		$filename = $uploaddir.$type."/".$orginname;
		$result = @imagejpeg($tmp,$filename,100);
	
		@imagedestroy($src);
		@imagedestroy($tmp); 
		
		return $result;
	}
	
	function getIP($type = 0) {
        if (getenv("HTTP_CLIENT_IP")
        	&& strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
       		$ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("REMOTE_ADDR")
        	&& strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        	$ip = getenv("REMOTE_ADDR");
        else if (getenv("HTTP_X_FORWARDED_FOR")
        	&& strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        	$ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (isset($_SERVER['REMOTE_ADDR'])
        	&& $_SERVER['REMOTE_ADDR']
        	&& strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
        	$ip = $_SERVER['REMOTE_ADDR'];
		else {
          $ip = "unknown";
           return $ip;
                     }
       if ($type==1) {return md5($ip);}
       if ($type==0) {return $ip;}
	} 
	
	function isAllowIP($file, $ip) {
		$content = @file_get_contents($file);
		
		if ($content === FALSE) {
			$fh = fopen($file,'a');
			fclose($fh);
			return true;
		}
		
		if (strpos($content,$ip) === FALSE) {
			return true;
		}
		return false;
	}
	
	function addIP($file, $ip) {
				
		$fh = fopen($file,'a');
		fwrite($fh,$ip.';');
		fclose($fh);
	}
	
	function lockSite() {
		$fh = fopen('../site.lock','a');
		fclose($fh);	
	}
	
	function unlockSite() {
		unlink('../site.lock');
	}
	
	function isLocked() {
		return file_exists('site.lock');
	}
	
	function putNaviBar($count, $perpage) {
		$page = $_GET['page'];
		
		if (empty($page)) 
			$page = 1;

		$pageCount = ceil($count/$perpage);
		
		$html = '
			<div style="width:100%;float:left;text-align:center;">';
			
		if ($page > 1)	
			$html .= '<a href="?page='.($page-1).'"><< poprzednia</a>';
				
		for ($i=1; $i <= $pageCount; $i++) {
			if ($i == $page) {
				$html .= '&nbsp; ['.$i.'] &nbsp;';	
			} else {
				$html .= '&nbsp; <a href="?page='.$i.'">'.$i.'</a> &nbsp;';
			}
		}

		if ($page < $pageCount)
			$html .= '<a href="?page='.($page+1).'">nast�pna >></a>';
		
		$html .= '</div>';
		
		
		return $html;
	}
	
    function checkEmail($email) { 
    	if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) || 
    		(preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) ) { 
    		
    		return true;
    	}
    	return false;
    }
	
	function auth(){
	    header('WWW-Authenticate: Basic realm="mzk lebork"');
	    header('HTTP/1.0 401 Unauthorized');
	    exit;
	}

	function LogOut() {
		
		session_unregister('log');
		auth();	
	}

	function CheckAuth() {
		
		$adminLib = & new adminlogin();
		
		if ( isset($_GET['p']) && $_GET['p'] == 'logout') {
			LogOut();
			exit;
		}
			
	  	if (!isset($_SERVER['PHP_AUTH_USER'])){		
	      		auth();
		} else {	
			if(!isset($_SESSION['log']))    
			{				
			 
	      		$login = $_SERVER['PHP_AUTH_USER'];
	       		$password = $_SERVER['PHP_AUTH_PW'];
	        
	       		if($adminLib->checkAdmin($login, $password))
	        	{ 
	           		session_register('log');
	           		$_SESSION['log'] = $login;
	        	} else {
	        		auth();
	        	}
			} 
		}         
	    
	}
	
	function validate($nullable) {
		$err = array();
		foreach ($_POST as $key => $post) {
		
			if (empty($post) && empty($nullable[$key])) {
				$err[] = $key;
			}
		}
		return $err;
	}
	
?>
=======
<table class="table w750">
	<tr>
	    <th class="w220">Kierunek</th>
    	<th>Trasa</th>
    	<th class="w150"></th>
	</tr>

<?php  foreach ($trasa as $tras) { ?> 

	<form action="admin_trasa.php" method="post"> 	
		<input type="hidden" name="id_trasa" value="<?php echo $tras['id_trasa']?>" />
	<tr>
		<td><?php echo $tras['kierunek'] ?></td>
		<td><?php echo implode('<img src="../images/bull.gif" />',$tras['trasa']);?></td>

		<td>
			<input type="submit" name="zmien_trasa" value="Zmień" class="btn"/>
			<input onclick="return confirm('Czy napewno chcesz usunąć trase ?');" 
				   type="submit" name="usun_trasa" value="Usuń" class="btn"/>
		</td>
	</tr>

	</form>
<?php } ?>

</table>

 

>>>>>>> .merge-right.r72
