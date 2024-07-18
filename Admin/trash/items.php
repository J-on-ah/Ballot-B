<?php
require 'header.php';
$email = $_SESSION['email_id'];
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage Items</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Art Forms</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section profile">
    <div class="row">
      <div class="col-xl-5">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Art Forms</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="php/add.php" method="post">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" name="art_form" id="art_form" placeholder="Item Name">
                  <label for="art_name">Art Form</label>
                </div>
              </div>
              <div class="col-12">
              <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>

              <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add">

              </div>
            </form><!-- End floating Labels Form -->

          </div>
        </div>


      </div>

      <div class="col-xl-7">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Item List</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Sl.No</th>
                  <th scope="col">Art Form</th>
                  <th scope="col">Description</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $sql1="SELECT *from item";
                $data=select_data($sql1);
                $n=1;
                while($row=mysqli_fetch_assoc($data)){
                  ?>
                <tr>
                  <th scope="row"><?php echo $n++?></th>
                  <td><?php echo $row['art_form']?></td>
                  <td><?php echo $row['description']?></td>

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

require 'footer.html';

?>