<?php

// Connexion à la base de données
$bdd = new mysqli('localhost', 'root', '', 'biblioBoukaka');

// Vérifier la connexion
if ($bdd->connect_errno) {
    echo "Pas de connexion à MySQL : " . $bdd->connect_error;
    exit();
}

// Récupération de l'ID du livre à modifier
$idLivre = intval($_GET['id']);

// Requête SQL pour récupérer les données du livre à modifier
$sql = "SELECT * FROM livres WHERE numeroLivre = $idLivre";
$resultat = $bdd->query($sql);

// Vérification de la requête a réussi et si un livre a été trouvé
if ($resultat && $resultat->num_rows == 1) {
    $donnees = $resultat->fetch_assoc();

    // Préparation des données du formulaire
    $titre = htmlspecialchars($donnees['titre']);
    $auteur = htmlspecialchars($donnees['auteur']);
    $anneePub = intval($donnees['anneePub']);
    $genre = htmlspecialchars($donnees['genre']);
    $etat = intval($donnees['etat']);
} else {
    echo "Livre introuvable.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un livre</title>
</head>
<body>
    <h1>Modifier un livre</h1>

    <form action="modifier_livre.php?id=<?php echo $idLivre; ?>" method="post">
        <fieldset>
            <legend>Modifier le livre "<?php echo $titre; ?>"</legend>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="<?php echo $titre; ?>" required>
            <br>
            <label for="auteur">Auteur :</label>
            <input type="text" id="auteur" name="auteur" value="<?php echo $auteur; ?>" required>
            <br>
            <label for="anneePub">Année de publication :</label>
            <input type="number" id="anneePub" name="anneePub" value="<?php echo $anneePub; ?>" required>
            <br>
            <label for="genre">Genre :</label>
            <select id="genre" name="genre" required>
                <option value="<?php echo $genre; ?>" selected><?php echo $genre; ?></option>
                <option value="Roman">Roman</option>
                <option value="Bande dessinée">Bande dessinée</option>
                <option value="Science-fiction">Science-fiction</option>
            </select>
            <br>
            <label for="etat">État :</label>
            <select id="etat" name="etat" required>
                <option value="<?php echo $etat; ?>" selected><?php echo $etat == 1 ? "Neuf" : "Occasion"; ?></option>
                <option value="1">Neuf</option>
                <option value="0">Occasion</option>
            </select>
            <br>
            <input type="submit" value="Modifier" />
        </fieldset>
    </form>

    <a href="liste.php">Retour à la liste</a>
</body>
</html>