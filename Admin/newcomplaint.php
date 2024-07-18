<?php
require('header.php');

$email=$_SESSION['email'];


?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Complaints</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">New Complaints</li>
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
             New Complaints
            </h5>


         
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                   <th scope="col">Sl no</th>
                    <th scope="col">Tiltle</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of submition</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Action</th>
                  
                  </tr>
                </thead>
                <tbody>
 
                <?php 

           
             
               $sql = "SELECT * FROM `complaint` WHERE  reply='0'";


                $data=select_data($sql);

                $n=1;

                while ($row = mysqli_fetch_assoc($data)) {
                  
                  ?>
                  <tr>
                 <th scope='row'><?php echo $n++; ?></th>
                
                 <td> <?php echo $row['title'] ?></td>
                 <td><?php echo $row['priority'] ?></td>
                 <td><?php echo $row['email'] ?></td>
                 <td><?php echo $row['date'] ?></td>
                 <td> <?php echo $row['dis'] ?>
                 </td>
                 <td>
                      <div class="btn-group">
                        <a 
                         class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered" onclick="passid('<?php echo $row['compidt'] ?>')">reply</a>
                        
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


    

     <!-- Vertically centered Modal -->
    
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Reply</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="php/replyaction.php" method="POST">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="hidden" class="form-control" id="complaintid" name="complaintid" placeholder="Your Name">
                   
                  </div>
                </div>
              
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="reply" name="reply" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">reply</label>
                  </div>
                </div>
              
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" >Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
                </div>
              </div><!-- End Vertically centered Modal-->

  </main><!-- End #main -->

  <script>
    function passid(valuee)
  {
    document.getElementById('complaintid').value=valuee;
  }
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