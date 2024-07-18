<?php


session_start();

$otp = $_SESSION['otp'];
$cid = $_GET['cid'];

echo $otp;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 300px;
            /* Adjust the width as needed */
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .otp-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            /* Adjust the button's width */
        }

        .otp-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>OTP Verification</h2>
        <p>Enter the 6-digit OTP sent to your email.</p>
        <form action="php/verifyaction.php" method="post">
            <div class="form-group">
                <label for="newotp">OTP:</label>
                <input type="text" id="newotp" minlength="6" maxlength="6" name="newotp" required>
                <input type="hidden" id="cid" name="cid" value="<?php echo $cid; ?>">
                <input type="hidden" id="otp" name="otp" value="<?php echo $otp; ?>">
            </div>
            <button type="submit" class="otp-submit">Verify OTP</button>
        </form>

        <p>Didn't receive the OTP? <a href="php/mail.php?cid=<?= urlencode($cid) ?>">Resend OTP</a>
        </p>
    </div>
</body>

</html>