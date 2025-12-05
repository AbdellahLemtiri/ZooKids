<?php include "fonctionalete/connect.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mes Animaux - Zoo Kids</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Fredoka', 'sans-serif'] },
          colors: {
            green: '#34c759',
            orange: '#ff9500',
          }
        }
      }
    }
  </script>
  <style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 48 }
    .material-symbols-filled { font-variation-settings: 'FILL' 1 }
  </style>
</head>

<body class="bg-gradient-to-br from-sky-50 to-white font-sans min-h-screen flex flex-col">


<div class="sticky top-0 bg-white border-b border-gray-200 z-50">
  <div class="flex items-center justify-between px-4 py-3">

    <div class="flex items-center gap-3">
      <span class="material-symbols-filled text-4xl text-green"></span>
      <h1 class="text-xl font-bold text-green">Mes Animaux</h1>
    </div>

    <a href="ajoute_animal.php" 
       class="bg-green hover:bg-emerald-600 text-white px-5 py-2 rounded-full text-sm font-bold shadow transition">
      + Ajouter
    </a>
  </div>

  <div class="px-4 pb-4">
    <form method="POST" class="flex gap-2">
      <input type="text" name="search" placeholder="Rechercher un animal par habitat ..." 
             
             class="flex-1 px-4 py-2 rounded-full border border-gray-300 focus:border-green focus:outline-none text-sm">

      <select name="type" class="px-4 py-2 rounded-full border border-gray-300 text-sm">
        <option value="">Tous</option>
        <option value="Carnivore">Carnivore</option>
        <option value="Herbivore" >Herbivore</option>
        <option value="Omnivore">Omnivore</option>
      </select>

      <button type="submit" class="bg-green hover:bg-emerald-600 text-white px-5 py-2 rounded-full text-sm font-bold">
        OK
      </button>
    </form>
  </div>
</div>

  <main class="flex-1 px-4 pt-4 pb-24">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

      <?php
     $sql = "SELECT Animal.*, Habitat.NomHab FROM Animal LEFT JOIN Habitat ON Animal.IdHab = Habitat.IdHab  WHERE 1=1";


if (!empty($_POST["search"])) {
    $hab = $connect->real_escape_string($_POST["search"]);
    $sql .= " AND Habitat.NomHab LIKE '%$hab%'";
}


if (!empty($_POST["type"])) {
    $type = $connect->real_escape_string($_POST["type"]);
    $sql .= " AND Animal.Type_alimentaire = '$type'";
}

$result = $connect->query($sql);


      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
               $img = $row['Url_image'];
      ?>
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-xl transition">
          <img src="<?= $img ?>" class="w-full h-44 object-cover" alt="<?= $row['NomAnimal']?>">
          <div class="p-4 text-center">
            <h3 class="text-lg font-bold text-gray-800 mb-1"><?= $row['NomAnimal'] ?></h3>
            
            <span class="inline-block px-3 py-1 rounded-full text-white text-xs font-bold mb-2
              <?= $row['Type_alimentaire']=='Carnivore' ? 'bg-red-500' : 
                 ($row['Type_alimentaire']=='Herbivore' ? 'bg-green' : 'bg-orange') ?>">
              <?= $row['Type_alimentaire'] ?>
            </span>

            <p class="text-xs text-gray-600 mb-3">Habitat : <?=   $row['NomHab'] ?? 'Inconnu'?></p>

       
            <div class="flex gap-2">
              <a href="fonctionalete/modifier_animal.php?id=<?= $row['IdAnimal'] ?>"
                 class="flex-1 bg-blue-600 hover:bg-blue-800 text-white font-bold py-2.5 rounded-full text-sm transition">
                 Modifier
              </a>
              <a href="fonctionalete/supprimer_animal.php?id=<?= $row['IdAnimal'] ?>"
                 onclick="return confirm('Supprimer <?= addslashes($row['NomAnimal']) ?> ?')"
                 class="flex-1 bg-red-600 hover:bg-red-800 text-white font-bold py-2.5 rounded-full text-sm transition">
                 Supprimer
              </a>
            </div>
          </div>
        </div>
      <?php
          }
      } else {
          echo '<p class="col-span-full text-center text-2xl text-gray-500 py-20">Aucun animal trouvé</p>';
      }
      ?>
    </div>
  </main>

<div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-50">

    <div class="flex justify-around py-3">
      <a href="index.php" class="flex flex-col items-center text-green">
        <span class="material-symbols-filled text-3xl">dashboard</span>
        <span class="text-xs font-bold">Home</span>
      </a>
      <a href="#" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">cruelty_free</span>
        <span class="text-xs">Animals</span>
      </a>
      <a href="liste_habitat.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">forest</span>
        <span class="text-xs">Habitats</span>
      </a>
      <a href="statistique.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">bar_chart</span>
        <span class="text-xs">Stats</span>
      </a>
      <a href="jeux.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">joystick</span>
        <span class="text-xs">Games</span>
      </a>
    </div>
</div>




</body>
</html>