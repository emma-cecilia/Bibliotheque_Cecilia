<?php

// Connexion à la base de données
$bdd = new mysqli('localhost', 'root', '', 'biblioBoukaka');

// Vérifier la connexion
if ($bdd->connect_errno) {
    echo "Pas de connexion à MySQL: " . $bdd->connect_error;
    exit();
}

// Récupération des données du formulaire
$titre = htmlspecialchars($_POST['titre']);//Cette ligne sert à récupérer la valeur de l’attribut titre envoyée par la méthode POST d’un formulaire. 
//La fonction htmlspecialchars() est utilisée pour convertir les caractères spéciaux en entités HTML, éviter les espaces

$auteur = htmlspecialchars($_POST['auteur']);
$anneePub = intval($_POST['anneePub']);//Cette ligne récupère la valeur de l'attribut 'anneePub' envoyé via la méthode POST du formulaire. 
//La fonction intval est utilisée pour convertir cette valeur en un entier.

$genre = htmlspecialchars($_POST['genre']);
$etat = intval($_POST['etat']);

// Préparation et exécution de la requête SQL d'insertion
$sql = "INSERT INTO livres (titre, auteur, anneePub, genre, etat) VALUES ('$titre', '$auteur', $anneePub, '$genre', $etat)";
$resultat = $bdd->query($sql);

// Vérification de l'insertion
if ($resultat) {
    echo 'Le livre est bien ajouté !';
} else {
    echo "Erreur lors de l'insertion du livre : " . $bdd->error;
}

// Fermeture de la connexion à la base de données
$bdd->close();

?>

<a href='liste.php'>Retour à la liste</a>";
