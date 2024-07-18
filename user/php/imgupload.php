<?php
	session_start();
	require '../../connect.php'; 
	$email=$_SESSION['email'];

	$sql1 = "SELECT * FROM `registration` WHERE email = '$email' ";

$data1 = select_data($sql1);

$row1 = mysqli_fetch_assoc($data1);

$admno = $row1['admno'];
	$user=mysqli_fetch_assoc(select_data("select img from registration where email='$email';"));
	$path="../../uploads/profile/".$user['img'];
	 if ($user['img'] != 'default.png') { 
	          unlink($path);
     } 
	$target_dir = "../../uploads/profile/";
	$imageFileType = strtolower(pathinfo(basename($_FILES["pro"]["name"]),PATHINFO_EXTENSION));
	$Filename = str_replace(['@', '.'], '', $admno) . "." . $imageFileType;
	$target_file = $target_dir . $Filename;
	if (move_uploaded_file($_FILES["pro"]["tmp_name"], $target_file)) {
		$sql=update_data("update registration set img='$Filename' where email='$email'");
		echo 1;
		exit();
	} 
	else {
		$sql=update_data("update registration set img='default.png' where email='$email'");
		echo 0;
		exit();
	}
?>