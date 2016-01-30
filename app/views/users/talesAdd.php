<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>

	<p>Název<br><input type='text' name='title' value="<?php if(isset($error)){ echo $_POST['title']; }?>"></p>
	<p>Autor<br><input type='text' name='author' value="<?php if(isset($error)){ echo $_POST['author']; }?>"></p>
	<span class="btn btn-default btn-file">
		<p>Soubor PDF <input type='file' name='tale'></p>
	</span>

	<p><button class="btn btn-default" type="submit" name="submit">Přidat</button><p>
</form>