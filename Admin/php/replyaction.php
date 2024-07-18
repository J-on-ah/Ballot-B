<html>
    <head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
    </head>
   
    <body>

<?php

session_start();
require('../connect.php');




$email=$_SESSION['email'];

$complaintid=$_POST['complaintid'];
$reply=$_POST['reply'];
    

$sql="UPDATE `complaint` SET `reply`='$reply' WHERE compidt='$complaintid'";

update_data($sql);

?>
<script>
 
 let timerInterval
Swal.fire({
  icon:'success',
  title: 'Processing!',
  html: 'replaying...',
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
    window.location.replace('../newcomplaint.php');

  }
});
</script>
    </body>
</html


