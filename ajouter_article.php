<?php
// Inclure le fichier bdd.php
require_once 'bdd.php';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Créer une connexion à la base de données
        $conn = connectToDatabase($servername, $username, $password, $dbname);

        // Préparation de la requête SQL d'insertion
        $stmt = $conn->prepare("INSERT INTO articles (titre, sous_titre, contenu, auteur) VALUES (:titre, :sous_titre, :contenu, :auteur)");

        // Liaison des paramètres de la requête
        $stmt->bindParam(':titre', $_POST['titre']);
        $stmt->bindParam(':sous_titre', $_POST['sous_titre']);
        $stmt->bindParam(':contenu', $_POST['contenu']);
        $stmt->bindParam(':auteur', $_POST['auteur']);

        // Exécution de la requête
        $stmt->execute();

        echo "L'article a été ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'article : " . $e->getMessage();
    }

    // Fermeture de la connexion PDO
    $conn = null;
}

// Fonction pour afficher les articles
function displayArticles($conn)
{
    try {
        // Préparation de la requête SQL pour sélectionner tous les articles
        $stmt = $conn->prepare("SELECT * FROM articles");

        // Exécution de la requête
        $stmt->execute();

        // Affichage des résultats
        echo "<h2>Articles :</h2>";
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . $row['titre'] . " - " . $row['sous_titre'] . " - " . $row['contenu'] . " - " . $row['auteur'] . "</li>";
        }
        echo "</ul>";
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des articles : " . $e->getMessage();
    }
}

// Afficher la table articles en utilisant la fonction displayArticles
try {
    // Créer une connexion à la base de données
    $conn = connectToDatabase($servername, $username, $password, $dbname);

    // Appeler la fonction pour afficher les articles
    displayArticles($conn);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des articles : " . $e->getMessage();
}

// Fermeture de la connexion PDO
$conn = null;
