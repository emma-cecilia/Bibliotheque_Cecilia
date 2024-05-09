<?php

// Connexion à la base de données
$bdd = new mysqli('localhost', 'root', '', 'biblioBoukaka');

// Vérifier la connexion
if ($bdd->connect_errno) {
    echo "Pas de connexion à MySQL: " . $bdd->connect_error;
    exit();
}

$sql = "delete from livres where titre = 'Le lotus bleu' ";
$resultat=$bdd->query($sql);

// Vérification de l'insertion
if ($resultat) {
    echo 'Effacement effectué';
} else {
    echo "Erreur lors de la suppréssion du livre : " . $bdd->error;
}

// Fermeture de la connexion à la base de données
$bdd->close();

?>

<a href='liste2.php'>Retour à la liste</a>";
