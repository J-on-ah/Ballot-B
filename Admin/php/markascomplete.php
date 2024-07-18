<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

    <?php
    require('../connect.php');

    $cid = $_GET['cid'];
   
   

   
    $status = 2;
      

    $sql = "UPDATE `contest` SET `status`='$status' WHERE cid = '$cid'";



        update_data($sql);

        ?>
        <script>

            let timerInterval
            Swal.fire({
                icon: 'success',
                title: 'processing....!',
                html: 'Marking as complete',
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
                    window.location.replace('../completedcontest.php?cid=<?php echo $cid; ?>');

                }
            });

        </script>


</body>

</html>