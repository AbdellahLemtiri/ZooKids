<?php include "fonctionalete/connect.php"; session_start(); 
if(!isset($_SESSION['score']))
   $_SESSION['score'] = 0;
if(!isset($_SESSION['essais']))
   $_SESSION['essais'] = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devine l'animal !</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
  
    <style>
        body { font-family: 'Fredoka', sans-serif;  background: linear-gradient(to bottom right, #e0f9ff, #ffffff);; margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
    </style>
</head>
<body>

<?php
$req = $connect->query("SELECT IdAnimal, NomAnimal, Url_image FROM Animal WHERE Url_image != '' ORDER BY RAND() LIMIT 1");
$animal = $req->fetch_assoc();
if (!$animal) { echo "<h2 class='text-3xl text-red-600 text-center'>Aucun animal disponible</h2>"; exit; }
?>

<div class="bg-white rounded-3xl shadow-2xl p-8 max-w-lg w-full text-center">

    <div class="text-2xl font-bold text-amber-600 mb-6">
        Score : <?= $_SESSION['score'] ?> pts | Essais : <?= $_SESSION['essais'] ?>
    </div>

    <h1 class="text-4xl font-bold text-green-700 mb-8">C'est qui ?</h1>

    <img src="<?= htmlspecialchars($animal['Url_image']) ?>" 
         class="w-full rounded-2xl shadow-xl mb-8 border-4 border-amber-300">

    <form method="post" class="space-y-6">
        <input type="hidden" name="id" value="<?= $animal['IdAnimal'] ?>">

        <input type="text" name="reponse" placeholder="Nom de l'animal ?" required autocomplete="off"
               class="w-full px-6 py-4 text-2xl text-center rounded-full border-2 border-gray-300 focus:border-green-500 focus:outline-none">

        <button type="submit" 
                class="w-full bg-green-500 hover:bg-green-600 text-white py-4 rounded-full text-2xl font-bold shadow-lg transition">
            Vérifier
        </button>
    </form>

    <?php
    if ($_POST) {
        $_SESSION['essais']++;
        $rep = trim(strtolower($_POST['reponse']));
        $bon = trim(strtolower($animal['NomAnimal']));

        if ($rep == $bon || similar_text($rep, $bon) > strlen($bon)*0.7) {
            $_SESSION['score'] += 10;
            echo "<p class='mt-6 text-4xl text-green-600 font-bold'>Bravo !</p>";
            echo "<p class='text-2xl'>C'est bien <strong>" .$animal['NomAnimal'] . "</strong> !</p>";
        } 
        else {
            echo "<p class='mt-6 text-4xl text-red-600 font-bold'>Non...</p>";
            echo "<p class='text-2xl'>C'était <strong>" . $animal['NomAnimal'] . "</strong></p>";
           echo "<p class='text-2xl'>C'était <strong>" . $animal['NomAnimal'] . "</strong></p>";

        }
        echo "<a href='jeux.php' class='inline-block mt-6 bg-blue-500 hover:bg-blue-600 text-white px-10 py-4 rounded-full text-xl font-bold'>Suivant</a>";
    }
    ?>
<div style="height: 100px;" class=""></div>
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
        <span class="text-xs">Statistique</span>
      </a>
      <a href="jeux.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">joystick</span>
        <span class="text-xs">jeux</span>
      </a>
    </div>
</div>

</body>
</html>