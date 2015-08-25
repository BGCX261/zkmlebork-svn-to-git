<h3>Administracja legendami</h3>
<?php echo $MSG ?>
<div class="form">
    <form name="legenda" method="post" action="admin_legenda.php">
        <span class="w70">Symbol:</span>
     	<input class="inp_txt w70" type="text" value="" name="symbol_legenda" size="5"/>
        <br class="clr"/>
        <span class="w70">Opis:</span>
        <input class="inp_txt w500" name="opis_legenda" />
		<br class="clr" />
        <input type="submit" value="Dodaj" name="dodaj_legenda" class="btn" />
    </form>
</div>