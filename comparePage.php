<!DOCTYPE html>
<html>
    <head>
        <title>
            OOP Booking App
        </title>

        <?php session_start(); ?>
        <?php require('compareFunctions.php'); ?>
        <?php require('hotels.php'); ?>
        <?php //hotelsInformation(); ?>
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
                            <input type='text' id="firstName" name='firstName' placeholder="Please Enter Your First Name" value="<?= $firstName ?>" required><br>

                        <label for='surname' class="lblSurname">Surname:</label><br>
                            <input type='text' id="surname" name='surname' placeholder="Please Enter Your Surname" value="<?= $surname ?>" required><br>
                            
                        <label for='emailAddress' class="lblEmailAddress">Email Address:</label><br>
                            <input type='email' id="emailAddress" name='emailAddress' placeholder="Please Enter Your Email Address" value="<?= $emailAddress ?>" required><br>
                    </div>

                    <div class="gridArea">
                        <label for='hotelName' class="lblHotelName">Hotel:</label><br>
                            <select id="hotelName" name='hotelName' required>
                                <option value="" selected>Please Select a Hotel</option>
                                <?php foreach ($hotels as $key => $option) { ?>
                                    <option value="<?= $key; ?>"><?= $option -> name; ?></option>    
                                <?php } ?>                             
                            </select><br>

                        <label for='checkInDate' class="lblCheckInDate">Check-in Date:</label><br>
                            <input type='date' id="checkInDate" name='checkInDate' class="dateIn" required><br>

                        <label for='checkOutDate' class="lblCheckOutDate">Check-out Date:</label><br>
                            <input type='date' id="checkOutDate" name='checkOutDate' class="dateOut" required><br>
                    </div>                 
                </section>
                <div class="divBtn">
                    <input id="submit" type="submit" name="submit" class="btnSubmit">
                </div>
            </form>

            <div id="compareTwoSection" class="compareTwoSection">
                <h1>Hotels Information</h1>
                <section class="hotelsInfo">
                    <div class="hotelGrid">
                        <h4 id="hotelNameInfo"><?= $hotels[$firstHotelName] -> name; ?>, <?= $hotels[$firstHotelName] -> location; ?></h4>
                        <p id="noOfDays">Number of Days: <?= $firstNoOfDays; ?></p>
                        <p id="hotelDailyRate">Daily Rate: R<?= $hotels[$firstHotelName] -> dailyRate; ?> per day</p>
                        <p id="total">Total: R<?= $firstTotal; ?></p>
                        <h4>Activities</h4>
                        <ul>
                            <?php foreach ($hotels[$firstHotelName] -> activities as $activity) { ?>
                                <li><?= $activity ?></li>
                            <?php } ?>
                        </ul>
                        <button id="btnBook1" name="btnBook1" class="btnBook">Book</button>
                    </div>
                    <?php if($passed == true) { ?>
                        <div class="hotelGrid">
                            <h4 id="hotelNameInfo"><?= $hotels[$secondHotelName] -> name; ?>, <?= $hotels[$secondHotelName] -> location; ?></h4>
                            <p id="noOfDays">Number of Days: <?= $secondNoOfDays; ?></p>
                            <p id="hotelDailyRate">Daily Rate: R<?= $hotels[$secondHotelName] -> dailyRate; ?> per day</p>
                            <p id="total">Total: R<?= $secondTotal; ?></p>
                            <h4>Activities</h4>
                            <ul>
                                <?php foreach ($hotels[$secondHotelName] -> activities as $activity) { ?>
                                    <li><?= $activity ?></li>
                                <?php } ?>
                            </ul>
                            <button id="btnBook2" name="btnBook2" class="btnBook">Book</button>
                        </div>   
                    <?php } else { ?>  
                        <div class="hotelGrid">
                            <h4>Please Select Another Hotel</h4>
                        </div> 
                    <?php } ?> 
                </section>
            </div>
        </main>
        <footer>
            <label>&copy; Created by Martin Louw</label>
        </footer>
    </body>
</html>
