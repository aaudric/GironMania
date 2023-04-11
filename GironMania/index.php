<!DOCTYPE html>
<html lang="fr">

	<head>

		<!--laison avec feuille de style-->
		<link rel="stylesheet" href="styles/StyleAcceuil.css"
		type="text/css" media="screen" />
		
		<!--encodage-->
		<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8" />
		
		<!-- liaison avec bd.php-->
		<?php include("bd.php")?>

		<title>GironMania</title>

		<link rel="shortcut icon" type="image/png" href="images/iconeG.png" />
		
	</head>

	<body>

		<h1> GironMania</h1>

		<?php

		session_start();

		//vérification de l'existance de la variable session client
		if(!isset($_SESSION['client'])){

			echo '<h3><a class="new" href="nouveau.php">Nouveau Client ? Sign up</a><h3><br/>';

			echo '<h3><a class="new" id = "log" href="connexion.php">Log in</a><h3>';
		}
		else{

			echo "<p>Bonjour ".$_SESSION['client']['nom']." ".$_SESSION['client']['prenom']."</p>";

			echo '<h3><a class="new" href="panier.php">Mon panier</a><h3><br/>';
        
			echo '<h3><a class="new" href="deconnexion.php">Log out</a><h3>';

			echo '<h3><a href="historique.php">Historique des commandes</a><h3>';

		}
		?>

		<p>
			Bienvenue sur le site n°1 des ventes de jeux vidéos dématérialisé en ligne.<br/>
			<strong><em>GironMania</em></strong> vous propose d'acheter des jeux vidéos compatibles 
			sur différentes plateformes tel que :
		</p>

		<ul>
			<li>PS5</li>
			<li>Xbox One</li>
			<li>Xbox Series X et S</li>
			<li>Nintendo Switch</li>
		</ul>
		
		<p>
			Nous avons un large catalogue que nous mettons régulièrement à jour, de plus vous pouvez précommander 
			certains jeux qui seront disponible sur votre console à la date de sortie de ces derniers. 
			Nos principales ventes sont FIFA 23 et Call of duty MW2. 
			<br/><br/>Ci-dessous notre catalogue :
		<p>

		<h2>Catalogue</h2>

		<?php 

			//connection a la base de données
			$bdd =  getBD();
			
			//requête sur la bd
			$rep = $bdd->query('select * from Articles');

			echo "<table style='border: 3px solid whitesmoke;'>";

			echo "<tr>";

			echo "<th style='border:3px solid whitesmoke;'>Identifiant</th>";
			echo "<th style='border:3px solid whitesmoke;'>Nom</th>";
			echo "<th style='border:3px solid whitesmoke;'>Quantité</th>";
			echo "<th style='border:3px solid whitesmoke;'>Prix unitaire</th>";
			echo "<th style='border:3px solid whitesmoke;'>Cover</th>";

			echo "</tr>";

			while ($ligne = $rep ->fetch()) {

				echo "<tr>";

				echo "<td style='border:3px solid whitesmoke;'>".$ligne['id_art']."</td>";
				//création d'un lien contenant le paramètre de l'article en question sur le nom de l'article
				echo "<td style='border:3px solid whitesmoke;'><a href ='articles/article.php?id_art=".$ligne['id_art']."'><em><strong>" .$ligne['nom']. "</em></strong></a></td>";
				echo "<td style='border:3px solid whitesmoke;'>".$ligne['quantite']."</td>";
				echo "<td style='border:3px solid whitesmoke;'>".$ligne['prix']."€</td>";
				//création d'un lien contenant le paramètre de l'article en question sur le l'image de l'article
				echo "<td style='border:3px solid whitesmoke;'><a href ='articles/article.php?id_art=".$ligne['id_art']."'><img id='image' src='images/".$ligne['url_photo']."' alt = 'cover'></a></td>";
				
				echo "</tr>";
			}

			echo "</table>";

			$rep ->closeCursor(); 

		?>
		
		<footer>

			<!-- lien vers page contact-->
			<h2><a href="contact/contact.html">Contact</a></h2>
		
		</footer>
		
	</body>
	
</html>