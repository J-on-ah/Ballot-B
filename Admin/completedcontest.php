<?php
require('header.php');

$email = $_SESSION['email'];
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Contest Management</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="completedcontest.php">Completed Contest</a></li>
        
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
                  Completed Contest
                </h5>



                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>

                      <th scope="col">Contest Name</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Date</th>
                      <th scope="col">Starting Time</th>
                      <th scope="col">Ending Time</th>
                      <th scope="col">Instructions</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    // $sql1 = "SELECT * FROM `registration` WHERE email = '$email' ";
                    
                    // $data1 = select_data($sql1);
                    
                    // $row1 = mysqli_fetch_assoc($data1);
                    
                    // $admno = $row1['admno'];
                    
                    date_default_timezone_set('Asia/Kolkata'); // Set your desired timezone here
                    $time = date("H"); // Get the current time in HH:MM:SS format
                    



                    date_default_timezone_set('Asia/Kolkata');
                    $date = date("Y-m-d");


                    // $sql = " SELECT * FROM contest WHERE date > '$date' AND cid IN (SELECT cid FROM electoralroll WHERE admno = '$admno')";
                    $sql = "SELECT * FROM `contest` WHERE (date='$date' and etime<$time) or date<'$date' OR (status=2)";

                    // $sql="SELECT * FROM contest WHERE (status = 2) OR (date < '$time' OR (date = '$date' AND etime < $time))";	
                    // $sql="SELECT * FROM contest WHERE (status = 2) OR (date < '$time' OR (date = '$date' AND etime < $time))OR (cid IN (SELECT cid FROM electoralroll WHERE candidateid != 0 AND admno ='$admno'))";
                    

                    $data = select_data($sql);

                    $n = 1;

                    while ($row = mysqli_fetch_assoc($data)) {

                      $stime = $row['stime'] . ":00";
                      $etime = $row['etime'] . ":00";


                      ?>
                      <tr>
                        <th scope='row'>
                          <?php echo $n++; ?>
                        </th>

                        <td>
                          <?php echo $row['cname'] ?>
                        </td>
                        <td>
                          <?php echo $row['desig'] ?>
                        </td>
                        <td>
                          <?php echo $row['date'] ?>
                        </td>
                        <td>
                          <?php echo convertTime($stime); ?>
                        </td>
                        <td>
                          <?php echo convertTime($etime); ?>
                        </td>
                        <td> <?php echo $row['ins'] ?></td>

                        <td>
                          <div class="btn-group">
                            <a href="viewresult.php?cid=<?php echo $row['cid']; ?>"
                              class="btn btn-success btn-sm">View Result</a>
                          </div>
                        </td>
                      </tr>

                      <?php
                    }
                    ?>

                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>

</main><!-- End #main -->


<?php

echo "admin :";
echo $email;

?>




</div>
</section>

</main><!-- End #main -->

<?php


require('footer.html');

?>