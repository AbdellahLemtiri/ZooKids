<?php 
include "connect.php";
$id = $_GET["id"];

$sql = "SELECT * FROM Habitat WHERE IdHab = $id";
$res = $connect->query($sql);

if ($res->num_rows == 0) {
    echo "Erreur : Habitat introuvable.";
    exit;
}

$habitat = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Habitat</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="container-form">
    <h2>Modifier un Habitat</h2>

    <form method="post" action="">
        <label>Nom de l'habitat :</label>
        <input type="text" name="nom" required value="<?= $habitat['NomHab'] ?>">

        <label>Description :</label>
        <textarea name="description" rows="4"><?= $habitat['Description_Hab'] ?></textarea>

        <button type="submit">Modifier</button>
    </form>
</div>

</body>
</html>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomhb = $_POST['nom'];
    $desc = $_POST['description'];

    $sql2  = "UPDATE habitat 
              SET NomHab='$nomhb', Description_Hab='$desc'
              WHERE IdHab='$id'";

    if ($connect->query($sql2) === TRUE) {
  header("location: liste_habitat.php");

    } else {
        echo "<script>
                alert('Erreur: ".$connect->error."');
              </script>";
    }
}
?>
