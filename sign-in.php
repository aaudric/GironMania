<?php
    include("bd.php");
    

    if ((isset($_POST['email']) and !empty($_POST['email'])) and (isset($_POST['mdp1']) and !empty($_POST['mdp1']))){
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
    }
    else{
        $reponse = "parametre";
    }
    

    echo $reponse;

?>