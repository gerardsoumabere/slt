<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>

<body>
    <h1>Ajouter un nouvel article</h1>
    <form action="traitement_formulaire.php" method="post">
        <label for="titre">Titre<span style="color: red;">*</span>:</label><br>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="sous_titre">Sous-titre :</label><br>
        <input type="text" id="sous_titre" name="sous_titre"><br><br>

        <label for="contenu">Contenu<span
                style="color: red;">*</span>:</label><br>
        <textarea id="contenu" name="contenu" required></textarea><br><br>

        <label for="auteur">Auteur :</label><br>
        <input type="text" id="auteur" name="auteur"><br><br>

        <input type="submit" value="Ajouter l'article">
    </form>
</body>

</html>