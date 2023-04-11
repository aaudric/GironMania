<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

</head>

<body>

    <?php
    
    session_start();

    //stockage dans des variables de l'identifiant et le nombre d'article
    $id = $_POST['id_art'];
    $nb = $_POST['nb'];

    //vérifiaction de l'existance de la varaiable session panier
    if (!isset($_SESSION['panier'])) {

        //création d'un tableau contenant le premier article
        $art = array($id, $nb);
        //création d'un tableau contenant tous les articles du panier
        $panier = array($art);
        //stockage dans la variable session panier
        $_SESSION['panier'] = $panier;
        echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }
    else{

        //ajout d'un artcile supplémentaire dans le panier
        $art = array($id, $nb);
        array_push($_SESSION['panier'],$art);
        echo '<meta http-equiv="refresh" content="0;url=index.php">';

    }
    ?>

</body>

</html>