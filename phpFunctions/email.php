<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require '../vendor/autoload.php';  
    
    session_start();

    //Get Hotel's Information and Other Variables
    $hotels = file_get_contents('../hotels.json');
    $hotels = json_decode($hotels); 

    $firstName = $_SESSION['firstName'];
    $surname = $_SESSION['surname'];
    $emailAddress = $_SESSION['emailAddress'];

    $firstHotelName = $_SESSION['hotelName'];
    $firstNoOfDays = $_SESSION['noOfDays'];
    $firstTotal = $_SESSION['total'];

    $secondHotelName = $_SESSION['secondHotelName'];
    $secondNoOfDays = $_SESSION['secondNoOfDays'];
    $secondTotal = $_SESSION['secondTotal'];

    //Book Buttons Clicked
    if (array_key_exists('btnBook1', $_POST)) { 
        //Set Variable's Values       
        $hotelChosen = $_POST['btnBook1'];
        $noOfDays = $firstNoOfDays;
        $total = $firstTotal;
        $dailyRate = $hotels[$hotelChosen] -> dailyRate;

        createEmail($hotelChosen, $noOfDays, $total, $dailyRate);
    }

    if (array_key_exists('btnBook2', $_POST)) {  
        //Set Variable's Values        
        $hotelChosen = $_POST['btnBook2'];
        $noOfDays = $secondNoOfDays;
        $total = $secondTotal;
        $dailyRate = $hotels[$hotelChosen] -> dailyRate;

        createEmail($hotelChosen, $noOfDays, $total, $dailyRate);
    }

    //Create and Send Email to User
    function createEmail($hotelChosen, $noOfDays, $total, $dailyRate) {
        try {
            $hotels = file_get_contents('../hotels.json');
            $hotels = json_decode($hotels); 
            $firstName = $_SESSION['firstName'];
            $surname = $_SESSION['surname'];
            $emailAddress = $_SESSION['emailAddress'];
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            //Server settings
            //Add your own personal information below
            $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                     // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = '';                                     // SMTP username
            $mail->Password   = '';                                     // SMTP password
            $mail->SMTPSecure = false;                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($emailAddress, $firstName);               // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Hotel Reservation';
            $mail->Body    = 'Dear ' . $firstName. ' ' . $surname . '<br>
                            <br>
                            Please find herewith attached your hotel reservation for the ' . $hotels[$hotelChosen]->name . ' hotel, ' . $hotels[$hotelChosen]->location.'. <br>
                            Number of Days Reserved: ' . $noOfDays . ' days<br>
                            Hotel Daily Fee: R ' . $dailyRate . '<br>
                            <hr>
                            Subtotal: R ' . $total . '<br>
                            <br>
                            Please contact our customer support if you encounter any problems with your reservation.<br>
                            Tel: 012 345 6789<br>
                            Email: notAReal@email.com<br>
                            <br>
                            Regards<br>
                            Hotel Management';

            $mail->send();
            echo "  <script>
                        alert('Email Successfully Sent.  Please Check Your Emails');
                        window.location.href = 'index.php';
                    </script>";
        } 
        catch (Exception $e) {
            echo "  <script>
                        alert('Email Could Not be Sent.  Please Try Again. {$mail->ErrorInfo}');
                        window.location.href = 'comparePage.php';
                    </script>";
        }
    }  
?>