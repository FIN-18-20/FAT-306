<div class="container">

	<div class="row">
		<table class=" table">
        <?php
        
            //récupération et affichage des noms de colonnes
            $columnNames = array_keys($table[0]);

            echo '<tr>';
            foreach($columnNames as $colName){
                echo '<th>' . $colName . '</th>';
            }
            echo '</tr>';

            //Affichage des données
			foreach ($table as $row) {

				echo '<tr class="hover:bg-gray-300">';
                foreach($columnNames as $colName){
                    echo '<td>' . htmlspecialchars($row[$colName]) . '</td>';
                }
				echo '</tr>';
			}
		?>
		</table>
	</div>


</div>