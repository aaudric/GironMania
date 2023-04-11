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
    

    if ((isset($_POST['email']) and !empty($_POST['email'])) and (isset($_POST['mdp1']) and !empty($_POST['mdp1']))){

        if(validateEmailFormat($_POST['email']) and validatePassword($_POST['mdp1'])){

            $bdd=getBD();

            $client = $_POST['email'];

            $mdp = md5($_POST['mdp1']);

            $reponse = "";
                    
            $qu = $bdd->query("select * from clients where clients.mail= '".$client."' and clients.mdp = '".$mdp."'");

            session_start();

            if ($qu->rowCount()==1){
                
                $ligne = $qu->fetch();

                $_SESSION['client']=$ligne;

                $reponse = "connect";
            }
            else{
                $reponse = "error";
            }
            
            $qu ->closeCursor();

        }else{

            $reponse = "Mauvais format d'email ou de mot de passe";

        }
    }
    else{

        $reponse = "erreur de parametre";

    }

    echo $reponse;

?>