<?php
// Inclure le fichier bdd.php
require_once 'bdd.php';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Créer une connexion à la base de données
        $conn = connectToDatabase($servername, $username, $password, $dbname);

        // Préparation de la requête SQL d'insertion
        $stmt = $conn->prepare("INSERT INTO events (image, start_date, end_date, name, city, description) VALUES (:image, :start_date, :end_date, :name, :city, :description)");

        // Liaison des paramètres de la requête
        $stmt->bindParam(':image', $_POST['image']);
        $stmt->bindParam(':start_date', $_POST['start_date']);
        $stmt->bindParam(':end_date', $_POST['end_date']);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':city', $_POST['city']);
        $stmt->bindParam(':description', $_POST['description']);

        // Exécution de la requête
        $stmt->execute();

        echo "L'événement a été ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'événement : " . $e->getMessage();
    }

    // Fermeture de la connexion PDO
    $conn = null;
}

// Fonction pour afficher les événements
function displayEvents($conn)
{
    try {
        // Préparation de la requête SQL pour sélectionner tous les événements
        $stmt = $conn->prepare("SELECT * FROM events");

        // Exécution de la requête
        $stmt->execute();

        // Affichage des résultats
        echo "<h2>Événements :</h2>";
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . $row['name'] . " - " . $row['start_date'] . " - " . $row['end_date'] . " - " . $row['city'] . " - " . $row['description'] . "</li>";
        }
        echo "</ul>";
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des événements : " . $e->getMessage();
    }
}

// Afficher la table events en utilisant la fonction displayEvents
try {
    // Créer une connexion à la base de données
    $conn = connectToDatabase($servername, $username, $password, $dbname);

    // Appeler la fonction pour afficher les événements
    displayEvents($conn);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des événements : " . $e->getMessage();
}

// Fermeture de la connexion PDO
$conn = null;
