<?php
require('header.php');

$email = $_SESSION['email'];
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Published Results</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Published Results</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Results
                </h5>


                <?php

$sql1 = "SELECT * FROM `registration` WHERE email = '$email' ";

$data1 = select_data($sql1);

$row1 = mysqli_fetch_assoc($data1);

$admno = $row1['admno'];

date_default_timezone_set('Asia/Kolkata'); // Set your desired timezone here
$time = date("H"); // Get the current time in HH:MM:SS format


date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");
//  $sql = "SELECT * FROM `contest` WHERE ((date='$date' and etime<$time) or date>'$date') AND cid IN (SELECT cid FROM electoralroll WHERE admno = '$admno')";
// $sql = "SELECT * FROM contest WHERE (status = 2) OR (date < '$time' OR (date = '$date' AND etime < $time))OR (cid IN (SELECT cid FROM electoralroll WHERE candidateid != 0 AND admno ='$admno'))";

 $sql = "SELECT * FROM `contest` WHERE ((date='$date' and etime<$time) or date<'$date') AND cid IN (SELECT cid FROM electoralroll WHERE admno = '$admno') OR (cid IN (SELECT cid FROM electoralroll WHERE candidateid != 0 AND admno ='$admno'))";

// echo $sql;

$data = select_data($sql);

$n = 1;

while ($row = mysqli_fetch_assoc($data)) {

  $stime = $row['stime'] . ":00";
  $etime = $row['etime'] . ":00";

   $result_status = $row['result_status'];

                        if ($result_status == 0) {

  ?>

                   <!-- Card with titles, buttons, and links -->
          <div class="card">
            <div class="card-body">

          
              <h5 class="card-title"><?php echo $row['cname']; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['desig']; ?></h6>
              <p class="card-text">The result is still counting.please wait.</p>
              <button class="btn btn-primary" type="button" disabled>
                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                              Processing...
                            </button>
              
            </div>
          </div><!-- End Card with titles, buttons, and links -->

          <?php  } else if ($result_status == 1) {  ?>

              <!-- Card with titles, buttons, and links -->
          <div class="card">
            <div class="card-body">

          
              <h5 class="card-title"><?php echo $row['cname']; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['desig']; ?></h6>
              <p class="card-text">The result is now available. Click here to view it.</p>
              <div class="btn-group">
                                <a href="viewresult.php?cid=<?php echo $row['cid']; ?>" class="btn btn-success btn-large">View
                                  Result</a>
                              </div>
              
            </div>
          </div><!-- End Card with titles, buttons, and links -->


          <?php  } 
}
          ?>

               

              </div>
            </div>

          </div>
        </div>
      </section>

</main><!-- End #main -->

<script>
  // JavaScript to disable the button
  document.getElementById("disableButton").onclick = function (event) {
    event.preventDefault();
  };
</script>


<?php

echo "user :";
echo $email;

?>


</div>
</section>

</main><!-- End #main -->

<?php

require('footer.html');

?>