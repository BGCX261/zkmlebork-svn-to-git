<table class="table">
	<tr>
		<th class="w70">Symbol</th>
		<th class="w500">Opis</th>
		<th></th>
	</tr>
</div>

<?php  for ($i = 0; $i < sizeof($legenda); $i++) { ?>
<tr>
	
<form action="admin_legenda.php" method="post">   

	<input type="hidden" name="id_legenda" value="<?php echo $legenda[$i]['id_legenda']?>" />

<?php if(!empty($_POST['zmien_legenda']) && $_POST['id_legenda'] == $legenda[$i]['id_legenda']  ){  ?>	
	
		<td><input type="text" value="<?php echo $legenda[$i]['symbol'] ?>" name="symbol_legenda"  size="4"/></td>
		<td><input class="w150" name="opis_legenda" value="<?php echo $legenda[$i]['opis'] ?>" /></td>
		<td><input class="btn" type="submit" name="zapisz_legenda" value="Zapisz"/>
	
<?php }else{ ?>

	<td><?php echo $legenda[$i]['symbol'] ?></td>
	<td><?php echo $legenda[$i]['opis'] ?></td>
	<td><input class="btn" type="submit" name="zmien_legenda" value="Zmień"/>

<?php } ?>

	<input onclick="return confirm('Czy na pewno chcesz usunąć legende ?');" class="btn" type="submit" name="usun_legenda" value="Usuń"/></td>

</form>

</tr>
<?php } ?>

</table>

