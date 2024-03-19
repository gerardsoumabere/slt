<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploader une image</title>
    <!-- Liens CSS Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Uploader une image
                    </div>
                    <div class="card-body">
                        <!-- Formulaire d'upload -->
                        <form action="upload.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="file"
                                    class="form-label">Sélectionner une
                                    image</label>
                                <input type="file" class="form-control"
                                    id="file" name="file">
                            </div>
                            <button type="submit"
                                class="btn btn-primary">Uploader</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Liens JS Bootstrap -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>