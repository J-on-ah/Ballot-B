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


$admno=$_POST['admno'];
$id=$_POST['id'];
$candidateid=0;
$status=1;


$sql = "SELECT * FROM `registration` WHERE  admno = '$admno' ";


$count = count_data($sql);

// check row
if ($count == 0)
{
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'INVALID USER',
            didClose: () => {
                window.location.replace('../managecontest.php?cid=<?php echo $id;?>');
            }
        });
    </script>
<?php
}

else
{

$sql1 = "SELECT * FROM `electoralroll` WHERE admno = '$admno' AND cid = '$id' ";

$count1 = count_data($sql1);

if ($count1 != 0)

{
    ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'USER ALREADY ADDED',
                    didClose: () => {
                        window.location.replace('../managecontest.php?cid=<?php echo $id;?>');
                    }
                });
            </script>
        <?php
}

else
{

$sql="INSERT INTO `electoralroll`(`admno`, `cid`, `candidateid`,  `status`) VALUES ('$admno','$id','$candidateid','$status')";

insert_data($sql);

?>
<script>
 
 let timerInterval
Swal.fire({
  icon:'success',
  title: 'Processing!',
  html: 'adding voter',
  timer: 800,
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
    window.location.replace('../managecontest.php?cid=<?php echo $id;?>');

  }
});
</script>

<?php
}
}

?>
    </body>
</html


