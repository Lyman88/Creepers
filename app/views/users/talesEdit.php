<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>

	<p>Název<br><input type='text' name='title' value='<?php echo $data['tale'][0]->title;?>'></p>
	<p>Autor<br><input type='text' name='author' value='<?php echo $data['tale'][0]->author;?>'></p>
	<span class="btn btn-default btn-file">
		<p>Soubor PDF <input type='file' name='tale'></p>
	</span>

	<p><button class="btn btn-default" type="submit" name="submit">Odeslat</button></p>
</form>