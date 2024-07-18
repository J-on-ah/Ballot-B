<html>
    <head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
    </head>
   
    <body>

    <?php

    session_start();

require "../../connect.php";

$email=$_SESSION['email'];


$name=$_POST['fullName'];
$phn=$_POST['phone'];
$course=$_POST['course'];
$sem=$_POST['sem'];
$rollno=$_POST['roll_no'];



$sql="UPDATE `registration` SET `full_name`='$name',`phn`='$phn',`course`='$course',`sem`='$sem',`roll_no`='$rollno' WHERE  email='$email'";

update_data($sql);

?>
<script>
 
 let timerInterval
Swal.fire({
  icon:'success',
  title: 'Updating!',
  html: 'updating the profile',
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
    window.location.replace('../profile.php');

  }
});
</script>
    </body>
</html