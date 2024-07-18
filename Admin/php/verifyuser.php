<html>
    <head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
    </head>
   
    <body>

<?php

require '../../connect.php';


    $email=$_GET['email'];
    $s=$_GET['s'];
 
    if($s==1)
    {

$sql="UPDATE `login` SET `status`='$s' WHERE  email='$email'";

update_data($sql);

?>
<script>
 
 let timerInterval
Swal.fire({
  icon:'success',
  title: 'Processing!',
  html: 'Approving user',
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
    window.location.replace('../userlist.php');

  }
});
</script>

<?php
}
else
{
  $sql="UPDATE `login` SET `status`='$s' WHERE  email='$email'";

  update_data($sql);
  
  ?>
  <script>
   
   let timerInterval
  Swal.fire({
    icon:'success',
    title: 'Processing!',
    html: 'rejecting user',
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
      window.location.replace('../rejectedusers.php');
  
    }
  });
  </script>
  <?php

}


?>
    </body>
</html


