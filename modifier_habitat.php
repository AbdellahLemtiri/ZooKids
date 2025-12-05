<?php 
include "connect.php";
$id = $_GET["id"];
$sql = "SELECT * FROM Habitat WHERE IdHab = $id";
$res = $connect -> query($sql);
if($res->num_rows == 0){
    echo "erour";
    exit;
}
$habitat = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Habitat</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="container-form">
    <h2>Ajouter un Habitat</h2>

    <form method="post" action="">
        <label>Nom de l'habitat :</label>
        <input type="text" name="nom" required value="<?= $habitat['NomHab']?>">

        <label>Description :</label>
        <input value="<?= $habitat['Description_Hab']?>" name="description"  >

        <button type="submit">Modifier</button>
    </form>
</div>

</body>
</html>