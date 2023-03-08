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
<input type = 'submit' value = 'Update fields' name = 'update'>
<input type = 'submit' value = 'Delete data' name = 'delete'>
</form>
";

include "footer.php";
?>