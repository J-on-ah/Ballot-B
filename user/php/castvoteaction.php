<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

    <?php
    require('../../connect.php');

    $cid = $_GET['cid'];
    $candidateid = $_GET['candidateid'];
    $email = $_GET['email'];

    $sql2 = "SELECT * FROM `registration` WHERE email='$email'";
    $data2 = select_data($sql2);
    $row2 = mysqli_fetch_assoc($data2);

    $admno = $row2['admno'];


    $sql1 = "SELECT * FROM `electoralroll` WHERE  admno = '$admno' AND cid = '$cid'";
    $data1 = select_data($sql1);
    $row = mysqli_fetch_assoc($data1);

    $status = $row['status'];

    // $status1 = $row['status'];
    
    if ($status == 1) {


        $status = 3;
        $sql = "SELECT * FROM `registration` WHERE email='$email'";
        $data = select_data($sql);
        $row = mysqli_fetch_assoc($data);

        $admno = $row['admno'];


        $sql1 = "UPDATE `electoralroll` SET `candidateid`='$candidateid',`status` = '$status' WHERE admno = '$admno' AND cid = '$cid'";



        update_data($sql1);

        ?>
        <script>

            let timerInterval
            Swal.fire({
                icon: 'success',
                title: 'voting....!',
                html: 'voting success',
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

    <?php } else { ?>

        <script>

            let timerInterval
            Swal.fire({
                icon: 'error',
                title: 'permission dined!',
                html: 'already voted',
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
                    window.location.replace('../castvote.php?cid=<?php echo $cid; ?>');

                }
            });

        </script>
    <?php } ?>




</body>

</html>