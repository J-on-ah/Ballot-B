<html>
<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

<?php

require '../connect.php';


$name=$_POST['name'];
$email=$_POST['Email'];
$phn=$_POST['phn'];
$admno=$_POST['admno'];
$course=$_POST['course'];
$sem=$_POST['sem'];
$rollno=$_POST['rollno'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];


// check email existance

$count="SELECT * FROM `registration` WHERE email='$email'";

$count_result = count_data($count);

// check count of row

if ($count_result == 0) 
{
    if ($pass == $cpass) 
    {
        $query = "INSERT INTO registration(full_name, email, phn, admno, course, sem, roll_no) VALUES ('$name','$email','$phn','$admno','$course','$sem','$rollno')";
        
        $result = insert_data($query);

        if ($result) 
        {
           
            $usertype=1;
            $status=0;

            $sql1="INSERT INTO login(`email`, `password`, `status`, `usertype`) VALUES ('$email','$pass','$status','$usertype')";

            if(insert_data($sql1))
            {
                ?>
                <script>
                   
                            window.location.replace('mail.php?email=<?= urlencode($email) ?>');
                       
                </script>
            <?php
            }
            else
            {
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Login Error',
                        didClose: () => {
                            window.location.replace('signup.html');
                        }
                    });
                </script>
            <?php
                
            }
        } 
        else 
        {
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Registration Failed',
                    didClose: () => {
                        window.location.replace('signup.html');
                    }
                });
            </script>
        <?php
            
        }
    } 
    else 
    {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'The passwords you entered do not match.',
                didClose: () => {
                    window.location.replace('signup.html');
                }
            });
        </script>
    <?php
        
    }
} 
else 
{
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'The email address you entered is already in use.',
            didClose: () => {
                window.location.replace('signup.html');
            }
        });
    </script>
<?php
    
}

?>

    
</body>
</html>