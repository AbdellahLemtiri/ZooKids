<?php 
include "connect.php";
$id = $_GET["id"];

$sql = "SELECT * FROM Habitat WHERE IdHab = $id";
$res = $connect->query($sql);

if ($res->num_rows == 0) {
    echo "Erreur : Habitat non trouvé";
    exit;
}

$habitat = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Habitat</title>
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
        <h2 class="text-2xl font-bold text-green-600">Modifier l'habitat</h2>
    </div>

    <form method="post" class="space-y-4">

        <input type="text" name="nom" value="<?= htmlspecialchars($habitat['NomHab']) ?>" required
               placeholder="Nom de l'habitat" 
               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base">

        <textarea name="description" rows="4" required placeholder="Description..." 
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green focus:outline-none text-base resize-none">
<?= htmlspecialchars($habitat['Description_Hab']) ?>
        </textarea>

        <button type="submit" 
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl shadow transition">
            Modifier
        </button>
    </form>

    <div class="text-center mt-4">
        <a href=" ../liste_habitat.php" class="text-green-600 hover:underline text-sm">Retour</a>
    </div>
</div>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomhb = $_POST['nom'];
    $desc  = $_POST['description'];

    $sql2 = "UPDATE habitat 
             SET NomHab='$nomhb', Description_Hab='$desc'
             WHERE IdHab='$id'";

    if ($connect->query($sql2) === TRUE) {
        echo "<script>alert('Modifié avec succès !');</script>";
        header("location:../liste_habitat.php");
    } else {

        echo "<script>alert('Erreur : " . $connect->error . "');</script>";
        
    }
}
?>

</body>
</html>