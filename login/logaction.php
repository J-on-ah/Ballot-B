<?php
// Start the session
session_start();
?>

<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>


<body>
    <?php

    require "../connect.php";



    $email = $_POST['Email'];
    $pass = $_POST['pass'];






    // check email and password existance
    
    $count1 = "SELECT * FROM `login` WHERE email='$email' AND password='$pass'";

    $count_result1 = count_data($count1);

    // check row
    if ($count_result1 == 0) {
        ?>
        <script>
            Swal.fire({
                icon: 'error',

                text: 'invalid user',
                didClose: () => {
                    window.location.replace('index.html');
                }
            });
        </script>
        <?php

    } else {

        $_SESSION['email'] = $email;

        $sql2 = "SELECT * FROM `login` WHERE email='$email'";

        $res = select_data($sql2);

        $row = mysqli_fetch_assoc($res);

        if ($row['usertype'] == 1) //user
        {
            if ($row['status'] == 1) {
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'User Login Successful',
                        didClose: () => {
                            window.location.replace('../user/index.php');
                        }
                    });
                </script>
                <?php


            } else if ($row['status'] == 0) {
                ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            text: 'User under Verification',
                            didClose: () => {
                                window.location.replace('index.html');
                            }
                        });
                    </script>
                <?php
            } else if ($row['status'] == -1) {
                ?>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                text: 'User Verification failed',
                                didClose: () => {
                                    window.location.replace('../index.html');
                                }
                            });
                        </script>
                <?php
            } else if ($row['status'] == -2) {
                ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    text: 'User Access Denied',
                                    didClose: () => {
                                        window.location.replace('../index.html');
                                    }
                                });
                            </script>
                <?php
            }



        } else if ($row['usertype'] == 0) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'User Login Successful',
                        didClose: () => {
                            window.location.replace('../Admin/index.php');
                        }
                    });
                </script>
            <?php
        }

    }

    ?>

</body>

</html>