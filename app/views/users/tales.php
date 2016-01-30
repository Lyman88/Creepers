
<div class="container">
	<h3>Vaše příběhy</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Název</th>
				<th>Originalita</th>
				<th>Téma</th>
				<th>Kvalita zpracování</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
			if($data['tales']){
			foreach($data['tales'] as $row){
				echo "<tr>\n";
					echo "<td>\n";
						echo "<a href='".DIR."tales/edit/$row->taleID'>$row->title</a>\n";
					echo "</td>\n";
					echo "<td>\n";
						echo "$row->originality\n";
					echo "</td>\n";
					echo "<td>\n";
						echo "$row->theme\n";
					echo "</td>\n";
					echo "<td>\n";
						echo "$row->quality\n";
					echo "</td>\n";
					echo "<td class=\"text-right\">\n";
						echo "<a href='".DIR."tales/delete/$row->taleID'>Smazat</a>\n";
					echo "</td>\n";
					
				echo "</tr>\n";
				}
			}
			?>
		</tbody>
	</table>
	<a href="<?php echo DIR;?>tales/add" class="btn btn-default" role="button">Přidat nový příběh</a>
</div>