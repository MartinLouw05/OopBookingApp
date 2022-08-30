<div id="compareTwoSection" class="compareTwoSection">
                    <h1>Hotels Information</h1>
                    <section class="hotelsInfo">
                        <div class="hotelGrid">
                            <h4 id="hotelNameInfo">You are booking the <?= $hotels[$hotelName] -> name; ?>, <?= $hotels[$hotelName] -> location; ?></h4>
                            <p id="noOfDays">Number of Days: <?= $noOfDays; ?></p>
                            <p id="hotelDailyRate">Daily Rate: R<?= $hotels[$hotelName] -> dailyRate; ?> per day</p>
                            <p id="total">Total: R<?= $total; ?></p>
                            <h4>Activities</h4>
                            <ul>
                                <?php foreach ($hotels[$hotelName] -> activities as $activity) { ?>
                                    <li><?= $activity ?></li>
                                <?php } ?>
                            </ul>
                            <button id="btnBook1" name="btnBook1" class="btnBook">Book</button>
                        </div>
                        <div class="hotelGrid">
                            <h4 id="hotelNameInfo">You are booking the <?= $hotels[$hotelName] -> name; ?>, <?= $hotels[$hotelName] -> location; ?></h4>
                            <p id="noOfDays">Number of Days: <?= $noOfDays; ?></p>
                            <p id="hotelDailyRate">Daily Rate: R<?= $hotels[$hotelName] -> dailyRate; ?> per day</p>
                            <p id="total">Total: R<?= $total; ?></p>
                            <h4>Activities</h4>
                            <ul>
                                <?php foreach ($hotels[$hotelName] -> activities as $activity) { ?>
                                    <li><?= $activity ?></li>
                                <?php } ?>
                            </ul>
                            <button id="btnBook2" name="btnBook2" class="btnBook">Book</button>
                        </div>                    
                    </section>
                </div>