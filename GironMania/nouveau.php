<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/StyleAcceuil.css"
	type="text/css" media="screen" />

    <title>Inscription</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

    <h1>Sign up</h1>

    <p>
        Bienvenue sur <strong><em>GironMania</em></strong>
        <br/><br/>
        Créer un compte vous permet d'acheter des jeux, de les précommander mais aussi d'être avertir sur 
        les dernières sorties et celles à venir.
        <br/>
    </p>

    
    <form id = "mon-formulaire" >
        
            <p> Nom : <INPUT type="text" id = "n" name="n" value=""></p>
            <span id="n-error"></span>
        
            <p> Prénom : <INPUT type="text" id = "p" name="p" value=""></p>
            <span id="p-error"></span>

            <p> Adresse : <INPUT type="text" id = "adr" name="adr" value=""></p>
            <span id="adr-error"></span>
       
            <p> Numéro de téléphone : <INPUT type="number" id = "num" name="num" value=""></p>
            <span id="num-error"></span>
        
            <p> Adresse e-mail : <INPUT type="text" id = "email" name="mail" value=""></p>
            <span id="email-error"></span>
        
            <p>Mot de passe : <INPUT type="password" id = "mdp1" name="mdp1" value="" ></p>
            <span id="mdp1-error"></span>

            <p>Confirmer votre mot de passe : <INPUT type="password" id = "mdp2" name="mdp2" value="" ></p>
            <span id="mdp2-error"></span>

            <p><input type="button" id = "submit-btn" value="S'inscrire" onclick="create()" ></p>

    </form>
        
    <footer>
        
        <!-- lien vers page contact-->
        <h3><a href="index.php" >Retour page d'acceuil</a></h3>

    </footer>
    
</body>
</html>
<script>
    $(document).ready(function() {

    $('#mon-formulaire').on('keyup', function(e){
        var name = $("#n").val();
        var prenom = $("#p").val();
        var adresse = $("#adr").val();
        var num = $("#num").val();
        var email = $('#email').val();
        var password = $('#mdp1').val();
        var confirmPassword = $('#mdp2').val();
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

        function validateNumber(num){
            var re = /^0[1-7]\d{8}$/;
            return re.test(num);
        }

        if(name == ""){
            $('#n-error').text('Le nom est requis').css('color', 'red','bold');
            $('#n').css('border-color', 'red');
            result = false;
        }
        else{
            $('#n-error').hide();
            $('#n').css('border-color','green');
        }

        if ((prenom=="")){
            $('#p-error').text('Le prénom est requis').css('color', 'red','bold');
            $('#p').css('border-color','red');
            result = false;
        }else{
            $('#p-error').hide();
            $('#p').css('border-color','green');
        }

        if ((adresse=="")){
            $('#adr-error').text('L\'adresse est requise').css('color','red','bold');
            $('#adr').css('border-color','red');
        }else{
            $('#adr-error').hide();
            $('#adr').css('border-color','green');
        }

        if((num =="")){
            $('#num-error').text('Le numéro de téléphone est requis').css('color','red','bold');
            $('#num').css('border-color','red');
        }
        else if(!validateNumber(num)){
            $('#num-error').text('Mauvais format de numéro de téléphone').css('color','red','bold');
            $('#num').css('border-color','red');
        }
        else{
            $('#num-error').hide(); 
            $('#num').css('border-color','green');
        }

        // Vérification de l'email
        if (email =="") {
            $('#email-error').text('L\'email est requis').css('color','red','bold');
            $('#email').css('border-color', 'red');
            result = false;
        } else if (!validateEmail(email)) {
            $('#email-error').text('Mauvais format d\'email').css('color','red','bold');
            $('#email').css('border-color', 'red');
            result = false;
        } else {
            $.ajax({
            type: 'post',
            url : 'createcompte.php',
            data : {but : 'vérif', email: email },
            dataType : 'text',
            success : function(output) {
                output = output.trim();
                if (output == true){
                    $('#email-error').text('Cet email existe déja');
                    $('#email-error').css('color','red','bold');
                    $('#email').css('border-color', 'red');
                    $('email').removeClass('valid').addClass('invalid');
                    btn.attr('disabled', true);
                }else{
                    $('#email-error').hide();
                    $('#email').css('border-color', 'green');
                }
            },
            error : function(data) {
                alert("Il y a une erreur de chargement de la page.");
            }
            });
            
        }

        // Vérification du mot de passe
        if (password =="") {
            $('#mdp1-error').text('Le mot de passe est requis').css('color','red','bold');
            $('#mdp1').css('border-color', 'red');
            result = false;
        } else if (!validatePassword(password)) {
            $('#mdp1-error').text('Mauvais format de mot de passe').css('color','red','bold');
            $('#mdp1').css('border-color', 'red');
            result = false;
        } else {
            $('#mdp1-error').hide();
            $('#mdp1').css('border-color', 'green');
        }

        // Vérification de la confirmation du mot de passe
        if (confirmPassword =="") {
            $('#mdp2-error').text('Confirmation du mot de passe requise').css('color','red','bold');
            $('#mdp2').css('border-color', 'red');
            result = false;
        } else if (password !== confirmPassword) {
            $('#mdp2-error').text('Les mots de passe sont differents').css('color','red','bold');
            $('#mdp2').css('border-color', 'red');
            result = false;
        }
        else{
            $('#mdp2-error').hide();
            $('#mdp2').css('border-color', 'green');
        }

        if (!result) {
            btn.attr('disabled', true);
        }
        else if ( result == true ) {
            btn.attr('disabled', false);
        }
    })
    
    });

    function create(){
        var name = $("#n").val();
        var prenom = $("#p").val();
        var adresse = $("#adr").val();
        var num = $("#num").val();
        var email = $('#email').val();
        var mdp1 = $('#mdp1').val();
        var mdp2 = $('#mdp2').val();

        $.ajax({
            type: 'post',
            url : 'sign-up.php',
            data : {n : name, p : prenom, adr : adresse, num : num, email : email, mdp1 :  mdp1, mdp2 : mdp2},
            //dataType : 'text',
            success : function(reponse) {
                response = reponse.trim();
                if (reponse == "ok") {
                    alert("Votre compte est en cours de création, appuyez sur OK afin d'être rediriger vers l'acceuil.")
                    setTimeout(window.location.href='index.php', 1000);
                }else{
                    alert('Désolé il y a eu une erreur lors de votre inscription');
                }},
            error : function(data) {
                alert("Il y a une erreur de chargement de la page.");
            }
        });
    }

</script>