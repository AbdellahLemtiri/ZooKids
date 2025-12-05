<?php
include "connect.php";

$id = (int)$_GET["id"];
$sql = "SELECT * FROM Animal WHERE IdAnimal = $id";
$result = $connect->query($sql);

if ($result->num_rows == 0) {
    echo "erorr non trouve";
    exit ;
}
$animal = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Animal</title>
    <link rel="stylesheet" href="styles/style.css"> 
</head>
<body>

<div class="container-form">
    <h2>Modifier un Animal</h2>

    <form method="post" action="">

        <label>Nom de l'animal :</label>
        <input type="text" name="nom" value="<?= $animal['NomAnimal']?>" required>

        <label>Type d'alimentation :</label>
        <select name="type_alimentaire" required>
            <option value="Carnivore"  <?= $animal['Type_alimentaire']=='Carnivore' ?>>Carnivore</option>
            <option value="Herbivore"  <?= $animal['Type_alimentaire']=='Herbivore'?>>Herbivore</option>
            <option value="Omnivore"   <?= $animal['Type_alimentaire']=='Omnivore' ?>>Omnivore</option>
        </select>

        <label>Image (URL) :</label>
        <input type="text" name="url_image" value="<?= $animal['Url_image']?>">

        <label>Habitat :</label>
        <select name="habitat" required>
            <?php
            $habitats = $connect->query("SELECT * FROM Habitat");
            while ($hab = $habitats->fetch_assoc()) {
                $selected = ($hab["IdHab"] == $animal["IdHab"]) ? "selected" : "";
                echo "<option value='{$hab['IdHab']}' $selected>{$hab['NomHab']}</option>";
            }
            ?>
        </select>

        <button type="submit">Modifier l'animal</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom  = $_POST["nom"];
    $type = $_POST["type_alimentaire"];
    $img  = $_POST["url_image"];
    $hab  = (int)$_POST["habitat"];

    $sql_update = "UPDATE Animal  SET NomAnimal='$nom', Type_alimentaire='$type', Url_image='$img', IdHab=$hab  WHERE IdAnimal=$id";
    if ($connect->query($sql_update) === TRUE) {
        echo "<script>alert(la modifie avec succes');</script>";
  header("location: liste_animaux.php");
        
    } else {
        echo "<script>alert(' non modifier " . $connect->error . "');</script>";
  header("location: liste_animaux.php");
         

    }
}
?>

</body>
</html>