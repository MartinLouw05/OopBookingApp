<?php session_start(); ?>

<section id="compareSection" class="compareSection">
    <h1>Hotel Information</h1>
    <div id="hotelInfo" class="hotelInfo">
        <h4 id="hotelNameInfo">You are booking the <?= $hotels[$hotelName] -> name; ?>, <?= $hotels[$hotelName] -> location; ?></h4>
        <p id="noOfDays">Number of Days: <?= $noOfDays; ?></p>
        <p id="hotelDailyRate">Daily Rate: R<?= $hotels[$hotelName] -> dailyRate; ?> per day</p>
        <p id="total">Total: R<?= $total; ?></p>
        <button id="compare" class="btnCompare">Compare</button>
    </div>
</section>
