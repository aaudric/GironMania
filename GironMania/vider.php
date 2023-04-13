<?php
$vide = "";

if (isset($_POST['vide']) and !empty($_POST['vide']) and $_POST['vide'] == 'vide') {

    session_start();
    unset ($_SESSION['panier']);
    $vider = "Votre panier a été vidé";
    
}
else {
    $vider = "Problème avec le panier, il est vide ou il n'existe pas.";
}

echo $vider;
?>