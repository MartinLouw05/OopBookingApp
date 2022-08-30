<!DOCTYPE html>
<html>
    <head>
        <title>
            OOP Booking App
        </title>

        <?php session_start(); ?>
        <?php require('functions.php'); ?>
        <?php require('hotels.php'); ?>
        <?php //hotelsInformation(); ?>
        <link rel="stylesheet" type="text/css" href="stylesheet.css?ts=<?=time()?>">
        <script src="./functions.js" defer></script>
    </head>

    <body>
        <header>
            
        </header>
        <main>            
            <?php include "mainForm.php" ?>

            <?php if($_POST) { ?>
                <form method="post">
                    <div id="compareSection" class="compareSection">
                        <h1>Hotel Information</h1>
                        <section id="hotelInfo" class="hotelInfo">
                            <h4 id="hotelNameInfo">You are booking the <?= $hotels[$hotelName] -> name; ?>, <?= $hotels[$hotelName] -> location; ?></h4>
                            <p id="noOfDays">Number of Days: <?= $noOfDays; ?></p>
                            <p id="hotelDailyRate">Daily Rate: R<?= $hotels[$hotelName] -> dailyRate; ?> per day</p>
                            <p id="total">Total: R<?= $total; ?></p>
                            <button id="btnCompare" name="btnCompare" class="btnCompare">Compare</button>
                        </section>
                    </div>
                </form>
            <?php } ?>
        </main>
        <footer>
            <label>&copy; Created by Martin Louw</label>
        </footer>
    </body>
</html>
