<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Habitat</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="container-form">
    <h2>Ajouter un Habitat</h2>

    <form method="post" action="">
        <label>Nom de l'habitat :</label>
        <input type="text" name="nom" required>

        <label>Description :</label>
        <textarea name="description" rows="4"></textarea>

        <button type="submit">Ajouter</button>
    </form>
</div>

</body>
</html>

<?php 
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom  = $_POST["nom"];
    $desc = $_POST["description"];

    $sql = "INSERT INTO Habitat (NomHab, Description_Hab)
            VALUES ('$nom', '$desc')";

    if ($connect->query($sql) === TRUE) {
        echo "<p>Habitat ajouté avec succès.</p>";
    } else {
        echo "<p>Erreur SQL: " . $connect->error . "</p>";
    }
}
?>
