<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/StyleAcceuil.css"
	type="text/css" media="screen" />

    <title>Inscription</title>

</head>

<body>

    <h1>Sign up</h1>

    <p>
        Bienvenue sur <strong><em>GironMania</em></strong>
        <br/><br/>
        Créer un compte vous permet d'acheter des jeux, de les précommander mais aussi d'être avertir sur 
        les dernières sorties et celles à venir.
        <br/>
    </p>

    
    <form  action="enregistrement.php" method="post" autocomplete="off">
        
        <?php
        
        if(!isset($_GET['var1'])){
            echo '<p> Nom : <INPUT type="text" name="n" value=""></p>';
            }
        elseif(isset($_GET['var1'])){
            echo '<p> Nom : <INPUT type="text" name="n" value='.$_GET['var1'].'></p>';
            }
        if(!isset($_GET['var2'])){
            echo '<p> Prénom : <INPUT type="text" name="p" value=""></p>';
            }
        elseif(isset($_GET['var2'])){
                echo '<p> Prénom : <INPUT type="text" name="p" value='.$_GET['var2'].'></p>';
            }
        if(!isset($_GET['var3'])){
                echo '<p> Adresse : <INPUT type="text" name="adr" value=""></p>';
            }
        elseif (isset($_GET['var3'])){
                echo '<p> Adresse : <INPUT type="text" name="adr" value='.$_GET['var3'].'></p>';
            }
        if(!isset($_GET['var4'])){
                echo '<p> Numéro de téléphone : <INPUT type="number" name="num" value=""></p>';
            }
        elseif(isset($_GET['var4'])){
                echo '<p> Numéro de téléphone : <INPUT type="number" name="num" value='.$_GET['var4'].'></p>';
            }
        if(!isset($_GET['var5'])){
                echo '<p> Adresse e-mail : <INPUT type="text" name="mail" value=""></p>';
            }
        elseif(isset($_GET['var5'])){
                echo '<p> Adresse e-mail : <INPUT type="text" name="mail" value='.$_GET['var5'].'></p>';
            }
        
            echo '<p>Mot de passe : <INPUT type="password" name="mdp1" value="" ></p>';
            echo '<p>Confirmer votre mot de passe : <INPUT type="password" name="mdp2" value="" ></p>';
            echo '<p><input type="submit" value="Envoyer"></p>';
        
        ?>
    </form>
        
    <footer>
        
        <!-- lien vers page contact-->
        <h3><a href="index.php" >Retour page d'acceuil</a></h3>

    </footer>
    
</body>
</html>