<?php include "header.php"?>
        
        <div class="reservationform">
            <form action="/">
                <h1>Reservation Form</h1>     
                <p>Name</p>
                <input type="text" name="name" placeholder="First name" />
                <input type="text" name="name" placeholder="Last name" />
                
                <p>Email</p>
                <input type="email" name="email" placeholder="email@address.com"/>

                <p>Phone</p>
                    <input type="text" name="phone" placeholder="### ### ####"/>
        
                <p>Reservation Date</p>
                    <input type="date" name="bdate"required/>
                    <i class="fas fa-calendar-alt"></i>
          
                <p>Reservation Time</p>
                    <input type="time" name="btime" required/>
     
                <p>How many people will you be with?</p>
                    <input type="text" name="language"/>
     
                <p>Additional notes</p>
                    <textarea rows="3"></textarea>
        
                <div class="btn-block">
                    <button type="submit" href="/">Send</button>
                </div>
            </form>
        </div>

<?php include "footer.php"; ?>