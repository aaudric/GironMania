    <?php
    require("bd.php");
        $mail = $_POST['email'];

        $bdd = getBD();
        //print_r($mail);

        $checkmail = $bdd->query("SELECT * FROM clients WHERE mail = '$mail'");
        //print_r($checkmail);
        
        if ($checkmail->rowCount() > 0){
            echo true;
        }
        else{
            echo false;
        }

    ?>