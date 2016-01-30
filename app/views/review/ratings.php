<h3>Seznam příběhů k recenzi</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Název</th>
				<th>Originalita</th>
				<th>Téma</th>
				<th>Kvalita zpracování</th>
			</tr>
		</thead>

		<tbody>
			<?php
			if($data['ratings']){
			foreach($data['ratings'] as $row){
				echo "<tr>\n";
					echo "<td>\n";
						echo "<a href='".DIR."ratings/edit/$row->ratingID'>$row->title</a>\n";
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

				echo "</tr>\n";
				}
			}
			?>
		</tbody>
	</table>