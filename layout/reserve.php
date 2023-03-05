<?php include "header.php"?>
        
        <div class="reservationform">
            <form method="post" action="">
                <h1>Reservation Form</h1>  
                <!--   
                <p>Name</p>
                <input type="text" name="fname" placeholder="First name" required >
                <input type="text" name="lname" placeholder="Last name" required >
                -->
                <p>Reservation date & time</p>
                    <input type="datetime-local" name="time" required>
     
                <p>Additional notes</p>
                    <input type="text" name="text">
                    <br><br>
                    <input type="submit" name="submit" value="Submit">
            </form>
        </div>

    <?php
 if (isset($_POST['submit'])){
    /*
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    */
    $time = $_POST['time'];
    $text = $_POST['text'];

    include 'db.php';
    $sql = "insert into reservation (time, text)
    values( '$time', '$text')";

    if ($connection ->query($sql) === TRUE){
        echo "Your information is added successfully";
    }
    else{
        echo "Error:" .$connection->error;
    }
}
    ?>

<?php include "footer.php"; ?>