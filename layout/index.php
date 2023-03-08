<?php include "header.php"?>
        
        <div class="cntrblock">
        <?php if(isset($_SESSION["firstname"]) AND isset($_SESSION["surname"])){echo "<div class='cntrblock'>Hello, $fname $lname</div>";}
            ?>
            <h1>The only place to eat in Hämeenlinna! </h1>
        </div>
        
        <?php 
include "db.php";

//Articles display from table, pair is shown text-image format, even in image-text format, links to edit, add and display checked available 

$array = array();

$sql = "select * from main";
$result = $connection -> query($sql);
if($result->num_rows >0)
{   
    $num = 1;
    while($row = $result -> fetch_assoc()){
        $array[$row['id']]="chbx".$row['id'];
if(isset($_SESSION["isadmin"]) AND $_SESSION["isadmin"] == TRUE) {
          
        echo "<form id='form' action='' method='POST'>";
}
        if ($num % 2 != 0){
            if("$row[visible]" == TRUE AND !isset($_SESSION["isadmin"])){
                echo "
                <div class='imgblock'><img src='$row[img_link]' alt='$row[img_name]'></div>
                <div class='txtblock'>'$row[text]'</div>
                ";
            }
            if(isset($_SESSION["isadmin"]) AND $_SESSION["isadmin"] == TRUE){              
                echo "<div class='cntrblock'><a href='mainedit.php?id=$row[id]'>edit $row[id]</a>
                Display for user: <input type='checkbox' id='chbx$row[id]' name='chbx$row[id]' value='$row[id]'></div>";
                echo "
                <div class='imgblock'><img src='$row[img_link]' alt='$row[img_name]'></div>
                <div class='txtblock'>'$row[text]'</div><br><br>
                ";
            }

        }
        else{
            if("$row[visible]" == TRUE AND !isset($_SESSION["isadmin"])){
                echo "
                <div class='txtblock'>'$row[text]'</div>
                <div class='imgblock'><img src='$row[img_link]' alt='$row[img_name]'></div>
                ";       
            }
            if(isset($_SESSION["isadmin"]) AND $_SESSION["isadmin"] == TRUE){              
                echo "<div class='cntrblock'><a href='mainedit.php?id=$row[id]'>edit $row[id]</a>
                Display for user: <input type='checkbox' id='chbx$row[id]' name='chbx$row[id]'></div>";
                echo "
                <div class='txtblock'>'$row[text]'</div>
                <div class='imgblock'><img src='$row[img_link]' alt='$row[img_name]'></div><br><br>
                ";
            }
        }
        $num++;
        
        if("$row[visible]" == 1) {
            echo "
            <script>
            document.getElementById('chbx$row[id]').checked = true;
            </script>
            ";
        }
        else {
            echo "
            <script>
            document.getElementById('chbx$row[id]').checked = false;
            </script>
            ";    
        }
    
    }

}



if(isset($_SESSION["isadmin"]) AND $_SESSION["isadmin"] == TRUE)
{
    echo "
        <div class='cntrblock'>

        <input type = 'submit' value = 'Update fields' name = 'check' onclick=''>

        </div>
        ";
    
    if ( isset( $_POST['check'] ) ) {
        
        foreach($array as $key => $item){
            
    if (isset($_POST[$item])){
        $visible = 1;
    }
    else{
        $visible = 0;
    }
    $query = mysqli_query($connection, "UPDATE main set visible='$visible' where id='$key'");
    if ($query) {
        echo "<div class='cntrblock'>Data succesfully changed</div>";
    }
    else {
        echo "<div class='cntrblock'>Error</div>";
    }
    
    echo '<script> window.location.replace("index.php")</script>';
 
}
    }
if(isset($_SESSION["isadmin"]) AND $_SESSION["isadmin"] == TRUE)
{echo"</form>";}
    
    if(isset($_SESSION["isadmin"]) AND $_SESSION["isadmin"] == TRUE)
{
    echo "
            <div class='cntrblock'>
            <form action='maincreate.php' method='post' target='blank'>
            <button type='submit' id='check' name ='check'> Add an article </button>
            </form>
        </div>
        ";
}
}

        ?>
              
        <div class="cntrblock">
            <iframe class="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1934.0928626833834!2d24.4601133!3d61.0034388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x468e5dbef602a7e1%3A0xcacad440ad4f93de!2sKustaa%20III%3An%20katu%206%2C%2013100%20H%C3%A4meenlinna!5e0!3m2!1sfi!2sfi!4v1674664626136!5m2!1sfi!2sfi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
<?php include "footer.php"; ?>