<?php
include "connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $type_alimentaire = $_POST["type_alimentaire"];
    $url_image = $_POST["url_image"];
    $habitat = (int) $_POST["habitat"];

    $sql = "INSERT INTO Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) 
            VALUES ('$nom', '$type_alimentaire', '$url_image', $habitat)";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Animal ajouté avec succès');</script>";
    } else {
        echo "<script>alert(\"Erreur : " . $connect->error . "\");</script>";
    }

    $connect->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Animal</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

<div class="container-form">
    <h2>Ajouter un Animal</h2>

    <form method="post" action="">
        <label>Nom de l'animal :</label>
        <input type="text" name="nom" required>

        <label>Type d'alimentation :</label>
        <select name="type_alimentaire" required>
            <option value="">Sélectionner...</option>
            <option value="Carnivore">Carnivore</option>
            <option value="Herbivore">Herbivore</option>
            <option value="Omnivore">Omnivore</option>
        </select>

        <label>Image (URL) :</label>
        <input type="text" name="url_image" required>

        <label>Habitat :</label>
        <select name="habitat" required>
            <?php
            $sql_habitat = "SELECT NomHab, IdHab FROM Habitat";
            $result_habitat = $connect->query($sql_habitat);

            echo "<option value=''>Sélectionner...</option>";

            if ($result_habitat->num_rows > 0) {
                while ($row = $result_habitat->fetch_assoc()) {
                    echo "<option value=\"".$row['IdHab']."\">".$row['NomHab']."</option>";
                }
            } else {
                echo "<option value=''>Aucun habitat trouvé</option>";
            }
            ?>
        </select>

        <button type="submit">Ajouter</button>
    </form>
</div>

</body>
</html>
