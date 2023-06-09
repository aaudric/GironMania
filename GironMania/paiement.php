<?php
    require_once("bd.php");
    require_once('../vendor/autoload.php');
    require_once('stripe.php');
    session_start();
    
    
    // Vérification de la méthode HTTP et d'attaque post
    if ($_SERVER['REQUEST_METHOD'] != 'POST' || (isset($_SESSION['panier']) and empty($_SESSION['panier'])) || !isset($_SESSION['panier']) || !isset($_POST['v']) || (isset($_POST['v']) and empty($_POST['v'])) || (isset($_SESSION['token']) and empty($_SESSION['token']))|| !isset($_SESSION['token']) ||isset($_SESSION['token']) and isset($_POST['v']) and $_SESSION['token']!=$_POST['v']){
        echo 'Invalid request';
        exit;
    }
    else if (isset($_SESSION['token']) and !empty($_SESSION['token']) and $_SESSION['token'] == $_POST['v']) {
    
        $bdd = getBD();
        \Stripe\Stripe::setApiKey($stripeSecretKey);

        $TOTO = array();

        foreach($_SESSION['panier'] as $art) {

            $id = $art[0];
            $nb = $art[1];

            $quer = "SELECT  `articles`.`ID_PRICE` FROM `articles` WHERE `articles`.`id_art`=$id";
            $resultat = $bdd->query($quer); 
            $rows = $resultat->fetch();

            // Ajout de l'article dans la liste des produits Stripe
            $TOTO[] = array(
                'price' => $rows['ID_PRICE'], 
                'quantity' => $nb);
        }

        $resultat -> closeCursor();

        $Domain = "http://localhost/Girondin/GironMania/";

        // Création de la session Stripe de paiement
        $checkout_session = \Stripe\Checkout\Session::create([
            'customer' => $_SESSION['client']['ID_STRIPE'],
            'success_url' => ''.$Domain.'acheter.php',
            'cancel_url' => ''.$Domain.'cancel.html',
            'mode' => 'payment',
            'billing_address_collection' => 'required',
            'shipping_address_collection' => [
              'allowed_countries' => ['US', 'FR']],
            'automatic_tax' => ['enabled' => false],
            'line_items' => $TOTO,
        ]);

        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
    }

?>