<?php



require 'header.php';

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Complaints</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Register complaint</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Register complaint</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="php/complaintregistrationaction.php" method="POST">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" name="title" placeholder="Title">
            <label for="floatingName">Title</label>
          </div>
        </div>
      

      

        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating mb-3">
              <select class="form-select" id="stime" name="priority" aria-label="State">
                <option selected disabled>Priority</option>

             <option value="high">High</option>
             <option value="medium">Medium</option>
             <option value="low">Low</option>

              </select>
              <label for="floatingstime">Priority</label>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Discription" name="dis" id="floatingTextarea"
              style="height: 100px;"></textarea>
            <label for="floatingTextarea">Discription</label>
          </div>
        </div>

       


       
        <!-- <div class="col-md-4"> 
      <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" aria-label="State">
          <option selected>New York</option>
          <option value="1">Oregon</option>
          <option value="2">DC</option>
        </select>
        <label for="floatingSelect">State</label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
        <label for="floatingZip">Zip</label>
      </div>
    </div>-->
      
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

  </div>
  </div>
  </section>

</main><!-- End #main -->

<?php



require 'footer.html';

?>