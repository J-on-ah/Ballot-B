

<html>
    <head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
    </head>
   
    <body>

<?php

require '../../connect.php';


$candidateid=$_GET['candidateid'];

$cid=$_GET['cid'];

$sql="DELETE FROM `candidates` WHERE candidateid='$candidateid'";

delete_data($sql);

?>
<script>
 
 let timerInterval
Swal.fire({
  icon:'success',
  title: 'Processing',
  html: 'removing the profile',
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
    window.location.replace('../managecontest.php?cid=<?php echo $cid ?>');

  }
});
</script>
    </body>
</html>


