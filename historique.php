<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Historique</title>

    <link rel="stylesheet" href="styles/StyleAcceuil.css"
		type="text/css" media="screen" />

</head>

<body>

    <h1> Votre historique</h1>

    <?php

    include("bd.php");

    session_start();
    // Se connecter à la base de données
    $bdd = getBD();

    // Vérifier si l'utilisateur est connecté
    if(isset($_SESSION['client'])) {

        // Récupérer l'ID du client connecté
        $client_id = $_SESSION['client']['id_client'];
        
        // requête SQL pour récupérer l'historique du client connecté en utilisant une jointure
        $hist = $bdd->query("SELECT `commandes`.`id_commande`, `articles`.`id_art`, `articles`.`nom`,`articles`.`prix`,`commandes`.`quantite`,`commandes`.`envoi` FROM `commandes` JOIN `articles`  on  `commandes`.`id_art` = `articles`.`id_art` WHERE `commandes`.`id_client`=$client_id");
        
        if ($hist->rowCount()==0){

            echo "<p>Jusqu'à présent vous n'avez rien encore commandé.</p>";
        }
        else{
            // Afficher le tableau répertoriant toutes les commandes du client connecté
            echo '<table>
                    <thead>
                    <tr>
                        <th>Id de la commande</th>
                        <th>Id de l\'article</th>
                        <th>Nom de l\'article</th>
                        <th>Prix de l\'article</th>
                        <th>Quantité commandée</th>
                        <th>Etat de la commande</th>
                    </tr>
                    </thead>
                    <tbody>';

            while ($h = $hist->fetch()){
                
                echo '<tr>
                        <td>'.$h['id_commande'].'</td>
                        <td>'.$h['id_art'].'</td>
                        <td>'.$h['nom'].'</td>
                        <td>'.$h['prix'].'€</td>
                        <td>'.$h['quantite'].'</td>';
                        if ($h['envoi']== 0){
                            echo' <td>'."En cours d'envoi".'</td>';
                        }
                        elseif (['envoi']==1){
                            echo' <td>'."Envoyée".'</td>';
                        }
                    
                    '</tr>';
            
            }
            echo '</tbody>
                    </table>';
            
            $hist ->closeCursor(); 
        
        } 
    } 
    
    ?>

    <footer>
        
        <!-- lien vers page contact-->
        <h3><a href="index.php" >Retour page d'acceuil</a></h3>

    </footer>

</body>

</html>