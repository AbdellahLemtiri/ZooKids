<?php
include "connect.php";

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
   echo "<h1>". $id. "</h1>" ;
    $sql = "DELETE FROM Animal WHERE IdAnimal = $id";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Animal supprimé avec succès');</script>";

    } else {
        echo "<script>alert('Erreur : " . $connect->error . "');</script>";



    }
  header("location: ../liste_animaux.php");

}
?>
