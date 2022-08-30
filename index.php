<!DOCTYPE html>
<html>
    <head>
        <title>
            OOP Booking App
        </title>

        <?php session_start(); ?>
        <?php require('functions.php'); ?>
        <link rel="stylesheet" type="text/css" href="stylesheet.css?ts=<?=time()?>">
        <script src="./functions.js" defer></script>
    </head>

    <body>
        <header>
            
        </header>
        <main>            
            <form class="frmInput" method="post">
                <h1>Hotel Reservations</h1>

                <section class="inputSection">                    
                    <div class="gridArea">
                        <label for='firstName' class="lblFirstName">First Name:</label><br>
                            <input type='text' id="firstName" name='firstName' placeholder="Please Enter Your First Name" required><br>

                        <label for='lastName' class="lblLastName">Surname:</label><br>
                            <input type='text' id="lastName" name='lastName' placeholder="Please Enter Your Surname" required><br>
                            
                        <label for='emailAddress' class="lblEmailAddress">Email Address:</label><br>
                            <input type='email' id="emailAddress" name='emailAddress' placeholder="Please Enter Your Email Address" required><br>
                    </div>

                    <div class="gridArea">
                        <label for='hotelName' class="lblHotelName">Hotel:</label><br>
                            <select id="hotelName" name='hotelName' required>
                                <option value="" selected>Please Select a Hotel</option>
                            </select><br>

                        <label for='checkInDate' class="lblCheckInDate">Check-in Date:</label><br>
                            <input type='date' id="checkInDate" name='checkInDate' class="dateIn" required><br>

                        <label for='checkOutDate' class="lblCheckOutDate">Check-out Date:</label><br>
                            <input type='date' id="checkOutDate" name='checkOutDate' class="dateOut" required><br>
                    </div>                 
                </section>
                <div class="divBtn">
                    <input type="submit" name="submit" class="btnSubmit">
                </div>
            </form>

            <section class="compareSection">
                <h1>Hotel Information</h1>
                <div class="hotelInfo">

                </div>
            </section>

<!--               
    <form>           
        <a href="comparePage.php">compare page</a>
    </form>
-->
            

        </main>
        <footer>
            <label>&copy; Created by Martin Louw</label>
        </footer>
    </body>
</html>
