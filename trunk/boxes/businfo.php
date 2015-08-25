<?php

function format($num) {
	if (strlen($num) == 1)
		return '0'.$num;
		
	return $num;
}

function getHourHtml($dane, $znak) {
	$html = '<'.$znak.'>';

	$godziny = explode(';',$dane);
	
	$tmp = array();
	
	foreach ($godziny as $godz) {
		list($h,$m) = explode(':',trim($godz));
		
		list ($m, $p) = explode(' ',trim($m));
		
		$tmp[$h][] = format($m).' '.$p;
	}	
	
	foreach ($tmp as $h => $minuty) {
		$html .= '<godz h="'.format($h).'">';
		foreach ($minuty as $m) {
			$html .= '<m>'.$m.'</m>';
		}
		$html .= '</godz>';
	}
	
	$html .= '</'.$znak.'>';
	
	return $html;
}

header("Content-type: application/xml"); 

echo '<busstop>';

//generowanie xmla
foreach ($data as $bus) {
	
?>
	
<linia name="<?php echo $bus['nazwa_linii']?>">
	<nazwa><?php echo $bus['nazwa']?></nazwa>

	<?php echo getHourHtml($bus['pn_pt'], "robocze"); ?>
	<?php echo getHourHtml($bus['sb'], "soboty"); ?>
	<?php echo getHourHtml($bus['nd'], "niedziele"); ?>

	<trasa><?php echo $bus['trasa']?></trasa>
	<kierunek>Brak danych</kierunek>
	<legenda><?php echo htmlspecialchars(str_replace(';','<br />',$bus['opis']))?></legenda>
</linia>	
		
<?php	
}

echo '</busstop>';
?>
