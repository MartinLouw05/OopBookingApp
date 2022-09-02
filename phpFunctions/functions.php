<?php
    session_start();
    
    $hotels = file_get_contents('../hotels.json');
    $hotels = json_decode($hotels);  
    $date = date('Y-m-d');
    $passed = false;

    if (isset($_POST['submit'])) {

        $firstName = $_POST['firstName'];
        $surname = $_POST['surname'];
        $emailAddress = $_POST['emailAddress'];
        $hotelName = $_POST['hotelName'];
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
            $_SESSION['hotelName'] = $hotelName;
            $_SESSION['checkInDate'] = $checkInDate;
            $_SESSION['checkOutDate'] = $checkOutDate;
            $noOfDays = $_SESSION['noOfDays'];
    
            calculateTotal();
    
            $total = $_SESSION['total'];
        }
    }

    function calculateNoOfDays($checkInDate, $checkOutDate) {
        $timestamp1 = strtotime($checkInDate);
        $timestamp2 = strtotime($checkOutDate);
        $noOfDays = $timestamp2 - $timestamp1;
        $noOfDays = $noOfDays/(24*60*60);

        $_SESSION['noOfDays'] = $noOfDays;
    }

    function calculateTotal() {
        $hotels = file_get_contents('../hotels.json');
        $hotels = json_decode($hotels);  

        $hotelId = $_SESSION['hotelName'];
        $dailyRate = $hotels[$hotelId] -> dailyRate;
        $total = $dailyRate * $_SESSION['noOfDays'];
        
        $_SESSION['total'] = $total;
    }

    if (array_key_exists('btnCompare', $_POST)) {        
        header("Location: comparePage.php");
    }
?>