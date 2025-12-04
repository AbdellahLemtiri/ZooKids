<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Animal</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="container-form"> <h2>Ajouter un Animal</h2>

    <form method="post" action="#">
        <label>Nom de l'animal :</label>
        <input type="text" name="nom" required>

        <label>Espèce :</label>
        <input type="text" name="espece" required>

        <label>Âge :</label>
        <input type="number" name="age" required>

        <label>Habitat :</label>
        <select name="habitat" required>
            <option value="">Sélectionner...</option>
            <option>Forêt</option>
            <option>Désert</option>
            <option>Savane</option>
            <option>Océan</option>
        </select>

        <button type="submit">Ajouter</button>
    </form>
</div>

</body>
</html>