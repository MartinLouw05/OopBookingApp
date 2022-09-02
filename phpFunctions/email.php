<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    /*use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;*/

    // Load Composer's autoloader
    /*require 'vendor/autoload.php';*/

    // Instantiation and passing `true` enables exceptions
    /*$mail = new PHPMailer(true);*/

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
        //header("Location: index.php");
    }

    if (array_key_exists('btnBook2', $_POST)) {  
        //Set Variable's Values        
        $hotelChosen = $_POST['btnBook2'];
        $noOfDays = $secondNoOfDays;
        $total = $secondTotal;
        $dailyRate = $hotels[$hotelChosen] -> dailyRate;

        createEmail($hotelChosen, $noOfDays, $total, $dailyRate);
        //header("Location: index.php");
    }

    //Create and Send Email to User
    function createEmail($hotelChosen, $noOfDays, $total, $dailyRate) {
        /*try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'b2d7d1788a8c08';                       // SMTP username
            $mail->Password   = 'de45537a61dbc0';                       // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('louw.martin05@gmail.com', 'Mailer');
            $mail->addAddress($emailAddress, '$firstName');             // Add a recipient
            $mail->addAddress('louw.martin05@gmail.com');               // Name is optional

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Hotel Reservation';
            $mail->Body    = 'Dear $firstName $surname<br>
                            <br>
                            Please find herewith attached your hotel reservation for the $hotels[$hotelChosen]->name hotel, $hotels[$hotelChosen]->location.<br>
                            Number of Days: $noOfDays<br>
                            Hotel Daily Fee: $dailyRate<br>
                            Total: $total<br>
                            <br>
                            Please contact our customer support if you encounter any problems with your reservation.<br>
                            Tel: 012 345 6789<br>
                            Email: notAReal@email.com<br>
                            <br>
                            Regards<br>
                            Hotel Management'; 
            $mail->AltBody = 'Dear $firstName $surname<br><br>Please find herewith attached your hotel reservation for the $hotels[$hotelChosen]->name hotel.<br><br>Regards<br>Hotel Management';

            $mail->send();
            echo "<script>alert('Email Successfully Sent.  Please Check Your Emails');</script>";
        } 
        catch (Exception $e) {
            echo "<script>alert('Email Could Not be Sent.  Please Try Again.  Error: <?php {$mail->ErrorInfo}; ?>');</script>";
        }*/
    }   
?>