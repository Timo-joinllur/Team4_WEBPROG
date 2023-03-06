<?php include "header.php"?>
        
        <div class="reservationform">
            <form method="post" action="">
                <h1>Reservation Form</h1>  
                <p>Reservation date & time</p>
                    <input type="datetime-local" name="time" required>
     
                <p>Additional notes</p>
                    <input type="text" name="text" placeholder="e.g How many people?">
                    <br><br>
                    <input type="submit" name="submit" value="Submit">
            </form>
        </div>

    <?php
 if (isset($_POST['submit'])){
    $time = $_POST['time'];
    $text = $_POST['text'];

    include 'db.php';
    $sql = "insert into reservation (user_id, time, text, complete)
    values('$userid', '$time', '$text', 0)";

    if ($connection ->query($sql) === TRUE){
        echo "Your information is added successfully";
    }
    else{
        echo "Error:" .$connection->error;
    }
}
    ?>

<?php include "footer.php"; ?>