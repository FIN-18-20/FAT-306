<div class="container">

<h2 class="text-6xl font-bold my-4">Tri par ventes</h2>
	<div class="row">
		<table class=" table table-striped">
        <?php
            // Affichage de chaque client
            
            //récupération et affichage des noms de colonnes
            $columnNames = array_keys($table[0]);

            echo '<tr>';
            foreach($columnNames as $colName){
                echo '<th>' . $colName . '</th>';
            }
            echo '</tr>';

            //Affichage des données
			foreach ($table as $row) {

				echo '<tr>';
                foreach($columnNames as $colName){
                    echo '<td>' . htmlspecialchars($row[$colName]) . '</td>';
                }
				echo '</tr>';
			}
		?>
		</table>
	</div>


</div>