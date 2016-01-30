
<div class="container">
	<h3>Přijaté příběhy</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Název</th>
			</tr>
		</thead>

		<tbody>
			<?php
			if($data['tales']){
			foreach($data['tales'] as $row){
				echo "<tr>\n";
					echo "<td>\n";
						echo "<a href='".DIR."tales/download/$row->taleID'>$row->title</a>\n";
					echo "</td>\n";
				echo "</tr>\n";
				}
			}
			?>
		</tbody>
	</table>
</div>