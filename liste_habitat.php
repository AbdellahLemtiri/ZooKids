<?php include "fonctionalete/connect.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Habitats - Zoo Kids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Fredoka', sans-serif; background: #f0f9ff; }
        .material-symbols-filled { font-variation-settings: 'FILL' 1 }
    </style>
</head>
<body class="min-h-screen flex flex-col">

<!-- Top Bar صغيرة ونظيفة -->
<div class="sticky top-0 bg-white border-b border-gray-200 z-50">
    <div class="flex items-center justify-between px-4 py-3">
        <div class="flex items-center gap-3">
            <span class="material-symbols-filled text-4xl text-green-600"></span>
            <h1 class="text-xl font-bold text-green-600">Habitats</h1>
        </div>
        <a href="ajoute_habitat.php" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-full text-sm font-bold shadow transition">
            + Ajouter
        </a>
    </div>
</div>

<!-- Liste des Habitats -->
<main class="flex-1 px-4 pt-4 pb-24">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

        <?php
        $sql = "SELECT * FROM Habitat ";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id   = $row['IdHab'];
                $nom  = htmlspecialchars($row['NomHab']);
                $desc = htmlspecialchars($row['Description_Hab']);
        ?>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
                <div class="h-40 bg-gradient-to-br from-green-400 to-teal-500 flex items-center justify-center">
                    <h3 class="text-2xl font-bold text-white"><?= $nom ?></h3>
                </div>
                <div class="p-4">
                    <p class="text-sm text-gray-700 mb-4 line-clamp-3"><?= $desc ?></p>
                    <div class="flex gap-2">
                        <a href="fonctionalete/modifier_habitat.php?id=<?= $id ?>"
                           class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2.5 rounded-xl text-sm font-bold transition">
                           Modifier
                        </a>
                        <a href="fonctionalete/supprimer_habitat.php?id=<?= $id ?>"
                           onclick="return confirm('Supprimer « <?= $nom ?> » ?')"
                           class="flex-1 bg-red-600 hover:bg-red-700 text-white text-center py-2.5 rounded-xl text-sm font-bold transition">
                           Supprimer
                        </a>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
            echo '<p class="col-span-full text-center text-xl text-gray-500 py-16">Aucun habitat</p>';
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
      <a href="liste_animaux.php" class="flex flex-col items-center text-gray-600">
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