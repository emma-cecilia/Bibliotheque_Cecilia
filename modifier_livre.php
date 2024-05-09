<?php

// Connexion à la base de données
$bdd = new mysqli('localhost', 'root', '', 'biblioBoukaka');

// Vérifier la connexion
if ($bdd->connect_errno) {
    echo "Pas de connexion à MySQL : " . $bdd->connect_error;
    exit();
}

// Récupération des données du formulaire et de l'ID du livre
$idLivre = intval($_GET['id']);
$titre = htmlspecialchars($_POST['titre']);
$auteur = htmlspecialchars($_POST['auteur']);
$anneePub = intval($_POST['anneePub']);
$genre = htmlspecialchars($_POST['genre']);
$etat = intval($_POST['etat']);

// Préparation et exécution de la requête SQL de modification
$sql = "UPDATE livres SET titre = '$titre', auteur = '$auteur', anneePub = $anneePub, genre = '$genre', etat = $etat WHERE numeroLivre = $idLivre";
$resultat = $bdd->query($sql);

// Vérification de l'insertion
if ($resultat) {
    echo 'Modification réussie!';
} else {
    echo "Erreur lors de la modification : " . $bdd->error;
}

// Fermeture de la connexion à la base de données
$bdd->close();

?>

<a href='liste.php'>Retour à la liste</a>";