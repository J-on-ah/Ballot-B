
<html>
    <head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
    </head>
   
    <body>



<?php

session_start();

require '../../connect.php';


$email=$_SESSION['email'];
$title=$_POST['title'];
$priority=$_POST['priority'];
$dis=$_POST['dis'];

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d"); 

echo "$title";

$reply=0;

$sql="INSERT INTO `complaint`(`title`, `dis`, `priority`, `reply`, `date`, `email`) VALUES ('$title','$dis','$priority','$reply','$date','$email')";

insert_data($sql);


?>

<script>
 
 let timerInterval
Swal.fire({
  icon:'success',
  title: 'processing!',
  html: 'complaint registered',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    window.location.replace('../viewcomplaint.php');

  }
});
</script>
    </body>
</html>