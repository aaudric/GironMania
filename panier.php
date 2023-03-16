<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--laison avec feuille de style-->
	<link rel="stylesheet" href="styles/StyleAcceuil.css"
	type="text/css" media="screen" />

    <title>Panier</title>

</head>

<body>
    
    <h1> Votre Panier</h1>

    <?php

        session_start();

        include("bd.php");

        //vérification de l'existance de la variable $_SESSION['panier']
        if (isset($_SESSION['panier']) and empty($_SESSION['panier'])) {
            echo "<p>Votre panier ne contient aucun article</p>";
        }
        elseif(!isset($_SESSION['panier'])) {
            echo "<p>Votre panier est vide</p>";
        }
        elseif (isset($_SESSION['panier'])) {

    ?>
    <p>Actuellement votre panier contient :</p>

        <table>

            <tr>
                <th>ID Article</th>
                <th>Nom</th>
                <th>Prix unitaire</th>
                <th>Nombre d'articles</th>
                <th>Prix total</th>
            </tr>
        
            <?php

                $total = 0;

                $bdd = getBD();

                foreach($_SESSION['panier'] as $art) {

                    $id = $art[0];
                    $nb = $art[1];
                    
                 // Récupération des données depuis la base de données
                    $que = "SELECT `articles`.`nom`, `articles`.`prix` FROM `articles` WHERE `articles`.`id_art`=$id";
                    $result = $bdd->query($que);
                    $row = $result->fetch();

                 // Affichage des données dans le tableau

                 //calcul du prix en fonction du nombre d'exemplaires
                    $prix = $row['prix'] * $nb;


                    echo "<tr>";
                    echo "<td>" .$id. "</td>";
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>" . $row["prix"] . "€</td>";
                    echo "<td>".$nb."</td>";
                    echo "<td>".$prix."€</td>";
                    echo "</tr>";
                    
                //prix de la commande finale 
                    $total += $prix;

                }

                echo "<tr>";
                echo "<th colspan ='4'>Total de la commande : </th>";
                echo "<td>". $total. "€</td>";
                echo "</tr>";

            }

            ?>
            
        </table>

        <?php

        // Vérifier si le panier contient au moins un article
        if (!empty($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
            // Afficher le lien "Passer la commande"
            echo '<h3><a href="commande.php">Passer la commande</a></h3>';
        }

        ?>

    <footer>
        
        <!-- lien vers page contact-->
        <h3><a href="index.php" >Retour page d'acceuil</a></h3>

    </footer>

</body>

</html>