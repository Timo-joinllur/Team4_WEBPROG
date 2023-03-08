<?php

$title ="Index adding";
include "header.php";
include 'db.php';

echo "<div class='cntrblock'>Adding an article</div>";

echo "
<form method = 'post' action = ''>
<br>
Name:
<br>
<input type = 'text' name = 'name' placeholder = 'Article name' required><br><br>
Text:
<br>
<input type = 'text' name = 'text' placeholder = 'Article text' required style='width: 900px; height: 300px;'><br><br>
Image name:
<br>
<input type = 'text' name = 'img_name' placeholder = 'Image name' required><br><br>

<input type ='file' name = 'img'>
<br><br>
<input type = 'submit' value = 'Create' name = 'create'>
</form>
";

if ( isset( $_POST["create"] ) ) 
{
    include 'db.php';
    $name = $_POST['name'];
    $text = $_POST['text'];
    $img_name = $_POST['img_name'];
    $img_link = "images/" . $_POST['img_name'] .".jpg";
    $query = mysqli_query($connection, "INSERT INTO main (name, text, img_name, img_link, visible) VALUES ('$name', '$text', '$img_name', '$img_link', TRUE)");
    if ($query) {
        echo "<div class='cntrblock'>Data succesfully added</div>";
    }
    else {
        echo "<div class='cntrblock'>Error</div>";
    }
    
    echo "$name, $text, $img_name, $img_link";
    echo '<script> window.location.replace("index.php")</script>';
}

include "footer.php";
?>