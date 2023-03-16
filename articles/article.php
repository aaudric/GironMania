<!DOCTYPE html>
<html lang = "fr">

    <head>
		
        <!--laison avec feuille de style-->
		<link rel="stylesheet" href="../styles/StyleAcceuil.css"
		type="text/css" media="screen" />
		
        <!--encodage-->
		<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8" />

        <!-- liaison avec bd.php-->
		<?php include("../bd.php")?>

        <title>Article</title>

    </head>

    <body>

        <?php

            //récupération du paramètre
            $aa = $_GET['id_art'];

            //connection avec la bdd avec la fonction getBD
            $bdd = getBD();

            //requete sur la bd avec le paramètre récupéré
            $rep = $bdd->query("select * from Articles where id_art= $aa ");

            while ($ligne = $rep ->fetch()){

                echo "<h1>".$ligne['nom']."</h1>";
		
                //insertion image
		        echo "<img class ='img'src=".$ligne['url_photo']." alt = 'cover'>";
		
		        //création d'un bouton
		        echo "<a class='button' href =''><strong>Acheter</strong></a>";
                
                echo $ligne['description'];
            }

            $rep ->closeCursor(); 

            session_start();

            //vérification de l'existance de la variable session client
            if (isset($_SESSION['client'])){
            
                echo '<form action="../ajouter.php" method="post" autocomplete="off">';

                    echo '<p><input type="hidden" name="id_art" value='.$_GET['id_art'].'></p>';

                    echo "<p> Nombre d'article : <input type='number' name='nb' min='1' value='1'></p>";

                    echo '<p><input type="submit" value="Ajouter à votre panier"></p>';
                    
                echo '</form>';
            }
            else{
                echo '<p class = "large" id = "art">Pour pouvoir ajouter un article à votre panier, vous devez être connecter.</p>';
            }
            
            ?>
            
		<!--lien vers index.php-->
		<h3><a href="../index.php" >Retour page d'acceuil</a></h3>

	</body>

</html>