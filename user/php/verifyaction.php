<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

    <?php
    require $_SERVER['DOCUMENT_ROOT'] . '/ballot/connect.php';

    $cid = $_POST['cid'];

    $otp = $_POST['otp'];

    $newotp = $_POST['newotp'];



    if ($otp == $newotp) {

        ?>

        <script>
            let timerInterval
            Swal.fire({
                icon: 'success', // Corrected 'success' icon
                title: 'Success!',
                html: 'OTP verified',
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
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.replace('../castvote.php?cid=<?php echo $cid; ?>');
                }
            });
        </script>


        <?php

    } else {
        ?>


        <script>

            let timerInterval
            Swal.fire({
                icon: 'error',
                title: 'Fail!',
                html: 'otp Dismatch',
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
                    window.location.replace('../activecontest.php?cid=<?php echo $cid; ?>');

                }
            });

        </script>


        <?php

    }

    ?>











</body>

</html>