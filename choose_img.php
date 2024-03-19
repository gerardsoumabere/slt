<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie d'images</title>
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            // Chemin du dossier contenant les images
            $imagePath = 'assets/img/portfolio/';

            // Liste des noms de fichiers d'images
            $imageNames = scandir($imagePath);

            // Boucle à travers les noms de fichiers
            foreach ($imageNames as $imageName) {
                // Vérifier si le fichier est une image (ignorer les dossiers et les fichiers cachés)
                if (in_array($imageName, ['.', '..']) || is_dir($imagePath . $imageName)) {
                    continue;
                }
                ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="<?php echo $imagePath . $imageName; ?>"
                            class="card-img-top" alt="<?php echo $imageName; ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $imageName; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $imagePath . $imageName; ?>
                            </p> <!-- Affichage du chemin -->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>