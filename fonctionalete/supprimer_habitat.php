<?php 
include "connect.php";
if (isset($_GET["id"])) {
$id = $_GET['id'];
$sql = "DELETE FROM Habitat WHERE IdHab = $id";
$res = $connect -> query($sql);
if($res == TRUE){
 header("location:  ../liste_habitat.php");   
}
 else{
    echo $id;
 }
}
?>