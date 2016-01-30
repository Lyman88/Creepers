<h3>Seznam recenzentů</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Jméno</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
			if($data['reviewers']){
			foreach($data['reviewers'] as $row){
				echo "<tr>\n";
					echo "<td>\n";
						echo "$row->name\n";
					echo "</td>\n";
					echo "<td class=\"text-right\">\n";
						echo "<a href='".DIR."admin/removeReviewer/$row->userID'>Odebrat recenzenta</a>\n";
					echo "</td>\n";
				echo "</tr>\n";
				}
			}
			?>
		</tbody>
	</table>

<h3>Seznam uživatelů</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Jméno</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
			if($data['users']){
			foreach($data['users'] as $row){
				echo "<tr>\n";
					echo "<td>\n";
						echo "$row->name\n";
					echo "</td>\n";
					echo "<td class=\"text-right\">\n";
						echo "<a href='".DIR."admin/addReviewer/$row->userID'>Přidat recenzenta</a>\n";
					echo "</td>\n";
					echo "<td class=\"text-right\">\n";
						echo "<a href='".DIR."admin/deleteUser/$row->userID'>Smazat</a>\n";
					echo "</td>\n";
				echo "</tr>\n";
				}
			}
			?>
		</tbody>
	</table>

<h3>Seznam nepřijatých příběhů</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Název</th>
				<th>Autor</th>
				<th class="text-center">Originalita</th>
				<th class="text-center">Téma</th>
				<th class="text-center">Kvalita zpracování</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
			if($data['tales']){
			foreach($data['tales'] as $row){
				echo "<tr>\n";
					echo "<td>\n";
						echo "$row->title\n";
					echo "</td>\n";
					echo "<td>\n";
						echo "$row->author\n";
					echo "</td>\n";
					echo "<td class=\"text-center\">\n";
						echo "$row->originality\n";
					echo "</td>\n";
					echo "<td class=\"text-center\">\n";
						echo "$row->theme\n";
					echo "</td>\n";
					echo "<td class=\"text-center\">\n";
						echo "$row->quality\n";
					echo "</td>\n";
					echo "<td class=\"text-right\">\n";
						echo "<a href='".DIR."tales/delete/$row->taleID'>Smazat</a>\n";
					echo "</td>\n";
					echo "<td class=\"text-right\">\n";
						echo "<a href='".DIR."admin/accept/$row->taleID'>Přijmout</a>\n";
					echo "</td>\n";
				echo "</tr>\n";
				}
			}
			?>
		</tbody>
	</table>

<h3>Seznam příběhů nepřiřazených recenzentovi</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Název</th>
				<th>Autor</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
			if($data['talesNot']){
			foreach($data['talesNot'] as $row){
				echo "<tr>\n";
					echo "<td>\n";
						echo "$row->title\n";
					echo "</td>\n";
					echo "<td>\n";
						echo "$row->author\n";
					echo "</td>\n";
					echo "<td class=\"text-right\">\n";
						echo "<a href='".DIR."admin/setToReview/$row->taleID'>Přiřadit</a>\n";
					echo "</td>\n";
				echo "</tr>\n";
				}
			}
			?>
		</tbody>
	</table>