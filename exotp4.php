<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
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
 $requete = "SELECT livre.titre, auteur.nom, auteur.prenom, livre.annee, livre.isbn, livre.resume, illustration.id, lecteur.nom AS nom_lecteur, lecteur.prenom AS prenom_lecteur, livre.date_emprunt FROM livre LEFT JOIN lecteur ON livre.lecteur_id = lecteur.id INNER JOIN auteur ON livre.auteur_id = auteur.id INNER JOIN illustration ON livre.illustration_id = illustration.id"; 


 echo "<h1>Ma bibliothèque</h1>";

$resultat = mysqli_query($connexionBdd, $requete);
 while ($ligne_resultat = mysqli_fetch_assoc($resultat))
 {
    $titre = $ligne_resultat['titre'];
    $annee = $ligne_resultat['annee'];
    $nom_auteur = $ligne_resultat['nom'];
    $prenom_auteur = $ligne_resultat['prenom'];
    $resume = $ligne_resultat['resume'];
    $isbn = $ligne_resultat['isbn'];
    $illustration = $ligne_resultat['id'];
    $nom_lecteur = $ligne_resultat['nom_lecteur'];
    $prenom_lecteur = $ligne_resultat['prenom_lecteur'];
    $date_emprunt = $ligne_resultat['date_emprunt'];
    $compteur = $ligne_resultat;

    echo "<section>"
    . "<span><strong>"
    . "<div class=\"titre\">"
     . $titre 
     . "</strong></span>" 
     . " "
     . $nom_auteur 
     . " "
     . $prenom_auteur 
     . "<br />" 
     . "publié en " 
     . $annee 
     . "<br />" 
     . $isbn
     . "</div>"
     . "<br />"
     . "<br />"
     . "<p>"
     . $resume
     . "</p>"
     . "<div class=\"image\">"
     . "<img src=\"couvertures/" . $illustration . ".jpg\">"
     . "</div>"
     . "<br />";

     if (empty($date_emprunt)) {
        echo "<p class=\"dispo\">Disponible</p>";
     } else {
        echo "<p class=\"pasdispo\">Emprunté par "
        . $nom_lecteur
        . " "
        . $prenom_lecteur
        . "</p>";
     }

     echo "</section>";


 }
 /* (5) Fermeture de la connexion au serveur MySQL */
 mysqli_close($connexionBdd);
?>




<div><h1><?= $titre; ?></h1></div>
<p><?= $resume; ?></p>


<span>
</body>
</html>