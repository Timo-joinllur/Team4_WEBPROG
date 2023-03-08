<?php
include "header.php";
?>

<?php

// Displaying and editing part

$title ="Index editing";

$id = $_GET['id'];
include 'db.php';
$result = mysqli_query($connection ,"select * from main where id='$id'");
$row = mysqli_fetch_array($result);

$img_link = "$row[img_link]";

echo "<div class='cntrblock'>Editing article number $id</div>";

echo "
<form method = 'post' action = ''>
<br>
Name:
<br>
<input type = 'text' name = 'name' placeholder = 'Article name' required value='$row[name]'><br><br>
Text:
<br>
<input type = 'text' name = 'text' placeholder = 'Article text' required value='$row[text]' style='width: 900px; height: 300px;'><br><br>
Image : <input type ='file' name = 'img'>
<br>
<input type = 'image'  alt= 'Submit' required src='$img_link' style='width: 30%;'><br><br>
Visibility :
<input type='checkbox' id='chck' name='chck'>
<br>
<input type = 'submit' value = 'Update fields' name = 'update' onclick=''>
<input type = 'submit' value = 'Delete data' name = 'delete' onclick=''>
</form>
";

if("$row[visible]" == 1) {
    echo "
    <script>
    document.getElementById('chck').checked = true;
    </script>
    ";
}
else {
    echo "
    <script>
    document.getElementById('chck').checked = false;
    </script>
    ";
}

//Update case

if ( isset( $_POST["update"] ) ) 
{
    include 'db.php';
    $name = $_POST['name'];
    $text = $_POST['text'];
    if (isset($_POST['chck'])){
        $visible = 1;
    }
    else{
        $visible = 0;
    }
    $query = mysqli_query($connection, "UPDATE main set name='$name', text='$text', visible='$visible' where id='$id'");
    if ($query) {
        echo "<div class='cntrblock'>Data succesfully changed</div>";
    }
    else {
        echo "<div class='cntrblock'>Error</div>";
    }
    
    echo '<script> window.location.replace("index.php")</script>';
}

//Delete case

if ( isset( $_POST["delete"] ) ) 
{
    $query = mysqli_query($connection, "DELETE FROM main WHERE id='$id'");
    if ($query) {
        echo "<div class='cntrblock'>Data succesfully changed</div>";
    }
    else {
        echo "<div class='cntrblock'>Error</div>";
    }
    
    echo '<script> window.location.replace("index.php")</script>';
}

include "footer.php";
?>