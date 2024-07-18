<?php

$dbname="onlinevoting";
$conn=mysqli_connect("localhost","root","",$dbname);

// Check connection
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}


function select_data($sql)
{

  global $conn;
  $res = mysqli_query($conn, $sql);
  if ($res)
    return $res;
  else
    return False;
}

function insert_data($sql)
{
  
  global $conn;
  $res = mysqli_query($conn, $sql);
  if ($res)
    return True;
  else
    return False;
}

function delete_data($sql)
{
  
  global $conn;
  $res = mysqli_query($conn, $sql);
  if ($res)
    return True;
  else
    return False;
}

function update_data($sql)
{
  
  global $conn;
  $res = mysqli_query($conn, $sql);
  if ($res)
    return True;
  else
    return False;
}

function count_data($sql)
{
  global $conn;
  $res = mysqli_query($conn, $sql);
  if ($res)
    return mysqli_num_rows($res);
  else
    return False;
}


function convertTime($railwayTime) {
  // Split the input time into hours and minutes
  list($hour, $minute) = explode(':', $railwayTime);

  // Check if the hour is greater than or equal to 12
  if ($hour >= 12) {
      $period = 'PM';
      // Convert 24-hour format to 12-hour format for hours
      if ($hour > 12) {
          $hour -= 12;
      }
  } else {
      $period = 'AM';
      // Special case: Midnight (00:00) should be 12:00 AM
      if ($hour == 0) {
          $hour = 12;
      }
  }

  // Format the result as HH:MM AM/PM
  return sprintf("%02d:%02d %s", $hour, $minute, $period);
}



?>


