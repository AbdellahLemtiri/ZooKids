<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "zoo_enc_db";
$connect = new mysqli($host,$user,$pass,$db);
if($connect->connect_error){
    echo "error a la connection avec la base de donnee : " . $connect->connect_error;
    exit;
}

?>
