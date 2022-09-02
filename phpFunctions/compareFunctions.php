<?php
    session_start();

    $hotels = file_get_contents('../hotels.json');
    $hotels = json_decode($hotels); 
    $date = date('Y-m-d');
    $passed = false; 

    $firstName = $_SESSION['firstName'];
    $surname = $_SESSION['surname'];
    $emailAddress = $_SESSION['emailAddress'];
    $firstHotelName = $_SESSION['hotelName'];
    $firstNoOfDays = $_SESSION['noOfDays'];
    $firstTotal = $_SESSION['total'];

    if (isset($_POST['submit'])) { 
        $firstName = $_POST['firstName'];
        $surname = $_POST['surname'];
        $emailAddress = $_POST['emailAddress'];
        $secondHotelName = $_POST['hotelName'];
        $checkInDate = $_POST['checkInDate'];
        $checkOutDate = $_POST['checkOutDate'];

        if ($checkInDate < $date) {
            echo "<script>alert('Check-in Date has Already Passed.  Please Try Again');</script>";
        } 
        elseif ($checkInDate > $checkOutDate) {
            echo "<script>alert('Check-out Date is Before Check-in Date.  Please Try Again');</script>";
        }
        elseif ($checkInDate == $checkOutDate) {
            echo "<script>alert('Check-out Date is the Same Day as Check-in Date.  Please Try Again');</script>";
        }
        else {
            $passed = true;

            calculateNoOfDays($checkInDate, $checkOutDate);

            $_SESSION['firstName'] = $firstName;
            $_SESSION['surname'] = $surname;
            $_SESSION['emailAddress'] = $emailAddress;
            $_SESSION['secondHotelName'] = $secondHotelName;
            $_SESSION['checkInDate'] = $checkInDate;
            $_SESSION['checkOutDate'] = $checkOutDate;
            $secondNoOfDays = $_SESSION['secondNoOfDays'];
    
            calculateTotal();
    
            $secondTotal = $_SESSION['secondTotal'];
        }
    }

    function calculateNoOfDays($checkInDate, $checkOutDate) {
        $timestamp1 = strtotime($checkInDate);
        $timestamp2 = strtotime($checkOutDate);
        $secondNoOfDays = $timestamp2 - $timestamp1;
        $secondNoOfDays = $secondNoOfDays/(24*60*60);

        $_SESSION['secondNoOfDays'] = $secondNoOfDays;
    }

    function calculateTotal() {
        $hotels = file_get_contents('../hotels.json');
        $hotels = json_decode($hotels);  

        $hotelId = $_SESSION['secondHotelName'];
        $dailyRate = $hotels[$hotelId] -> dailyRate;
        $secondTotal = $dailyRate * $_SESSION['secondNoOfDays'];
        
        $_SESSION['secondTotal'] = $secondTotal;
    }
?>