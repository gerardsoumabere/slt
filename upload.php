<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_FILES["file"])) {
    // Vérification de la présence du fichier
    if ($_FILES["file"]["error"] == UPLOAD_ERR_NO_FILE) {
        echo "Aucun fichier n'a été téléversé.";
        echo $targetDir . basename($_FILES["file"]["name"]);
    } else {
        $targetDir = "assets/img/";
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Vérifie si le fichier est une image réelle ou une fausse image
        if (isset ($_POST["submit"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if ($check !== false) {
                echo "Le fichier est une image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "Le fichier n'est pas une image.";
                $uploadOk = 0;
            }
        }

        // Vérifie si le fichier existe déjà
        if (file_exists($targetFile)) {
            echo "Désolé, le fichier existe déjà.";
            $uploadOk = 0;
        }

        // Vérifie la taille du fichier
        if ($_FILES["file"]["size"] > 500000) {
            echo "Désolé, votre fichier est trop volumineux.";
            $uploadOk = 0;
        }

        // Autorise certains formats de fichiers
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
            $uploadOk = 0;
        }

        // Si tout est bon, essaye de télécharger le fichier
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "Le fichier " . htmlspecialchars(basename($_FILES["file"]["name"])) . " a été téléchargé.";
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
        }

        // Affiche le chemin d'enregistrement, même en cas d'échec
        echo "Le fichier a été enregistré sous : " . $targetFile;
    }
} else {
    echo "Aucun fichier n'a été téléchargé.";
}
