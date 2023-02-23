<?php include "header.php"?>
        
        <div class="reservationform">
            <form action="">
                <h1>Reservation Form</h1>     
                <p>Name</p>
                <input type="text" name="fname" placeholder="First name" required >
                <input type="text" name="lname" placeholder="Last name" required >
                
                <p>Email</p>
                <input type="email" name="email" placeholder="email@address.com" required>

                <p>Phone</p>
                    <input type="text" name="phone" placeholder="### ### ####" required>
        
                <p>Reservation Date</p>
                    <input type="date" name="date" required>
                    <i class="fas fa-calendar-alt"></i>
          
                <p>Reservation Time</p>
                    <input type="time" name="time" required>
     
                <p>How many people will you be with?</p>
                    <input type="text" name="amount"/>
     
                <p>Additional notes</p>
                    <!--<textarea rows="3"></textarea> -->
                    <input type="text" name="addnotes">
        
                <div class="btn-block">
                    <button type="submit" name="submit">Send</button>
                </div>
            </form>
        </div>

    <?php
    if(isset($_POST['submit']))
    


    ?>

<?php include "footer.php"; ?>