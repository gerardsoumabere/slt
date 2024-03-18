<?php
// Informations de connexion à la base de données
$servername = "arum.o2switch.net"; // Adresse du serveur MySQL
$username = "soge8182_J7hKp9sL4qR2tU8y"; // Nom d'utilisateur MySQL
$password = "Ze.3cj+CWZejV82)575g],9W%a{4?ADv"; // Mot de passe MySQL
$dbname = "soge8182_slt"; // Nom de la base de données MySQL

try {
    // Crée une connexion à MySQL avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configure le mode d'erreur de PDO à Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion à la base de données réussie.";
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
}

// Ferme la connexion PDO
$conn = null;


