
<?php

$email = $_GET['email'];


?>
<?php
$to = $email;
$subject = 'Booking Confirmation';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: ballotbox4442@gmail.com' . "\r\n";

$message = file_get_contents('template.html');


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
        text: 'Registration Success...',
        didClose: () => {
          window.location.replace('../index.html');
        }
      });
    </script>

  </body>

  </html>
  <?php
  return true;


?>
