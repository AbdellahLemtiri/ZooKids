<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Habitats - Zoo Kids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Fredoka', sans-serif; background: linear-gradient(to bottom right, #e0f7fa, #fff); }
    </style>
</head>
<body class="min-h-screen p-8">

<div class="text-center mb-12">
    <h1 class="text-5xl font-bold text-green-600 mb-4">Liste des Habitats</h1>
    <a href="ajoute_habitat.php" class="inline-block bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full text-xl font-bold shadow-lg transition">
        + Ajouter un habitat
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 max-w-7xl mx-auto">

    <?php
    $sql = "SELECT * FROM Habitat ";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id   = $row['IdHab'];
            $nom  = htmlspecialchars($row['NomHab']);
            $desc = htmlspecialchars($row['Description_Hab']);
    ?>
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col h-full transform hover:scale-105 transition duration-300">
            <div class="h-56 bg-gradient-to-br from-green-300 to-blue-400 flex items-center justify-center">
                <h3 class="text-4xl font-bold text-white drop-shadow-lg"><?= $nom ?></h3>
            </div>
            <div class="p-6 flex-1">
                <p class="text-gray-700 text-base leading-relaxed"><?= $desc ?></p>
            </div>

            <div class="p-6 pt-0 mt-auto">
                <div class="flex gap-4">
                    <a href="modifier_habitat.php?id=<?= $id ?>"
                       class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-4 rounded-full font-bold transition shadow-lg">
                       Modifier
                    </a>
                    <a href="supprimer_habitat.php?id=<?= $id ?>"
                       onclick="return confirm('Voulez-vous vraiment supprimer « <?= $nom ?> » ?')"
                       class="flex-1 bg-red-500 hover:bg-red-600 text-white text-center py-4 rounded-full font-bold transition shadow-lg">
                       Supprimer
                    </a>
                </div>
            </div>
        </div>

    <?php
        }
    } else {
        echo '<p class="text-center text-3xl text-gray-600 col-span-4">Aucun habitat pour le moment</p>';
    }
    ?>
</div>
 <div style="height: 100px;"></div>
  <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-50">
    <div class="flex justify-around py-3">
      <a href="index.php" class="flex flex-col items-center text-green">
        <span class="material-symbols-filled text-3xl">dashboard</span>
        <span class="text-xs font-bold">Home</span>
      </a>
      <a href="liste_animaux.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">cruelty_free</span>
        <span class="text-xs">Animals</span>
      </a>
      <a href="liste_habitat.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">forest</span>
        <span class="text-xs">Habitats</span>
      </a>
      <a href="stats.html" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">bar_chart</span>
        <span class="text-xs">Stats</span>
      </a>
      <a href="game.html" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">joystick</span>
        <span class="text-xs">Games</span>
      </a>
    </div>
  </div>
</body>
</html>