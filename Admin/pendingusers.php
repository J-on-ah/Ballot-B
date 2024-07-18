<?php
require('header.php');

$email=$_SESSION['email'];
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>User Management</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Pending User List</li>

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
          Pending Users
            </h5>


         
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Slno.</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone</th>
                    <th scope="col">Admission number</th>
                    <th scope="col">Course</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Roll number</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
 
                <?php 
               $sql = "SELECT * FROM `registration` WHERE email IN (SELECT email FROM `login` WHERE status = 0)";


                $data=select_data($sql);

                $n=1;

                while ($row = mysqli_fetch_assoc($data)) {
                  
                  ?>
                  <tr>
                 <th scope='row'><?php echo $n++; ?></th>
                 <td><?php echo  $row['full_name'] ?></td>
                 <td> <?php echo $row['email'] ?></td>
                 <td><?php echo $row['phn'] ?></td>
                 <td><?php echo $row['admno']?></td>
                 <td> <?php echo $row['course']  ?></td>
                 <td> <?php echo $row['sem'] ?></td>
                 <td> <?php echo  $row['roll_no'] ?> </td>
                 <td>
                      <div class="btn-group">
                        <a href="php/verifyuser.php?email=<?php echo $row['email']; ?>&s=1 " class="btn btn-success btn-sm">Approve</a>
                        <a href="php/verifyuser.php?email=<?php echo $row['email']; ?>&s=-2" class="btn btn-danger btn-sm">Reject</a>
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