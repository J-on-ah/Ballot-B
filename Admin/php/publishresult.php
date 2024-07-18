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

    $result_status = $_GET['s'];



    $sql = "UPDATE `contest` SET `result_status`='$result_status' WHERE cid = '$cid'";


    update_data($sql);


    if ($result_status == 1) {

        ?>


        <script>

            let timerInterval
            Swal.fire({
                icon: 'success',
                title: 'Publishing....!',
                html: 'Result Publishing',
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
                    window.location.replace('../viewresult.php?cid=<?php echo $cid; ?>');

                }
            });

        </script>


        <?php
    } else if ($result_status == 0) {

        ?>

            <script>

                let timerInterval
                Swal.fire({
                    icon: 'success',
                    title: 'Revoking....!',
                    html: 'Revoking Result',
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
                        window.location.replace('../viewresult.php?cid=<?php echo $cid; ?>');

                    }
                });

            </script>

        <?php
    }
    ?>




</body>

</html>