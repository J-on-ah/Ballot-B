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
          <li class="breadcrumb-item active">Resolved Complaints</li>
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
    Complaints
            </h5>


         
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                   <th scope="col">Sl no</th>
                    <th scope="col">Tiltle</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Date of submition</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Replay</th>
                  
                  </tr>
                </thead>
                <tbody>
 
                <?php 

           
             
               $sql = "SELECT * FROM `complaint` WHERE email='$email' AND reply!='0'";

             


                $data=select_data($sql);

                $n=1;

                while ($row = mysqli_fetch_assoc($data)) {
                  
                  ?>
               <tr>
                 <th scope='row'><?php echo $n++; ?></th>
                
                 <td> <?php echo $row['title'] ?></td>
                 <td><?php echo $row['priority'] ?></td>
                 <td><?php echo $row['date'] ?></td>
                 <td> <button type="button" class="btn btn-primary btn-sm"
                        data-bs-toggle="tooltip" data-bs-placement="top"
                         title="<?php echo $row['dis'] ?>">
                        view Discription  </button> 
                 </td>
                 <td> <button type="button" class="btn btn-primary btn-sm"
                          data-bs-toggle="tooltip" data-bs-placement="top"
                            title="<?php echo $row['reply'] ?>">
                            view reply </button>
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

      echo "user :";
      echo $email;

      ?>




      </div>
    </section>

  </main><!-- End #main -->

<?php 


require('footer.html');

?>