<?php include "connect.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom  = $_POST["nom"];
    $desc = $_POST["description"];

    $sql = "INSERT INTO Habitat (NomHab, Description_Hab) VALUES ('$nom', '$desc')";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Habitat ajouté !');</script>";
        header(" location: ../liste_habitat.php");
    } 
    else {
        echo "<script>alert('Erreur');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Habitat</title>
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
        <h2 class="text-2xl font-bold text-green-600">Nouvel Habitat</h2>
    </div>

    <form method="post" class="space-y-4">

        <input type="text" name="nom" placeholder="Nom de l'habitat" required
               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">

        <textarea name="description" rows="4" placeholder="Description..." required
                  class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base resize-none"></textarea>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl shadow transition">
            Ajouter
        </button>
    </form>

     <div class="text-center mt-4">
        <a href="liste_habitat.php" class="text-green-600 hover:underline text-sm">Retour</a>
    </div>
</div>

</body>
</html>