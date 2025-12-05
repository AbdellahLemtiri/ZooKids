<?php include "fonctionalete/connect.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques - Zoo Kids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Fredoka', sans-serif; background: linear-gradient(to bottom right, #e0f9ff, #ffffff); margin: 0; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 48 }
        .material-symbols-filled { font-variation-settings: 'FILL' 1 }
        .stat-card { transition: all 0.4s; }
        .stat-card:hover { transform: translateY(-12px) scale(1.05); box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important; }
    </style>
</head>
<body class="min-h-screen pt-8 pb-32">

    <h1 class="text-6xl font-bold text-center text-green-600 mb-12 drop-shadow-lg">
        Statistiques du Zoo
    </h1>

    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 px-6">

     
        <?php
         $totalAnimaux = $connect->query("SELECT COUNT(*) as cnt FROM Animal")->fetch_assoc()['cnt'];
         ?>
        <div class="stat-card bg-gradient-to-br from-blue-400 to-blue-600 text-white p-10 rounded-3xl shadow-2xl text-center">
            <span class="material-symbols-outlined text-8xl opacity-30 mb-4"></span>
            <h2 class="text-3xl font-bold mb-2">Animaux Total</h2>
            <p class="text-7xl font-bold"><?= $totalAnimaux ?></p>
        </div>

        <?php $totalHabitats = $connect->query("SELECT COUNT(*) as cnt FROM Habitat")->fetch_assoc()['cnt']; ?>
        <div class="stat-card bg-gradient-to-br from-green-400 to-emerald-600 text-white p-10 rounded-3xl shadow-2xl text-center">
            <span class="material-symbols-outlined text-8xl opacity-30 mb-4"></span>
            <h2 class="text-3xl font-bold mb-2">Habitats</h2>
            <p class="text-7xl font-bold"><?= $totalHabitats ?></p>
        </div>

        <?php $carnivores = $connect->query("SELECT COUNT(*) as cnt FROM Animal WHERE Type_alimentaire = 'Carnivore'")->fetch_assoc()['cnt']; ?>
        <div class="stat-card bg-gradient-to-br from-red-500 to-rose-600 text-white p-10 rounded-3xl shadow-2xl text-center">
            <span class="text-8xl font-bold opacity-30 mb-4"></span>
            <h2 class="text-3xl font-bold mb-2">Carnivores</h2>
            <p class="text-7xl font-bold"><?= $carnivores ?></p>
        </div>

        <?php $herbivores = $connect->query("SELECT COUNT(*) as cnt FROM Animal WHERE Type_alimentaire = 'Herbivore'")->fetch_assoc()['cnt']; ?>
        <div class="stat-card bg-gradient-to-br from-lime-400 to-green-500 text-white p-10 rounded-3xl shadow-2xl text-center">
            <span class="text-8xl opacity-30 mb-4"></span>
            <h2 class="text-3xl font-bold mb-2">Herbivores</h2>
            <p class="text-7xl font-bold"><?= $herbivores ?></p>
        </div>

        <?php $omnivores = $connect->query("SELECT COUNT(*) as cnt FROM Animal WHERE Type_alimentaire = 'Omnivore'")->fetch_assoc()['cnt']; ?>
        <div class="stat-card bg-gradient-to-br from-amber-400 to-orange-500 text-white p-10 rounded-3xl shadow-2xl text-center">
            <span class="text-8xl opacity-30 mb-4"></span>
            <h2 class="text-3xl font-bold mb-2">Omnivores</h2>
            <p class="text-7xl font-bold"><?= $omnivores ?></p>
        </div>

        <?php $pourcentageCarn = $totalAnimaux > 0 ? round(($carnivores / $totalAnimaux) * 100) : 0; ?>
        <div class="stat-card bg-gradient-to-br from-purple-500 to-pink-600 text-white p-10 rounded-3xl shadow-2xl text-center">
            <span class="material-symbols-outlined text-8xl opacity-30 mb-4"></span>
            <h2 class="text-3xl font-bold mb-2">Carnivores %</h2>
            <p class="text-7xl font-bold"><?= $pourcentageCarn ?>%</p>
        </div>

    </div>

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