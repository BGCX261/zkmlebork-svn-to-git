<table class="table w500">
	<tr>
		<th>Nazwa linii</th>
		<th class="w150" ></th>
	</tr>

<?php  foreach ($linia as$lin) { ?> 

		<form action="admin_linia.php" method="post"> 
			<input type="hidden" name="id_linii" value="<?php echo $lin['id_linii']?>" />
	<tr>
		
		<?php if(!empty($_POST['zmien_linia']) && $_POST['id_linii'] == $lin['id_linii']) {  ?>

		<td><input type="text" value="<?php echo $lin['nazwa_linii'] ?>" name="nazwa_linii" /></td>
		<td align="center"><input class="btn" type="submit" name="zapisz_linia" value="Zapisz"/>

		<?php }else{ ?>

		<td>Linia nr <?php echo $lin['nazwa_linii'] ?></td>
		<td align="center"><input type="submit" name="zmien_linia" value="Zmień" class="btn"/>

		<?php } ?>

		<input onclick="return confirm('Czy napewno chcesz usunąć linie ?');" type="submit" name="usun_linia" value="Usuń" class="btn"/></td>
	</tr>

 
	</form>
	
<?php } ?>

</table>

  
