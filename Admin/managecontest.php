<?php

require 'header.php';

$email = $_SESSION['email'];
?>

<main id="main" class="main">



  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="completedcontest.php">Completed Contest</a></li>
                <li class="breadcrumb-item active">Manage Contest</li>
                
                
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
                  Contest
                </h5>



                <?php

                $cid = $_GET['cid'];
                echo "Contest ID:" . $cid;
                ?>

              </div>
            </div>

          </div>
        </div>
      </section>

      <section class="section">
        <div class="row">

          <div class="col-md-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add candidates</h5>

                <!-- General Form Elements -->
                <form action="php/addcandidateaction.php" method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <input type="hidden" name="id" value="<?php echo $cid; ?>">

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="admno" placeholder="Admission no">
                    </div>
                  </div>

                  <div class="row mb-6">

                    <div class="col-sm-10">
                    <input type="file" class="form-control" placeholder="symbol" name="fileToUpload" id="fileToUpload" accept="image/*" required>
                    </div>
                  </div>

                  <br>


                  <div class="row mb-3">

                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Add candidate</button>
                    </div>
                  </div>

                </form><!-- End General Form Elements -->
              </div>
            </div>
          </div>


          <div class="col-md-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Candidate List</h5>


                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">SLno</th>
                      <th scope="col">Symbol</th> 
                      <th scope="col">Name</th>
                      <th scope="col">Admission no</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <?php
                  $sql1 = "select r.full_name,e.* from candidates e,registration r where e.cid=$cid and r.admno=e.admno;";
                  $data = select_data($sql1);
                  $n = 1;
                  while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                      <th scope="row">
                        <?php echo $n++ ?>
                      </th>

                      <td>
                        <img src=" <?php echo "../uploads/candidate/candidate_".$row['candidateid'].".jpg" ?>"  height="40px" alt="">
                       
                      </td>
                      <td>
                        <?php echo $row['full_name'] ?>
                      </td>
                      <td>
                        <?php echo $row['admno'] ?>
                      </td>

                      
                      <td>
                        <div class="btn-group">
                          <a href="php/removecandidate.php?candidateid=<?php echo $row['candidateid']; ?>&cid=<?php echo $cid; ?>"
                            class="btn btn-success btn-sm">Remove</a>
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

    </div>
    </div>

    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Voters</h5>

              <!-- General Form Elements -->
              <form action="php/addvoteraction.php" method="POST">
                <div class="row mb-3">
                  <input type="hidden" name="id" value="<?php echo $cid; ?>">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="admno" placeholder="Admission no">
                  </div>

                </div>
                <div class="row mb-3">

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="vname" placeholder="Name">
                  </div>
                </div>

                <div class="row mb-3">

                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add voter</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->



            </div>
          </div>

        </div>

        <div class="col-md-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Voters List</h5>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">SLno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Admission no</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql1 = "select r.full_name,e.* from electoralroll e,registration r where e.cid=$cid and r.admno=e.admno;";
                  $data = select_data($sql1);
                  $n = 1;
                  while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                      <th scope="row">
                        <?php echo $n++ ?>
                      </th>
                      <td>
                        <?php echo $row['full_name'] ?>
                      </td>
                      <td>
                        <?php echo $row['admno'] ?>
                      </td>
                      <td>
                        <div class="btn-group">

                          <a href="php/removevoter.php?er_id=<?php echo $row['er_id']; ?>&cid=<?php echo $cid; ?>"
                            class="btn btn-success btn-sm">Remove</a>
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



    </div>
    </div>

    </div>

</main><!-- End #main -->


<?php

echo "admin :";
echo $email;

?>

</div>
</section>

</main><!-- End #main -->

<?php

require 'footer.html';

?>