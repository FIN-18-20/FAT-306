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
		<input type="text" name="controller" value="home" hidden>
		<input type="text" name="action" value="list" hidden>';

	foreach ($params as $param) {
		echo '<input type="text" name="' . $param["name"] . '" value="' . $param["value"] . '" hidden>';
	}

	echo '</form>';
}

function selectSelected($braName)
{
	if (isset($_POST["brandNames"])) {
		if ($braName == $_POST["brandNames"]) {
			return 'selected';
		}
	}
}

?>
<div class="container">

	<h2 class="text-6xl font-bold py-8">Bienvenue à la connaissance !</h2>
	<!-- Three columns of text below the carousel col-lg-5 col-md-6 col-sm-8 col-xs-12-->
	<div class="row">
		<div class="flex flex-col">
			<div class="flex justify-center content-center">
				<?php
				createLink(array(array("name" => "table", "value" => "t_teacher")), "Tout afficher");
				createLink(array(array("name" => "table", "value" => "t_nickname")), "Afficher les fournisseurs");
				?>
				<!--                 <a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Afficher tout</a>
<a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Afficher par constructeur</a>
<a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Afficher par fournisseur</a> -->
			</div>
			<p>Filtrer par marque/constructeur:</p>
			<form action="#" method="POST">
				<input type="text" name="controller" value="home" hidden>
				<input type="text" name="action" value="list" hidden>
				<!-- <input type="text" name="table" value="byBrand" hidden> -->
				<select name="brandNames" id="brandNames" class="border border-black border-solid rounded mr-16">
					<?php
					$db = new database();
					$tBrand = $db->fetchBrandTable();
					$db->__destruct();

					foreach ($tBrand as $row) {
						echo '<option value="' . $row["braName"] . '"' . selectSelected($row["braName"]) . '>' . $row["braName"] . '</option>';
					}
					?>
				</select>
				<button class="btn btn-primary mx-4" type="submit" name="table" value="fetchByBrand">Par marque détaillé</button>
				<button class="btn btn-primary mx-4" type="submit" name="table" value="fetchByBrandModel">Par constructeur</button>
				<button class="btn btn-primary mx-4" type="submit" name="table" value="fetchByBrandPrice">Par constructeur et par prix</button>
			</form>
			<div class="flex justify-center content-center my-4">
				<p class="text-center">Consommables: </p>
				<?php 
					createLink(array(array("name" => "table", "value" => "fetchConsByPrint")), "Par imprimante - prix");
					createLink(array(array("name" => "table", "value" => "fetchConsByCons")), "Par consommable");
				?>
				<!--                 <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Ventes</a>
                <a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Vitesse d'impression</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Résolution</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Constructeur</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Prix croissant</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Prix décroissant</a> -->
			</div>
			<div class="flex justify-center content-center my-4">
				<p class="text-center">Les meilleures en: </p>
				<?php 
					createLink(array(array("name" => "table", "value" => "fetchFastest")), "Vitesse d'impression");
					createLink(array(array("name" => "table", "value" => "fetchBestResolution")), "Résolution");
				?>
				<!--                 <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Ventes</a>
                <a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Vitesse d'impression</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Résolution</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Constructeur</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Prix croissant</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Prix décroissant</a> -->
			</div>
			<div class="flex justify-center content-center my-4">
				<p>Classer par:</p>
				<form action="#" method="GET">
					<select name="spec" id="spec" class="border border-solid border-black rounded mx-4">
						<option value="weight">Poids</option>
						<option value="height">Taille</option>
					</select>
					<select name="order" id="order" class="border border-solid border-black rounded mx-4">
						<option value="<">Croissant</option>
						<option value=">">Décroissant</option>
					</select>
					<input type="submit" name="sort" value="Appliquer le filtre" class="btn btn-secondary mx-4">
					<input type="checkbox" name="action" id="action" value="list" checked="checked" hidden="true">
					<input type="checkbox" name="controller" id="controller" value="home" checked="checked" hidden="true">
				</form>
			</div>
		</div>
	</div>

</div>