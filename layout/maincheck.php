<?php

include 'db.php';

foreach($array as $item){

    if (isset($_POST['chbx$row[id]'])){
        $visible = 1;
    }
    else{
        $visible = 0;
    }
    $query = mysqli_query($connection, "UPDATE main set visible='$visible' where id='$row[id]'");
    if ($query) {
        echo "<div class='cntrblock'>Data succesfully changed</div>";
    }
    else {
        echo "<div class='cntrblock'>Error</div>";
    }
    
    echo $_POST['chbx$row[id]'];
}
    
echo '<script> window.location.replace("index.php")</script>';
?>