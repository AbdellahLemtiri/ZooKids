

<?php
include "connect.php";
$sql = "SELECT * FROM  habitat ";
$RSULT = $connect -> query($sql);

if ($RSULT->num_rows > 0) {
    while($row = $RSULT->fetch_assoc()) {
        echo "<div>";
        echo "<div>".$row['IdHab']."</div>";
        echo "<div>".$row['NomHab']."</div>";
        echo "<div>".$row['Description_Hab']."</div>";
        echo "</div>";
    }
} else {
    echo "<div><div colspan='3'>Aucun habitat trouvé</div></div>";
}

?>



