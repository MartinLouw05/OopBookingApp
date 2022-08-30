<?php session_start(); ?>

<section id="compareSection" class="compareSection">
    <h1>Hotel Information</h1>
    <div id="hotelInfo" class="hotelInfo">
        <h4 id="hotelNameInfo">You are booking the <?= $hotelName; ?> hotel</h4>
        <p id="noOfDays">No of Days: <?= $noOfDays; ?></p>
        <p id="hotelDailyRate"></p>
        <p id="total"></p>
        <button id="compare">COMPARE</button>
    </div>
</section>
