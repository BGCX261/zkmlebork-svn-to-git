<table class="table w750">
	<tr>
	    <th>Nr linii</th>
    	<th>Nazwa</th>
    	<th>Kierunek</th>
		<th></th>
	</tr>  

<?php  foreach ($przystanek as $przys) { ?> 

	<form action="admin_przystanek.php" method="post"> 	
		<input type="hidden" name="id_linii" value="<?php echo $przys['id_linii']?>" />
				<input type="hidden" name="id_przystanek" value="<?php echo $przys['id_przystanek']?>" />
	<tr>
		<td><?php echo $przys['nazwa_linii'] ?></td>
		<td><?php echo $przys['nazwa'] ?></td>
		<td><?php echo $przys['kierunek'] ?></td>


		<td>
			<input type="submit" name="zmien_odjazd" value="Zmień" class="btn"/>
			<input onclick="return confirm('Czy napewno chcesz usunąć odjazdy ?');" 
				   type="submit" name="usun_odjazd" value="Usuń" class="btn"/>
		</td>
	</tr>

	</form>
<?php } ?>

</table>

