<?php
include "connect.php";
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

        <form method="post" action="#">
            <label>Nom de l'animal :</label>
            <input type="text" name="nom" required>

            <label>Espèce :</label>
            <input type="text" name="espece" required>

            <label>Âge :</label>
            <input type="number" name="age" required>

            <label>Habitat :</label>
            <select name="habitat" required>
                <?php
                $sql = "SELECT NomHab,IdHab FROM habitat";
                $RSULT = $connect->query($sql);

                if ($RSULT->num_rows > 0) {
                    while ($row = $RSULT->fetch_assoc()) {

                        echo "<option value=" . $row["IdHab"] . " >" . $row["NomHab"] . "</option>";
                    }
                } else {
                    echo "<option value =0 >" . "Aucun habitat trouvé" . "</option>";
                }
                ?>
            </select>
            <button type="submit">Ajouter</button>
        </form>
    </div>

</body>

</html>