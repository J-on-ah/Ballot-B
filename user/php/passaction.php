<html>

<head>
  <script type="text/javascript" src="swal/jquery.min.js"></script>
  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

  <?php

  require "../../connect.php";
  session_start();

  $email = $_SESSION['email'];


  $currentPass = $_POST['currentPass'];
  $newpass = $_POST['newpass'];
  $renewpass = $_POST['renewpass'];


  $sql = "SELECT * FROM `login` WHERE email='$email'";

  $data = select_data($sql);

  $row = mysqli_fetch_assoc($data);

  if ($row['password'] == $currentPass) {
    if ($newpass == $renewpass) {
      $sql1 = "UPDATE `login` SET `password`='$newpass' WHERE email='$email'";
      update_data($sql1);

      ?>
      <script>

        let timerInterval
        Swal.fire({
          icon: 'success',
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
      <?php

    } else if ($newpass != $renewpass) {
      ?>
        <script>
          Swal.fire({
            icon: 'error',
            text: 'Password updation failed !',
            didClose: () => {
              window.location.replace('../profile.php');
            }
          });
        </script>
      <?php
    }
  } else {
    ?>
    <script>
      Swal.fire({
        icon: 'error',
        text: 'Password updation failed !',
        didClose: () => {
          window.location.replace('../profile.php');
        }
      });
    </script>
    <?php
  }
  ?>

</body>

</html>