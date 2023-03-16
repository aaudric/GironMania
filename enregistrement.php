<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    
    <?php 

        include("bd.php");

        function enregistrer($nom, $prenom, $adresse, $telephone, $mail, $mdp) {

            // Connexion à la base de données
            $bdd = getBD();

            // Préparation de la requête d'insertion
            $requete = $bdd->prepare("INSERT INTO `clients` ( `nom`, `prenom`, `adresse`, `numero`, `mail`, `mdp`) VALUES ( '$nom', '$prenom', '$adresse', '$telephone', '$mail', '$mdp')");
            
            // Exécution de la requête avec les paramètres donnés
            $requete->execute(array('nom'=>$nom, 'prenom'=>$prenom, 'adresse'=>$adresse, 'numero'=>$telephone,'mail'=> $mail,'mdp'=> $mdp));
        }

        if ((isset($_POST['n']) and empty($_POST['n']))
        or (isset($_POST['p']) and empty($_POST['p']))
        or (isset($_POST['adr']) and empty($_POST['adr']))
        or (isset($_POST['num']) and empty($_POST['num']))
        or (isset($_POST['mail']) and empty($_POST['mail']))
        or (isset($_POST['mdp1']) and empty($_POST['mdp1']))
        or (isset($_POST['mdp2']) and empty($_POST['mdp2']))
        or($_POST['mdp1']!= $_POST['mdp2'])){
            echo '<meta http-equiv="refresh" content="0;url=nouveau.php?var1='.$_POST['n'].'&var2='.$_POST['p'].'&var3='.$_POST['adr'].'&var4='.$_POST['num'].'&var5='.$_POST['mail'].'">';
            }
        else{
            echo '<p>Vous êtes désormais  bien incrit</p>';
            enregistrer($_POST['n'], $_POST['p'], $_POST['adr'], $_POST['num'], $_POST['mail'], md5($_POST['mdp2']));
            echo '<meta http-equiv="refresh" content="0;url=index.php">';
        }

       
    ?>

    <title>Enregistrement</title>

</head>

<body>

<body>
    

</body>

</html>