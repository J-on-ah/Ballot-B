<?php



require 'header.php';

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Contest Managment</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Create contest</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Create Contest</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="php/createcontestaction.php" method="POST">
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" required name="cname" pattern="[^']*[^']*" placeholder="Name of Contest">
            <label for="floatingName">Name of Contest</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingdesignation" required name="desig" pattern="[^']*[^']*" placeholder="designation">
            <label for="floatingdesignation">Designation</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="date" class="form-control" id="floatingDate" required name="date" placeholder="Date">
            <label for="floatingDate">Date</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating mb-3">
              <select class="form-select" id="stime" name="stime" required aria-label="State">
                <option selected disabled>Select Starting Time</option>

                <?php
                $sql = "SELECT * FROM `time`";


                $data = select_data($sql);

       

                while ($row = mysqli_fetch_assoc($data)) {

                  ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['time']; ?></option>

                  <?php
                }
                ?>




              </select>
              <label for="floatingstime">Starting Time</label>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating mb-3">
              <select class="form-select" id="etime" name="etime" required aria-label="State">
                <option selected disabled>Select Ending Time</option>

                <?php
                $sql = "SELECT * FROM `time`";


                $data = select_data($sql);

                $n = 1;

                while ($row = mysqli_fetch_assoc($data)) {

                  ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['time']; ?></option>

                  <?php
                }
                ?>




              </select>
              <label for="floatingetime">Ending Time</label>
            </div>
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
        <div class="col-12">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Discription" required minlength="8" maxlength="4500" name="ins" id="floatingTextarea" pattern="[^']*[^']*"
              style="height: 100px;"></textarea>
            <label for="floatingTextarea">Instructions</label>
          </div>
        </div>
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
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    var startTimeSelect = document.getElementById('stime');
    var endTimeSelect = document.getElementById('etime');

    // Event listener for changes in ending time
    endTimeSelect.addEventListener('change', function () {
      // Set the maximum value for starting time based on the selected ending time
      var selectedEndTime = endTimeSelect.value;
      updateStartTimeOptions(selectedEndTime);
    });

    // Function to update the options in the starting time select
    function updateStartTimeOptions(maximumValue) {
      // Clear previous disabled options
      for (var i = 0; i < startTimeSelect.options.length; i++) {
        startTimeSelect.options[i].disabled = false;
      }

      // Disable options that are later than the selected ending time
      for (var i = 0; i < startTimeSelect.options.length; i++) {
        if (parseInt(startTimeSelect.options[i].value) > parseInt(maximumValue)) {
          startTimeSelect.options[i].disabled = true;
        }
      }
    }

    // Event listener for changes in starting time
    startTimeSelect.addEventListener('change', function () {
      // Set the minimum value for ending time based on the selected starting time
      var selectedStartTime = startTimeSelect.value;
      updateEndTimeOptions(selectedStartTime);
    });

    // Function to update the options in the ending time select
    function updateEndTimeOptions(minimumValue) {
      // Clear previous disabled options
      for (var i = 0; i < endTimeSelect.options.length; i++) {
        endTimeSelect.options[i].disabled = false;
      }

      // Disable options that are earlier than the selected starting time
      for (var i = 0; i < endTimeSelect.options.length; i++) {
        if (parseInt(endTimeSelect.options[i].value) < parseInt(minimumValue)) {
          endTimeSelect.options[i].disabled = true;
        }
      }
    }
  });
</script>

</main><!-- End #main -->

<?php



require 'footer.html';

?>