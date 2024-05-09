<?php

// Connexion à la base de données
$bdd = new mysqli('localhost', 'root', '', 'biblioBoukaka');

// Vérifier la connexion
if ($bdd->connect_errno){
echo "Pas de connexion à MySQL:".$bdd->connect_error;
}
else {echo "Page bien connectée à la base de données";
} 

// Requête SQL pour récupérer les librairies
$sql2 = "SELECT * FROM librairies";


// Exécuter la requête et vérifier si elle a réussi
$reponse2 = $bdd->query($sql2);

// Vérifier si la requête a réussi pour les librairies
if ($reponse2) {
    if ($reponse2->num_rows > 0) {
        echo '<h2>Librairies</h2>'; // Titre des librairies
        echo '<ul>'; // Début de la liste non ordonnée

        while ($donnees2 = $reponse2->fetch_assoc()) { // Début de la boucle while
            echo '<li>';
            echo $donnees2["nom"] . ', ' . $donnees2["adresse"] . ', ' . $donnees2["telephone"] . ', Responsable: ' . $donnees2["responsable"];
            echo '</li>';
        } // Fin de la boucle while

        echo '</ul>'; // Fin de la liste non ordonnée
    } else {
        echo "Aucune librairie trouvée";
    }
} else {
    echo "Erreur lors de l'exécution de la requête : " . mysqli_error($bdd);
}

// Libérer les ressources si la requête a réussi
if ($reponse2) {
    $reponse2->free();
}



// Fermer la connexion à la base de données
$bdd->close();

?>

<a href='liste.php'>Retour à la liste</a>";
