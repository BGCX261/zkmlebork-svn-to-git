<h3>Administracja odjazdami</h3>
<div class="form">
<script type="text/javascript" src="../js/admin.js"></script>

<form method="post" >
Wybierz nr. linii: <br />

<input type="hidden" name="id_linii" value="<?php if(!empty($przystanek_more['id_linii'])) echo $przystanek_more['id_linii']; ?> ">
<select name="id_linii" <?php if(!empty($przystanek_more['id_linii'])) echo "DISABLED"; ?> >
	
<option></option>
<?php  for ($i = 0; $i < sizeof($linia); $i++) { ?> 

  
  
  <option <?php if( !empty($przystanek_more['id_linii']) && $linia[$i]['id_linii'] == $przystanek_more['id_linii'] )echo "selected";?> value="<?php echo $linia[$i]['id_linii'] ?>">Linia nr <?php echo $linia[$i]['nazwa_linii'] ?></option>
  
  
<?php } ?>      
</select>




<br />

  <input type="hidden" name="id_przystanek" value="<?php if(!empty($przystanek_more['id_przystanek'])) echo $przystanek_more['id_przystanek']; ?> ">
Wybierz przystanek: <br /><select name="id_przystanek" <?php if(!empty($przystanek_more['id_linii'])) echo "DISABLED"; ?>>

  <option></option>
 <?php  for ($i = 0; $i < sizeof($przystanek); $i++) { ?> 
  <option <?php if( !empty($przystanek_more['id_przystanek']) && $przystanek[$i]['id_przystanek'] == $przystanek_more['id_przystanek'] )echo "selected";?>  value="<?php echo $przystanek[$i]['id_przystanek'] ?>"><?php echo $przystanek[$i]['nazwa'] ?></option>
 <?php } ?> 
   </select>
<br />

Kierunek    : <br /><select name="id_trasa">
  <option></option>
 <?php for ($i = 0; $i < sizeof($trasa); $i++) { ?> 
  <option <?php if( !empty($przystanek_more['id_trasa']) && $trasa[$i]['id_trasa'] == $przystanek_more['id_trasa'] )echo "selected";?> value="<?php echo $trasa[$i]['id_trasa']; ?>"><?php echo $trasa[$i]['kierunek']; ?></option>
  <?php } ?>
   </select><br />
   
Odjazdy w dni robocze:<br />
<script type="text/javascript">
var hoursObj1 = new Hours(1);

<?php echo "\n";


if(!empty($_POST['id_linii'])) {
	for ($i = 0; $i < sizeof($przystanek_more['Pn_Pt']); $i++) {  
	
	echo 'hoursObj1.addHour(\''.format($przystanek_more['Pn_Pt'][$i][0]).'\',\''. 
						   (!empty($przystanek_more['Pn_Pt'][$i][1]) ? $przystanek_more['Pn_Pt'][$i][1]:'').'\')'."\n" ;
	}
}else{  
echo 'hoursObj1.addHour(\''.'\')'."\n" ;
}


for ($i = 0; $i < sizeof($legenda); $i++) { 
			echo 'hoursObj1.addLegend(\''.$legenda[$i]['symbol'].'\')'."\n";
	} 
?>
var html = hoursObj1.getForm();

</script>

<div id="hoursList1">
<script type="text/javascript">
document.write(html);
</script>
</div>
<br />
Odjazdy w soboty:<br />
<script type="text/javascript">
var hoursObj2 = new Hours(2);
<?php echo "\n";

if(!empty($_POST['id_linii'])) {
	for ($i = 0; $i < sizeof($przystanek_more['Sb']); $i++) {  
	
	echo 'hoursObj2.addHour(\''.format($przystanek_more['Sb'][$i][0]).'\',\''. 
						   (!empty($przystanek_more['Sb'][$i][1]) ? $przystanek_more['Sb'][$i][1]:'').'\')'."\n" ;
	}
}else{  
echo 'hoursObj2.addHour(\''.'\')'."\n" ;
}

for ($i = 0; $i < sizeof($legenda); $i++) { 
			echo 'hoursObj2.addLegend(\''.$legenda[$i]['symbol'].'\')'."\n";
	} 
?>
var html = hoursObj2.getForm();
</script>

<div id="hoursList2">
<script type="text/javascript">
document.write(html);
</script>
</div>
<br />
Odjazdy w niedziele:<br />
<script type="text/javascript">
var hoursObj3 = new Hours(3);
<?php echo "\n";

if(!empty($_POST['id_linii'])) {
	for ($i = 0; $i < sizeof($przystanek_more['Nd']); $i++) {  
	
	echo 'hoursObj3.addHour(\''.format($przystanek_more['Nd'][$i][0]).'\',\''. 
						   (!empty($przystanek_more['Nd'][$i][1]) ? $przystanek_more['Nd'][$i][1]:'').'\')'."\n" ;
	}
}else{  
echo 'hoursObj3.addHour(\''.'\')'."\n" ;
}

for ($i = 0; $i < sizeof($legenda); $i++) { 
			echo 'hoursObj3.addLegend(\''.$legenda[$i]['symbol'].'\')'."\n";
	} 
?>
var html = hoursObj3.getForm();
</script>

<div id="hoursList3">
<script type="text/javascript">
document.write(html);
</script>
</div>

<br />


<?php  if(!empty($przystanek_more['id_linii'])) { ?>  

	<input type="submit" value="Zmien" name="save_odjazdy" class="btn">

	<?php } else{ ?>

	<input type="submit" value="Dodaj" name="dodaj_odjazdy" class="btn">

	<?php } ?>




</form>
</div>