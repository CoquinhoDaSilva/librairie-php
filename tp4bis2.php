<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8"/>
        <title>Script PHP traitant les valeurs saisies dans le formulaire</title>
        <link rel="stylesheet" href="assets/css/custom.css"/>
    </head>
    <body>
        <?php

            $erreurs = [];

            if (empty($_POST['email'])) {

                $erreurs[] = "email";

            } if (empty($_POST['password'])) {

                $erreurs[] = "password";

            } if (count($erreurs) >0) {

                echo "Erreur(s) sur le(s) champs : ";
                foreach ($erreurs as $err) {
                    echo $err. " ";
                }

            } 
            
            
           
            

        ?>

        <p class="text-center">
            <a href="tp4bis.php" title="Retour à la page d'accueil">Retour à la page d'accueil</a>
        </p>
    </body>
</html>