<?php
// Informations de connexion à la base de données
$servername = "arum.o2switch.net"; // Adresse du serveur MySQL
$username = "soge8182_J7hKp9sL4qR2tU8y"; // Nom d'utilisateur MySQL
$password = "Ze.3cj+CWZejV82)575g],9W%a{4?ADv"; // Mot de passe MySQL
$dbname = "soge8182_slt"; // Nom de la base de données MySQL

// Fonction pour établir une connexion à la base de données
function connectToDatabase($servername, $username, $password, $dbname) {
    try {
        // Crée une connexion à MySQL avec PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Configure le mode d'erreur de PDO à Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
        return null;
    }
}

// Fonction pour créer la table "articles" si elle n'existe pas déjà
function createArticlesTable($conn) {
    try {
        // Requête SQL pour créer la table "articles" si elle n'existe pas déjà
        $sql = "CREATE TABLE IF NOT EXISTS articles (
            id INT AUTO_INCREMENT PRIMARY KEY,
            titre VARCHAR(255) NOT NULL,
            sous_titre VARCHAR(255),
            contenu TEXT NOT NULL,
            auteur VARCHAR(255),
            date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            derniere_modification TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        // Exécute la requête SQL
        $conn->exec($sql);

        echo "La table 'articles' a été créée avec succès ou elle existait déjà.";
    } catch (PDOException $e) {
        echo "Erreur lors de la création de la table 'articles' : " . $e->getMessage();
    }
}

// Établir une connexion à la base de données
$conn = connectToDatabase($servername, $username, $password, $dbname);

// Si la connexion est établie, créer la table "articles"
if ($conn) {
    createArticlesTable($conn);
    
    // Fermer la connexion PDO
    $conn = null;
}