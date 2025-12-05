<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes Animaux - Zoo Kids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            background: linear-gradient(to bottom right, #e0f7fa, #ffffff);
        }
    </style>
</head>

<body class="min-h-screen">

    <div class="p-6">
        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold text-green-600">Mes Animaux</h1>
            <a href="ajoute_animal.php" class="inline-block mt-4 bg-green-500 text-white px-8 py-4 rounded-full text-xl font-bold shadow-lg hover:bg-green-600">
                + Ajouter un animal
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 max-w-7xl mx-auto">
            <?php
            $sql = "SELECT * FROM Animal";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $img = $row['Url_image'];
                    if (empty($img) || $img == "Url_image") $img = "https://via.placeholder.com/400x300/eeeeee/999999?text=Image";
            ?>
                    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-105 transition">
                        <img src="<?= $img ?>" class="w-full h-64 object-cover">
                        <div class="p-6 text-center">
                            <h3 class="text-2xl font-bold text-gray-800 mb-3"><?= $row['NomAnimal'] ?></h3>
                            <p class="text-lg mb-2">
                                <span class="inline-block px-4 py-2 rounded-full text-white
                        <?php if ($row['Type_alimentaire'] == 'Carnivore') echo 'bg-red-500';
                        elseif ($row['Type_alimentaire'] == 'Herbivore') echo 'bg-green-500';
                        else echo 'bg-yellow-500'; ?>">
                                    <?= $row['Type_alimentaire'] ?>
                                </span>
                            </p>

                            <?php
                            $idHab = $row["IdHab"];

                            $sql2 = "SELECT NomHab FROM Habitat WHERE IdHab = $idHab";
                            $res2 = $connect->query($sql2);
                            $habitat = $res2->fetch_assoc();
                            $nomHab = $habitat["NomHab"];
                            ?>
                            <p class="text-gray-600 mb-4">Habitat : <?= $nomHab ?></p>

                            <div class="flex gap-3">
                                <a href="modifier_animal.php?id=<?= $row['IdAnimal'] ?>"
                                    class="flex-1 bg-blue-500 text-white py-3 rounded-full font-bold">Modifier</a>
                                <a href="delet_anim.php?id=<?= $row['IdAnimal'] ?>"
                                    onclick="return confirm('Vraiment supprimer <?= $row['NomAnimal'] ?> ?')"
                                    class="flex-1 bg-red-500 text-white py-3 rounded-full font-bold">Supprimer</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p class='text-center text-2xl col-span-4'>Aucun animal pour le moment</p>";
            }

            ?>
        </div>
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