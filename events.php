<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Upload d'Image</title>
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-4">Créer un évènement</h2>
                <!-- Modal d'upload -->
                <div class="container">
                    <button type="button" class="btn btn-primary"
                        data-toggle="modal" data-target="#uploadModal">
                        Uploader une image
                    </button>
                    <div class="modal fade" id="uploadModal" tabindex="-1"
                        role="dialog" aria-labelledby="uploadModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="uploadModalLabel">Uploader une image
                                    </h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulaire d'upload -->
                                    <form id="uploadForm" action="upload.php"
                                        method="POST"
                                        enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="file"
                                                class="form-label">Sélectionner
                                                une image</label>
                                            <input type="file"
                                                class="form-control" id="file"
                                                name="file">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Chemin de l'image
                                                :</label>
                                            <input type="text"
                                                class="form-control" id="image"
                                                name="image" readonly>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary">Uploader</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de galerie d'images -->
                <div class="container mt-3">
                    <button type="button" class="btn btn-primary"
                        data-toggle="modal" data-target="#galleryModal">
                        Voir la galerie d'images
                    </button>
                    <div class="modal fade" id="galleryModal" tabindex="-1"
                        role="dialog" aria-labelledby="galleryModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="galleryModalLabel">Galerie d'images
                                    </h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
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
                                                        <a href="#"
                                                            class="image-link"
                                                            data-image="<?php echo $imagePath . $imageName; ?>">
                                                            <img src="<?php echo $imagePath . $imageName; ?>"
                                                                class="card-img-top"
                                                                alt="<?php echo $imageName; ?>">
                                                        </a>
                                                        <div class="card-body">
                                                            <h5 class="card-title">
                                                                <?php echo $imageName; ?>
                                                            </h5>
                                                            <p class="card-text">
                                                                <?php echo $imagePath . $imageName; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de création d'événement -->
                <form action="upload.php" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom de l'événement :</label>
                        <input type="text" class="form-control" id="nom"
                            name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="date_debut">Date de début :</label>
                        <input type="datetime-local" class="form-control"
                            id="date_debut" name="date_debut" required>
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin :</label>
                        <input type="datetime-local" class="form-control"
                            id="date_fin" name="date_fin" required>
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville :</label>
                        <input type="text" class="form-control" id="ville"
                            name="ville" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea class="form-control" id="description"
                            name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit"
                        class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts Bootstrap (jQuery et Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Script Bootstrap -->
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Lorsqu'on clique sur un lien d'image dans le modal
            $('.image-link').click(function (e) {
                e.preventDefault(); // Empêche le lien de se comporter comme un lien normal

                // Récupère le chemin de l'image depuis l'attribut data-image
                var imagePath = $(this).data('image');

                // Met à jour la valeur du champ texte avec l'id "image"
                $('#image').val(imagePath);

                // Ferme le modal
                $('#galleryModal').modal('hide');
            });

            // Lorsque le formulaire est soumis avec succès
            $('#uploadForm').submit(function (event) {
                event.preventDefault(); // Empêche l'action par défaut du formulaire

                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Met à jour le champ avec l'id "image" avec le chemin de l'image téléchargée
                        $('#image').val(response);
                    }
                });

                // Ferme le modal
                $('#uploadModal').modal('hide');
            });
        });
    </script>
</body>

</html>