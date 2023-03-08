<?php include "header.php"?>
        
        <div class="cntrblock">Contact us, if you feel like<br>
        ...giving a feedback <br>
        ...reporting an issue <br>
        ... or introducing a suggestion...
        </div>

        <div class="invisible">~~~~~~~~</div>

        <div class="commentform">
        <form method="post" action="">
        <p>Leave your comment here</p>
        <textarea name="text" id="text" rows="18" placeholder="Leave your comments, thought or features that we can add - here" class="input-text"></textarea>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        </form>
        </div>
        <?php
            if (isset($_POST['submit'])){

                $text = $_POST['text'];

                include 'db.php';
                $sql = "insert into comments (user_id, text, visible)
                values( '$userid', '$text', 1)";

                if ($connection ->query($sql) === TRUE){
                    echo "Your information is added successfully";
                }
                else{
                    echo "Error:" .$connection->error;
                }
            }
        ?>

        <?php
            include 'db.php';
            $sql1 = "select * from comments where visible = 1";

            $result = $connection -> query($sql1);
    
            if($result->num_rows > 0 ){
                echo"<table class='table table-dark'>
                <tr><th>Customers comments</th>";
                while($row = $result -> fetch_assoc()){
                echo"
                    <tr>
                    <td>$row[text]</td>
                    </tr>
                ";
                }
                echo "</table>";
            }

            else
                {
                    echo "NO Results";
                }
                    $connection -> close();
                ?>

        
<br><br>

        <div class="invisible">~~~~~~~~</div>

        <div class="cntrblock">
            <iframe class="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1934.0928626833834!2d24.4601133!3d61.0034388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x468e5dbef602a7e1%3A0xcacad440ad4f93de!2sKustaa%20III%3An%20katu%206%2C%2013100%20H%C3%A4meenlinna!5e0!3m2!1sfi!2sfi!4v1674664626136!5m2!1sfi!2sfi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
        <div class="cntrblock">
        <a class="email" href="mailto:pizza@burger.fi" class="e-mail">pizza@burger.fi</a>
        <br>	
        <a class="phone" href="tel:+358 41 41414141">+358 41 41414141</a>
        </div>    
        
<?php include "footer.php"; ?>