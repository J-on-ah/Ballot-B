<?php
session_start();
$email = $_SESSION['email'];
$cid = $_GET['cid'];

require 'vendor/autoload.php';

$otp = rand(100000, 999999);
$recipientEmail = $email;
$subject = "OTP";
// Email message
$message = "Hi,\n";
$message .= "Thank you for choosing Ballot Box. ";
$message .= "\n Use the following OTP to complete your Voting procedures. OTP is valid for 5 minutes\n";
$message .= "\nHere is your OTP: $otp\n";
$message .= "Regards,\nBallot Box";



$smtpHost = 'smtp.gmail.com';
$smtpPort = 587;
$smtpUsername = 'ballotbox4442@gmail.com';
$smtpPassword = 'ylwf vyqn mjtn yfgh';

// Create a PHPMailer instance

$mail = new PHPMailer\PHPMailer\PHPMailer(); // Enable SMTP
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->SMTPSecure = 'tls'; // Enable TLS encryption
$mail->Port = $smtpPort;

// Sender and recipient email addresses
$mail->setFrom($smtpUsername);
$mail->addAddress($recipientEmail);

// Email content
$mail->isHTML(false); // Set to false if your email content is plain text
$mail->Subject = $subject;
$mail->Body = $message;

// Send the email
if ($mail->send()) {

  $_SESSION['otp'] = $otp;
  ?>
  <html>

  <head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
  </head>

  <body>
    <script>
      Swal.fire({
        icon: 'success',
        text: 'OPT Send To Your Email!!!',
        didClose: () => {
          window.location.replace('../otpverification.php?cid=<?= $cid ?>');
        }
      });
    </script>

  </body>

  </html>
  <?php
  return true;
} else {
  return false;
}

?>