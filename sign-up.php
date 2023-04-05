<?php

include("bd.php");

function validateEmailFormat($email) {
    $verif = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $verif = false;
    }

    $parts = explode('@', $email);
    $domain = array_pop($parts);
    if (!checkdnsrr($domain, 'MX')) {
      $verif = false;
    }
    
    return $verif;
}

function validatePassword($password) {
    $mdp = true;

    if (!preg_match('/^(?=.*[a-z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,}$/', $password)) {
        $mdp = false;
    }
    
    return $mdp;
}

function enregistrer($nom, $prenom, $adresse, $telephone, $mail, $mdp) {

    $bdd = getBD();

    $requete = $bdd->prepare("INSERT INTO `clients` ( `nom`, `prenom`, `adresse`, `numero`, `mail`, `mdp`) VALUES ( '$nom', '$prenom', '$adresse', '$telephone', '$mail', '$mdp')");
    
    $requete->execute(array('nom'=>$nom, 'prenom'=>$prenom, 'adresse'=>$adresse, 'numero'=>$telephone,'mail'=> $mail,'mdp'=> $mdp));
}

    $retour ="retour";

    if ((isset($_POST['n']) and !empty($_POST['n']))
    and (isset($_POST['p']) and !empty($_POST['p']))
    and (isset($_POST['adr']) and !empty($_POST['adr']))
    and (isset($_POST['num']) and !empty($_POST['num']))
    and (isset($_POST['email']) and !empty($_POST['email']))
    and (isset($_POST['mdp1']) and !empty($_POST['mdp1']))
    and (isset($_POST['mdp2']) and !empty($_POST['mdp2']))
    and($_POST['mdp1'] == $_POST['mdp2'])){
        
        if(validateEmailFormat($_POST['email']) and validatePassword($_POST['mdp1'])){

            $mail = $_POST['email'];
            
            $bdd = getBD();

            $checkmail = $bdd->query("SELECT * FROM clients WHERE mail = '$mail'");
            
            if ($checkmail->rowCount() > 0){
                $retour = "email déja existant";
            }
            else{
                enregistrer($_POST['n'], $_POST['p'], $_POST['adr'], $_POST['num'], $_POST['email'], md5($_POST['mdp2']));

                $email = $_POST['email'];

                $bdd = getBD();

                $qu = $bdd->query("select * from clients where clients.mail= '".$email."' ");

                if ($qu->rowCount() == 1){

                    session_start();

                    $co = $qu->fetch();

                    $_SESSION['client'] = $co;

                    $retour = "ok";

                }else{
                    $retour = "error";
                }

                $qu ->closeCursor();
            } 

            $checkmail -> closeCursor();

        }else{
            $retour = "L'email ou le mot de passe n'est pas valide.";
        }

    }else{
        $retour = "Désolé mais il manque un ou plusieurs paramètres.";
    }

    echo $retour;


?>