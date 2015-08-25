<script type="text/javascript" src="../js/admin_trasa.js"></script>
<h3>Administracja trasami</h3>
<?php echo $MSG; ?>
<div class="form">
	
	<form name="linia" method="post" action="admin_trasa.php">
		<input type="hidden" size="60" name="id_trasa" value="<?php if(!empty($trasa_more['id_trasa'])) {  echo $trasa_more['id_trasa'];} ?>" />
	<span>Kierunek:</span>

  <input class="inp_txt w220" type="text" size="60" name="kierunek" value="<?php if(!empty($trasa_more['kierunek'])) { echo $trasa_more['kierunek'];} ?>" /><br /><br />
  
<span>Lista kolejnych przystanków na trasie:</span><br class="clr" />

<script type="text/javascript">
var trasaObj = new Trasa();

<?php echo "\n";

if(!empty($trasa_more['trasa'])) { 
	
	foreach($trasa_more['trasa'] as $trasa) {   
		echo 'trasaObj.addTrasa(\''.format($trasa).'\')'."\n" ;
	}
	
}
?>
var html = trasaObj.getForm();
</script>

<div id="trasaList">
<script type="text/javascript">
document.write(html);
</script>
</div>
<br class="clr" />

<?php  if(!empty($trasa_more['trasa'])) { ?>  

	<input type="submit" value="Zmien" name="save_trasa" class="btn">

	<?php } else{ ?>

	<input type="submit" value="Dodaj" name="dodaj_trasa" class="btn">

	<?php } ?>
	</form>

</div>
