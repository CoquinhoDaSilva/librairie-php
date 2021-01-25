<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <?php
    /* (1) Connexion au serveur MySQL (les "???" sont à compléter)
    * Paramètre(s) de la fonction : nom/adresse du serveur,
    * identifiant, mot de passe
    */
    $connexionBdd = mysqli_connect("localhost", "root", "");
    /* Optionnel : permet d'éviter les problèmes d'affichage de
    * certains caractères accentués
    */
    mysqli_set_charset($connexionBdd, "utf8");
    /* (2) Sélection de la base (le "???" est à compléter)
    * Paramètre(s) de la fonction : nom de la base, connexion
    */
    $selectionBdd = mysqli_select_db($connexionBdd, "bibliotheque");
    /* Création d'une requête MySQL sous la forme d'une chaîne de
    * caractères PHP
    */
    $requete = "SELECT utilisateur.email, utilisateur.password, utilisateur.nom FROM utilisateur";
    /* (3) Envoi de la requête de puis le script actuel vers la base
    * de données, et récupération du résultat de la requête
    */
    $resultat = mysqli_query($connexionBdd, $requete);
    /* (4) Traitement et affichage du/des résultat(s) */
    while ($ligne_resultat = mysqli_fetch_assoc($resultat)){

    
    $email = $ligne_resultat['email'];
    $password = $ligne_resultat['password'];
    $nom = $ligne_resultat['nom'];
    }
    /* (5) Fermeture de la connexion au serveur MySQL */
    mysqli_close($connexionBdd);
    ?>


    <form  class="container" action="tp4bis2.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
    
</body>
</html>