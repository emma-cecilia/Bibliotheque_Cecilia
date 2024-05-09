<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Livres</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>Liste des Livres</h1>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année de publication</th>
                <th>Genre</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
			// Connexion à la base de données
			$bdd = new mysqli('localhost', 'root', '', 'biblioBoukaka');

			// Vérifier la connexion
			if ($bdd->connect_errno) {
				echo "Pas de connexion à MySQL: " . $bdd->connect_error;
				exit();
			}
			
            // Requête SQL pour récupérer les livres
            $sql = "SELECT * FROM livres";
            $resultat = $bdd->query($sql);

            // Vérifier si la requête a réussi
            if ($resultat && $resultat->num_rows > 0) {
                while ($donnees = $resultat->fetch_assoc()) {
                    $idLivre = $donnees['numeroLivre']; // Récupérer l'ID du livre
                    echo "<tr>";
                    echo "<td>" . $donnees['titre'] . "</td>";
                    echo "<td>" . $donnees['auteur'] . "</td>";
                    echo "<td>" . $donnees['anneePub'] . "</td>";
                    echo "<td>" . $donnees['genre'] . "</td>";
                    echo "<td>" . ($donnees['etat'] == 1 ? "Neuf" : "Occasion") . "</td>";
                    echo "<td>";
                    echo "<div class='action-buttons'>";
                    echo "<a href='modifier.php?id=$idLivre'><button class='modifier'>Modifier</button></a>";
                    echo "<a href='efface_form.php?id=$idLivre'><button class='supprimer'>Supprimer</button></a>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Aucune livre trouvé.</td></tr>";
            }

            // Fermeture de la connexion à la base de données
			$bdd->close();
			
            ?>
        </tbody>
    </table><br><br>
	
	<a href='liste_librairie.php'>Liste des librairies</a>;<br><br>

    <h2>Ajouter un nouveau livre</h2>
    <form action="ajoute.php" method="post">
        <fieldset>
            <legend>Nouveau livre</legend>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>
            <br><br>
            <label for="auteur">Auteur :</label>
            <input type="text" id="auteur" name="auteur" required>
            <br><br>
            <label for="anneePub">Année de publication :</label>
            <input type="number" id="anneePub" name="anneePub" required>
            <br><br>
            <label for="genre">Genre :</label>
            <select id="genre" name="genre" required>
                <option value="roman">Roman</option>
                <option value="poésie">Poésie</option>
                </select>
            <br><br>
            <label for="etat">État :</label>
            <select id="etat" name="etat" required>
                <option value="1">Neuf</option>
                <option value="0">Occasion</option>
            </select>
            <br><br>
            <input type="submit" class="ajouter" value="Ajouter" />
			
		</fieldset>
	</form><br><br>
	
	
</body>
</html>