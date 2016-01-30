<h3>Příběh: <?php echo $data['tale'][0]->title ?></h3>
<h4>Autor: <?php echo $data['tale'][0]->author ?></h4>

<form method='post'>
	<label >Recenzent</label>
	<select name="reviewerID">
		<?php 
		if ($data['reviewers']) {
			foreach ($data['reviewers'] as $row) {
				echo "<option ";
				echo "value=\"$row->userID\">$row->name";
				echo "</option>";
			} 
		}
		?>
	</select>
	<button class="btn btn-default" type="submit" name="submit">Přiřadit</button> 
</form>


