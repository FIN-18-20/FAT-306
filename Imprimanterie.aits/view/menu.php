
<div class="container">

	<h2 class="text-6xl font-bold py-8">Bienvenue à la connaissance !</h2>
	<!-- Three columns of text below the carousel col-lg-5 col-md-6 col-sm-8 col-xs-12-->
	<div class="row">
		<div class="flex flex-col">
			<div class="flex justify-center content-center">
                <a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Afficher tout</a>
                <a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Afficher par constructeur</a>
                <a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Afficher par fournisseur</a>
			</div>
			<div class="flex justify-center content-center my-4">
                <p class="text-center">Trier par: </p>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Ventes</a>
                <a href="./index.php?controller=home&action=list&table=t_nickname" class="btn btn-primary mx-4">Vitesse d'impression</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Résolution</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Constructeur</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Prix croissant</a>
                <a href="./index.php?controller=home&action=list&table=t_teacher" class="btn btn-primary mx-4">Prix décroissant</a>
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


