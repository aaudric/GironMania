<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Commande</title>
    
    <link rel="stylesheet" href="styles/StyleAcceuil.css"
	type="text/css" media="screen" />

    <?php include("bd.php");?>

</head>

    <h1>Votre Commande:</h1>


 <h3>Récapitulatif de votre commande :</h3>

        <table>

        <tr>
                <th>ID Article</th>
                <th>Nom</th>
                <th>Nombre d'articles</th>
                <th>Prix</th>
        </tr>
        
            <?php

                session_start();

                $total = 0;

                $bdd = getBD();

                foreach($_SESSION['panier'] as $art) {

                    $id = $art[0];
                    $nb = $art[1];
                    
                 // Récupération des données depuis la base de données
                    $que = "SELECT  `articles`.`nom`, `articles`.`prix` FROM `articles` WHERE `articles`.`id_art`=$id";
                    $result = $bdd->query($que);
                    $row = $result->fetch();

                 // Affichage des données dans le tableau

                 //calcul du prix en fonction du nombre d'exemplaires
                    $prix = $row['prix'] * $nb;

                    echo "<tr>";
                    echo "<td>" .$id. "</td>";
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>".$nb."</td>";
                    echo "<td>".$prix."€</td>";
                    echo "</tr>";
                    
                //prix de la commande finale 
                    $total += $prix;

                }

            
            ?>
            
        </table>

        <?php  
            echo "<p>Montant de votre commande : ".$total."€</p>";
            echo "<p class='large'>La commande sera expédiée à l’adresse suivante : ".$_SESSION['client']['nom']." ".$_SESSION['client']['prenom']." au ".$_SESSION['client']['adresse']."</p>";
        ?>

        <form method="post" action="acheter.php">
        
            <input type="submit" value="Valider">

        </form>

        <footer>
        
            <!-- lien vers page contact-->
            <h3><a href="index.php" >Retour page d'acceuil</a></h3>

        </footer>
<body>
    
</body>

</html>