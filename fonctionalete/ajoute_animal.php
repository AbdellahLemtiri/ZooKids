<?php
include "connect.php"; 

if (isset( $_POST["nom"])&& isset($_POST["habitat"])) {

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
    header("location:  ../liste_animaux.php ");

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un Animal</title>
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
    <h2 class="text-2xl font-bold text-green-600">Nouvel Animal</h2>
  </div>

  <form method="post"  class="space-y-4">

    <input type="text" name="nom" placeholder="Nom" required
           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">

    <select name="type_alimentaire" required 
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">
      <option value="" disabled selected>Type alimentation</option>
      <option value="Carnivore">Carnivore</option>
      <option value="Herbivore">Herbivore</option>
      <option value="Omnivore">Omnivore</option>
    </select>


    
    <input type="url" name="url_image" placeholder="URL image" required
           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">

    <select name="habitat" required 
            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">
      <option value="" disabled selected>Habitat</option>
      <?php
      $res = $connect->query("SELECT IdHab, NomHab FROM Habitat ");
      while ($h = $res->fetch_assoc()) {
          echo "<option value='{$h['IdHab']}'>{$h['NomHab']}</option>";
      }
      
      ?>
    </select>

    <button type="submit" 
            class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl shadow transition">
      Ajouter
    </button>
  </form>

  <div class="text-center mt-4">
    <a href="../liste_animaux.php" class="text-green-600 hover:underline text-sm">← Retour</a>
  </div>
</div>

</body>
</html>