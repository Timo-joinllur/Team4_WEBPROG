<?php include "header.php"?>
        
        <div class="reservationform">
            <form method="post" action="">
                <h1>Reservation Form</h1>  
                <h2>Reservation date & time</h2>
                    <input type="datetime-local" name="time" required>
     
                <h2>Additional notes</h2>
                    <textarea name="text" style="width: 700px" placeholder=" How many people?" required> </textarea>
                    <br>
                    <input type="submit" name="submit" value="Submit">
            </form>
        </div>

    <?php
 if (isset($_POST['submit'])){
    $time = $_POST['time'];
    $text = $_POST['text'];

    include 'db.php';
    $sql = "insert into reservation (user_id, time, text, complete)
    values('$userid', '$time', '$text', 1)";

    if ($connection ->query($sql) === TRUE){
        echo "Your reservation is added successfully!";
    }
    else{
        echo "Error:" .$connection->error;
    }
}
    ?>

<?php include "footer.php"; ?>