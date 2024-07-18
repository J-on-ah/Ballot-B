<?php

require 'header.php';


?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <img src="../uploads/profile/<?php echo $user['img'] ?>" alt="Profile" class="rounded-circle" style="min-width:250px;">

            <div style="margin-left: 450px;margin-top: -40px; z-index: 99;">
              <label class="btn-bs-file btn btn-sm btn-primary">
                <i class="bi bi-camera" id="icon">
                </i>


              </label>

              <form id="profrm" name="profrm" method="post" style="visibility: hidden;">
                <input type="file" name="propic" id="propic" onchange="return(imgCheck())" />
              </form>
            </div>
            <h2>
              <?php echo $user['full_name']; ?>
            </h2>
            <h3>Student</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab"
                  data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>



              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                  Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
                 -->
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $user['full_name']; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Course</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $user['course']; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Semester</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $user['sem']; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Roll Number</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $user['roll_no']; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Admission Number</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $user['admno']; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $user['phn']; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">
                    <?php echo $user['email']; ?>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="php/profaction.php" method="POST" name="" onsubmit="">
                  <!-- <div class="row mb-3"> 
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                    <img src="../uploads/profile/<?php echo $user['img'] ?>" alt="Profile" class="rounded-circle" style="min-width:250px;">
                      <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i
                            class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                            class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>-->

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName"
                        value="<?php echo $user['full_name']; ?>">
                    </div>
                  </div>

                  <!-- <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div>
                    -->

                  <div class="row mb-3">
                    <label for="course" class="col-md-4 col-lg-3 col-form-label">Course</label>
                    <div class="col-md-8 col-lg-9">
                      <select name="course" type="text" class="form-select" id="course" value="course">

                        <option disabled selected>Select Course</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                        <option value="B.COM">B.Com Computer Application</option>
                        <option value="B.sc">B.Sc Electronics</option>
                        <option value="BA">BA English with journalism</option>
                        <option value="M.Com">M.Com</option>
                        <option value="M.Sc Electronics">M.Sc Electronics</option>
                        <option value="M.Sc computer science">M.Sc computer science</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="semJob" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="sem" type="number" max="6" min="1" class="form-control" id="sem"
                        value="<?php echo $user['sem']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="roll_no" class="col-md-4 col-lg-3 col-form-label">Roll Number</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="roll_no" type="text" class="form-control" id="roll_no"
                        value="<?php echo $user['roll_no']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="admno" class="col-md-4 col-lg-3 col-form-label">Admission Number</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="admno" disabled type="text" class="form-control" id="admno"
                        value="<?php echo $user['admno']; ?>">
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone"
                        value="<?php echo $user['phn']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" disabled type="email" class="form-control" id="Email"
                        value="<?php echo $user['email']; ?>">
                    </div>
                  </div>

                  <!--
                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                      </div>
                    </div>
                        -->

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">

                <!-- Change Password Form -->



                <form action="php/passaction.php" method="POST" name="" onsubmit="">

                  <div class="row mb-3">
                    <label for="currentPass" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentPass" type="password" class="form-control" id="currentPass">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPass" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpass" type="password" class="form-control" id="newPass">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPass" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpass" type="password" class="form-control" id="renewPass" require="">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->





              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<script>
  // alert("hello");


  
// Get references to the input and button elements
const inputElement = document.getElementById("propic");
  const buttonElement = document.getElementById("icon");

  // Add a click event listener to the button
  buttonElement.addEventListener("click", function() {
    // Trigger a click event on the input element
    inputElement.click();
  });

 function imgCheck() {

      


      var form=['png','jpg','jpeg'];
      var x = document.getElementById("propic");

      if ('files' in x) {

      
        

        var file = x.files[0];
        if ('name' in file && 'size' in file) {
          var name=file.name;
          // alert(name);

          var frm=name.substring(name.indexOf(".") + 1);
         
          var sizeInMB = (file.size / (1024*1024)).toFixed(2);

          // alert(file.height);

          // alert(width);
          if(!form.includes(frm)){
              Swal.fire({
                    title: "Upload Failed",
                  text: "Invalid File Format",
                  icon: "error",
                  timer: 1500,
                  showConfirmButton: false,
                didClose: () => {
                   window.location.reload(true);
                      }
            });
            return false;
          }
          else if(!(sizeInMB<1)){
               Swal.fire({
                    title: "Upload Failed",
                  text: "Size exceeds 1MB",
                  icon: "error",
                  timer: 1500,
                  showConfirmButton: false,
                didClose: () => {
                   window.location.reload(true);
                       }
            });
            return false;
          }
          else {

            
            var fd = new FormData();
                var files = $('#propic')[0].files[0];
                fd.append('pro',files);
            $.ajax({
              type: 'post',
              url:'php/imgupload.php',
              data: fd,
              processData: false,
              contentType: false,
              success: function(ret){
                var res=ret.trim();
               
                if(res=="1")
                {
                  // alert("Success");
                   Swal.fire({
                    title: "Upload Successfull",
                  text: "Profile Image Updated",
                  icon: "success",
                  timer: 1500,
                  showConfirmButton: false,
                didClose: () => {
                   window.location.reload(true);
                }
            });
                 }
                 else
                   {
                 
                   Swal.fire({
                    title: "Upload Failed",
                  text: "Profile Image Failed",
                  icon: "error",
                  timer: 1500,
                  showConfirmButton: false,
                didClose: () => {
                   window.location.reload(true);
                }
            });
                 }

              }
            });
          }
        }       
      } 


    }

  document.getElementById("course").value = "<?php echo $user['course'] ?>";
</script>

<?php

require 'footer.html';

?>