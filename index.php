<?php
    session_start();

    require('functions.php');
?>

<style>
    <?php include './stylesheet.css'; ?>
</style>

<section>
    <div class="gridArea">
        <h1>Hotel Reservations</h1>

        <form method="post">
            <label for='firstName' class="lblFirstName">First Name:</label><br>
                <input type='text' id="firstName" name='firstName' placeholder="Please Enter Your First Name" required><br>

            <label for='lastName' class="lblLastName">Surname:</label><br>
                <input type='text' id="lastName" name='lastName' placeholder="Please Enter Your Surname" required><br>

            <label for='emailAddress' class="lblEmailAddress">Email Address:</label><br>
                <input type='email' id="emailAddress" name='emailAddress' placeholder="Please Enter Your Email Address" required><br>

            <label for='checkInDate' class="lblCheckInDate">Check-in Date:</label><br>
                <input type='date' id="checkInDate" name='checkInDate' required><br>

            <label for='checkOutDate' class="lblCheckOutDate">Check-out Date:</label><br>
                <input type='date' id="checkOutDate" name='checkOutDate' required><br>

            <label for='hotelName' class="lblHotelName">Hotel:</label><br>
                <select id="hotelName" name='hotelName' required>
                    <option value="" selected>Please Select a Hotel</option>
                </select><br>

            <input type="submit" name="submit" class="btnSubmit">
        </form>
    </div>

    <div class="gridArea">
        <h1>Hotel Information</h1>

        <form action="index.php" class="frmInfo">           
            <a href="comparePage.php">compare page</a>
        </form>
    </div>
</section>


<!--
<form method="post">
    <h1>Hotel Reservations</h1>

    <label for='firstName' class="lblFirstName">First Name:</label><br>
        <input type='text' id="firstName" name='firstName' placeholder="Please Enter Your First Name" required><br>

    <label for='lastName' class="lblLastName">Surname:</label><br>
        <input type='text' id="lastName" name='lastName' placeholder="Please Enter Your Surname" required><br>

    <label for='emailAddress' class="lblEmailAddress">Email Address:</label><br>
        <input type='email' id="emailAddress" name='emailAddress' placeholder="Please Enter Your Email Address" required><br>

    <label for='checkInDate' class="lblCheckInDate">Check-in Date:</label><br>
        <input type='date' id="checkInDate" name='checkInDate' required><br>

    <label for='checkOutDate' class="lblCheckOutDate">Check-out Date:</label><br>
        <input type='date' id="checkOutDate" name='checkOutDate' required><br>

    <label for='hotelName' class="lblHotelName">Hotel:</label><br>
        <select id="hotelName" name='hotelName' required>
            <option value="" selected>Please Select a Hotel</option>
        </select><br>

    <input type="submit" name="submit" class="btnSubmit">
</form>

<form action="index.php" class="frmInfo">
    <h1>Hotel Information</h1>

    <a href="comparePage.php">compare page</a>
</form>
-->