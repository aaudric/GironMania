<!DOCTYPE html>
<html lang="fr">
    
<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="styles/StyleAcceuil.css"
	type="text/css" media="screen" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Sign in</title>

</head>

<body>

    <h1>Sign in</h1>


    <h3><a href="nouveau.php">Nouveau Client ? Sign up</a><h3>

    <form id ="connect">

        <p> Adresse e-mail : <INPUT type="text" name="mail" id="mail" value=""></p>
        <span id="mail-error"></span>

        <p> Mot de passe : <INPUT type="password" name="mdp" id = "mdp" value=""></p>
        <span id="mdp-error"></span>
    
        <p><input type="button" value="Se connecter" id = "btn" onclick="connecter()"></p>
          
    </form>

</body>

</html>

<script>

$(document).ready(function() {

    $('#connect').on('keyup', function(e){

        var mail = $('#mail').val();
        var mdp = $('#mdp').val();
        var btn = $('#submit-btn'); 
        var result = true;

        function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
        }

        // Fonction de validation du mot de passe
        function validatePassword(password) {
        var re = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
        return re.test(password);
        }

        if (mail =="") {
            $('#mail-error').text('L\'email est requis').css('color','red','bold');
            $('#mail').css('border-color', 'red');
            result = false;
        } else if (!validateEmail(mail)) {
            $('#mail-error').text('Mauvais format d\'email').css('color','red','bold');
            $('#mail').css('border-color', 'red');
            result = false;
        } else {
            $.ajax({
            type: 'post',
            url : 'createcompte.php',
            data : {but: 'vérif', email: mail },
            dataType : 'text',
            success : function(output) {
                output = output.trim();
                console.log(output);
                if (output == true){
                    $('#mail-error').text('Cet email est correct');
                    $('#mail-error').css('color','green','bold');
                    $('#mail').css('border-color', 'green');
                    $('mail').removeClass('invalid').addClass('valid');
                    btn.attr('disabled', false);
                }else{
                    $('#mail-error').hide();
                    $('#mail').css('border-color', 'red');
                    btn.attr('disabled', true);
                }
            },
            error : function(data) {
                alert("Il y a une erreur de chargement de la page.");
            }
            });
            
        }

        if (mdp =="") {
            $('#mdp-error').text('Le mot de passe est requis').css('color','red','bold');
            $('#mdp').css('border-color', 'red');
            result = false;
        } else if (!validatePassword(mdp)) {
            $('#mdp-error').text('Mauvais format de mot de passe').css('color','red','bold');
            $('#mdp').css('border-color', 'red');
            result = false;
        } else {
            $('#mdp-error').hide();
            $('#mdp').css('border-color', 'green');
        }

        if (!result) {
            btn.attr('disabled', true);
        }
        else if ( result == true ) {
            btn.attr('disabled', false);
        }
    })

})

    function connecter(){

        var email = $('#mail').val();
        var mdp1 = $('#mdp').val();
        
        $.ajax({
            type: 'post',
            url : 'sign-in.php',
            data : { email : email, mdp1 :  mdp1},
            dataType : 'text',
            success : function(reponse) {
                response = reponse.trim();
                if (response=="connect") {
                    var message = alert('Connection réussie avec succès');
                    setTimeout(window.location.href='index.php', 1000);
                }else if (response = "Mauvais format d'email ou de mot de passe"){
                    alert(response);
                }
                else if (response = "parametre"){
                    alert('Il manque un ou plusieurs paramètres.');
                }
            },
            error : function(data) {
                alert("Il y a une erreur de chargement de la page.");
            }
        });
    }


</script>