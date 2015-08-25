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

 

