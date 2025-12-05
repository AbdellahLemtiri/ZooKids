<?php
include "connect.php";

$id = (int)$_GET["id"];
$sql = "SELECT * FROM Animal WHERE IdAnimal = $id";
$result = $connect->query($sql);

if ($result->num_rows == 0) {
    echo "erorr non trouve";
    exit;
}
$animal = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <title>Modifier un Animal</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;700&display=swap" rel="stylesheet">
     <style>
        body { font-family: 'Fredoka', sans-serif; background: #f0f9ff; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

<div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm">

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-green-600">Modifier l'animal</h2>
    </div>

    <form method="post" class="space-y-4">

        <input type="text" name="nom" value="<?= $animal['NomAnimal'] ?>" required
               placeholder="Nom" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">

        <select name="type_alimentaire" required 
                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">
            <option value="Carnivore"  <?= $animal['Type_alimentaire']=='Carnivore'  ? 'selected' : '' ?>>Carnivore</option>
            <option value="Herbivore"  <?= $animal['Type_alimentaire']=='Herbivore'  ? 'selected' : '' ?>>Herbivore</option>
            <option value="Omnivore"   <?= $animal['Type_alimentaire']=='Omnivore'   ? 'selected' : '' ?>>Omnivore</option>
        </select>

        <input type="text" name="url_image" value="<?= $animal['Url_image'] ?>" 
               placeholder="URL image" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">

        <select name="habitat" required  class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">
            <option value="" disabled>Habitat</option>
            <?php
            $habitats = $connect->query("SELECT * FROM Habitat");
            while ($hab = $habitats->fetch_assoc()) {
                $selected = ($hab["IdHab"] == $animal["IdHab"]) ? "selected" : "";
                echo "<option value='{$hab['IdHab']}' $selected>{$hab['NomHab']}</option>";
            }
            ?>
        </select>

        <button type="submit" 
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl shadow transition">
            Modifier
        </button>
    </form>

    <div class="text-center mt-4">
        <a href=" ../liste_animaux.php" class="text-green-600 hover:underline text-sm">Retour</a>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom  = $_POST["nom"];
    $type = $_POST["type_alimentaire"];
    $img  = $_POST["url_image"];
    $hab  = (int)$_POST["habitat"];

    $sql_update = "UPDATE Animal SET NomAnimal='$nom', Type_alimentaire='$type', Url_image='$img', IdHab=$hab WHERE IdAnimal=$id";
    if ($connect->query($sql_update) === TRUE) {
        echo "<script>alert('Modifié avec succès !'); location=' ../liste_animaux.php';</script>";
    } else {
        echo "<script>alert('Erreur : " . $connect->error . "');</script>";
    }
}
?>

</body>
</html>