<!DOCTYPE html>
<html lang="fr">
    
<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="styles/StyleAcceuil.css"
	type="text/css" media="screen" />

    <title>Sign in</title>

</head>

<body>

    <h1>Sign in</h1>


    <h3><a href="nouveau.php">Nouveau Client ? Sign up</a><h3>

    <form action="connecter.php" method="post" autocomplete="off">

        <p> Adresse e-mail : <INPUT type="text" name="mail" value=""></p>

        <p> Mot de passe : <INPUT type="password" name="mdp" value=""></p>
    
        <p><input type="submit" value="Se connecter"></p>

        
    </from>

</body>

</html>