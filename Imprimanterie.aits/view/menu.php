<?php

/**
 * Création de liens envoyant des données en POST
 *
 * @param [array(array())] $params tableau de tableaux associatifs avec chacun "name" et "value"
 * @param [string] $name nom du bouton
 * @return void
 */
function createLink($params, $name)
{
	echo '<form action="" method="POST">
		<button class="btn btn-primary mx-4" type="submit" name="action" value="list">' . $name . '</button>
		<!-- textboxes invisibles pour pouvoir déclencher le controller sans passer de GET -->
		<input type="text" name="controller" value="home" hidden>
		<input type="text" name="action" value="list" hidden>';

	foreach ($params as $param) {
		echo '<input type="text" name="' . $param["name"] . '" value="' . $param["value"] . '" hidden>';
	}

	echo '</form>';
}

function selectSelected($selectName, $postKey)
{
	if (isset($_POST[$postKey])) {
		if ($selectName == $_POST[$postKey]) {
			return 'selected';
		}
	}
}

?>
<div class="container">

	<h2 class="text-6xl font-bold py-8">Bienvenue à la connaissance !</h2>
	<div class="row">
		<!-- Boutons de test -->
<!-- 		<div class="flex flex-col">
			<div class="flex justify-center content-center bg-gray-300 p-4 rounded">
				<?php /* 
				createLink(array(array("name" => "table", "value" => "t_teacher")), "Tout afficher");
				createLink(array(array("name" => "table", "value" => "t_nickname")), "Afficher les fournisseurs"); */
				?>
			</div> -->
			<!-- Section consommables -->
			<div class="flex justify-center content-center my-4 bg-gray-300 p-4 rounded">
				<p class="text-center">Consommables: </p>
				<?php 
					createLink(array(array("name" => "table", "value" => "fetchConsByPrint")), "Par imprimante - prix");
					createLink(array(array("name" => "table", "value" => "fetchConsByCons")), "Par consommable");
					?>
			</div>
			<!-- Boutons simples -->
			<div class="flex justify-center content-center my-4">
				<p class="text-center">Les meilleures en: </p>
				<?php 
					createLink(array(array("name" => "table", "value" => "fetchFastest")), "Vitesse d'impression");
					createLink(array(array("name" => "table", "value" => "fetchBestResolution")), "Résolution");
					?>
			</div>
			<!-- Filtre par marque/constructeur -->
			<div class="flex justify-center content-center my-4 bg-gray-300 p-4 rounded">
			<p class="self-center mx-2">Filtrer par marque/constructeur:</p>
			<form action="#" method="POST">
				<input type="text" name="controller" value="home" hidden>
				<input type="text" name="action" value="list" hidden>
				<select name="brandNames" id="brandNames" class="border border-black border-solid rounded">
					<?php
					$db = new database();
					$tBrand = $db->fetchBrandTable();
					$db->__destruct();

					foreach ($tBrand as $row) {
						echo '<option value="' . $row["braName"] . '"' . selectSelected($row["braName"], "brandNames") . '>' . $row["braName"] . '</option>';
					}
					?>
				</select>
				<button class="btn btn-primary mx-4" type="submit" name="table" value="fetchByBrand">Par marque détaillé</button>
				<button class="btn btn-primary mx-4" type="submit" name="table" value="fetchByBrandModel">Par constructeur</button>
				<button class="btn btn-primary mx-4" type="submit" name="table" value="fetchByBrandPrice">Par constructeur et par prix</button>
			</form>
			</div>
			<!-- Filtre modulable -->
			<div class="flex justify-center content-center my-4">
				<p>Classer par:</p>
				<form action="#" method="POST">
					<select name="spec" id="spec" class="border border-solid border-black rounded mx-4">
						<option value="weight" <?= selectSelected("weight", "spec") ?>>Poids</option>
						<option value="height" <?= selectSelected("height", "spec") ?>>Taille</option>
						<option value="price" <?= selectSelected("price", "spec") ?>>Prix</option>
					</select>
					<select name="order" id="order" class="border border-solid border-black rounded mx-4">
						<option value="<" <?= selectSelected("<", "order") ?>>Croissant</option>
						<option value=">" <?= selectSelected(">", "order") ?>>Décroissant</option>
					</select>
					<input type="submit" name="sort" value="Appliquer le filtre" class="btn btn-secondary mx-4">
					<!-- Checkboxes invisibles pour pouvoir déclencher le controller sans passer de GET -->
					<input type="checkbox" name="action" id="action" value="list" checked="checked" hidden="true">
					<input type="checkbox" name="controller" id="controller" value="home" checked="checked" hidden="true">
					<input type="checkbox" name="table" id="table" value="filter" checked="checked" hidden="true">
				</form>
			</div>
		</div>
	</div>

</div>