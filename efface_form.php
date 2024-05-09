<?php
// Connexion à la base de données
$bdd = new mysqli('localhost', 'root', '', 'biblioBoukaka');

// Vérifier la connexion
if ($bdd->connect_errno) {
    echo "Pas de connexion à MySQL: " . $bdd->connect_error;
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'identifiant du livre est valide
    if (isset($_POST['numeroLivre'])) {
        $idLivre = intval($_POST['numeroLivre']); 

        // Requête SQL pour supprimer le livre
        $sql = "DELETE FROM livres WHERE numeroLivre = $idLivre";
        $resultat = $bdd->query($sql);

        // Vérification de la suppression
        if ($resultat) {
            echo "Livre supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du livre : " . $bdd->error;
        }
    } else {
        echo "Erreur : ID du livre manquant.";
    }
}

// Fermeture de la connexion à la base de données
$bdd->close();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <title>Supprimer un livre</title>
</head>
<body>
  <h1>Supprimer un livre</h1>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="numeroLivre">ID du livre à supprimer : </label>
    <input type="number" id="numeroLivre" name="numeroLivre" required>
    <input type="submit" value="Supprimer">
  </form>

  <a href="liste.php">Retour à la liste</a>
</body>
</html>