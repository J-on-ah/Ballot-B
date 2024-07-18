<html>
    <head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
    </head>
   
    <body>

<?php

require '../../connect.php';

$cname=$_POST['cname'];
$desig=$_POST['desig'];
$date=$_POST['date'];
$stime=$_POST['stime'];
$etime=$_POST['etime'];
$ins=$_POST['ins'];


$sql="INSERT INTO `contest`( `cname`, `desig`, `date`, `stime`, `etime`, `ins`) VALUES ('$cname','$desig','$date','$stime','$etime','$ins')";

insert_data($sql);


?>
<script>
 
 let timerInterval
Swal.fire({
  icon:'success',
  title: 'processing!',
  html: 'creating contest',
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
    window.location.replace('../upcomingcontest.php');

  }
});
</script>
    </body>
</html>

