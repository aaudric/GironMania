<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Commande</title>
    
    <link rel="shortcut icon" type="image/png" href="images/iconeG.png" />

    <link rel="stylesheet" href="styles/StyleAcceuil.css"
	type="text/css" media="screen" />

    <?php include("bd.php");?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

                $token = rand();

                $_SESSION['token'] = $token;

                $total = 0;

                $bdd = getBD();

                foreach($_SESSION['panier'] as $art) {

                    $id = $art[0];
                    $nb = $art[1];
                    
                 // Récupération des données depuis la base de données
                    $que = "SELECT  `articles`.`nom`, `articles`.`prix` FROM `articles` WHERE `articles`.`id_art`=$id";
                    $result = $bdd->query($que);
                    $row = $result->fetch();

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

                    $result -> closeCursor();

                }
            
            ?>
            
        </table>

        <?php  
            echo "<p>Montant de votre commande : ".$total."€</p>";
            echo "<p class='large'>La commande sera expédiée à l’adresse suivante : ".$_SESSION['client']['nom']." ".$_SESSION['client']['prenom']." au ".$_SESSION['client']['adresse']."</p>";
        ?>

        <form method="post" action="paiement.php">
        
            <input type="hidden" name ='v' value=<?php echo $token; ?> >
            
            <button type="submit">Valider la commande</button>

        </form>

        <br/>

        <input type="button" name="vider" value = "Vider le panier" onclick="vider()">

        <footer>
        
            <!-- lien vers page contact-->
            <h3><a href="index.php" >Retour page d'acceuil</a></h3>

        </footer>
<body>
    
</body>

</html>

<script>

function vider(){

    var vide = "vide";

    $.ajax({
            type: 'post',
            url : 'vider.php',
            data : {vide : vide},
            //dataType : 'text',
            success : function(reponse) {
                response = reponse.trim();
                if (reponse == "Votre panier a été vidé") {
                    alert(response +", appuyez sur OK afin d'être rediriger vers l'acceuil.");
                    setTimeout(window.location.href='index.php', 1000); 
                }else{
                    alert('Désolé il y a eu une erreur lors de la suprression du panier');
                }},
            error : function(data) {
                alert("Il y a une erreur de chargement de la page.");
            }
    });

}

</script>