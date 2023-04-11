<?php
    
    include("bd.php");

    if(isset($_POST['but']) && $_POST['but']='vérif'){
        vérifmail();
    }

    function vérifmail(){

        $mail = $_POST['email'];

        $bdd = getBD();

        $checkmail = $bdd->query("SELECT * FROM clients WHERE mail = '$mail'");
        
        if ($checkmail->rowCount() > 0){
            echo true;
        }
        else{
            echo false;
        }

        $checkmail -> closeCursor();

    }

?>