<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Acheter</title>

    <link rel="shortcut icon" type="image/png" href="images/iconeG.png" />

    <link rel="stylesheet" href="styles/StyleAcceuil.css"
	type="text/css" media="screen" />

</head>

<body>

    <br/>
    <br/>

    


    <?php

        session_start();
        
        include("bd.php");
        
        $bdd= getBD();

        if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])){

            // Boucle pour chaque article du panier
            foreach($_SESSION['panier'] as $article) {

                // Récupérer les informations de l'article
                $id_art = $article[0];
                $id_client = $_SESSION['client']['id_client'];
                $quantite = $article[1];

                // Insérer l'article dans la table Commandes
                $q = $bdd -> prepare("INSERT INTO `commandes` (`id_art`, `id_client`, `quantite`, `envoi`) VALUES ($id_art, $id_client, $quantite, '0')");
                
                $q->execute(array('id_art'=>$id_art, 'id_client'=>$id_client, 'quantite'=>$quantite, 'envoi'=>0));

                // Mettre à jour la quantité en stock de l'article
                $upd = $bdd -> prepare("UPDATE Articles SET quantite = quantite - $quantite WHERE `articles`.`id_art` = $id_art");

                $update = $upd ->execute();

            }

            echo '<h2 class ="achat">Félicitations</h2>'; 

            echo "<p class ='large'> Votre achat a été effectué avec succès et votre commande a bien été enregistrée.</p>";

            // Supprime la variable de session contenant le panier
            unset($_SESSION['panier']);
            
        }else{

            echo "<h2 class ='achat'>Désolé</h2>
            <p class ='large'>Votre panier est vide, il y a surement eu une erreur, veuillez réesayer.</p>";  
        }
    ?>

    <footer>
        
        <!-- lien vers page contact-->
        <h3><a href="index.php" >Retour page d'acceuil</a></h3>

    </footer>
<body>
    
</body>

</html>