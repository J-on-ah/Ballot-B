<?php
require('header.php');
$email = $_SESSION['email'];
?>

<style>
    /* Red color for unchecked checkbox */
    #myCheckbox:not(:checked) {
        /* border-color: red; */
    }

    /* CSS for shaking animation */
    @keyframes shake {

        10%,
        90% {
            transform: translateX(-10px);
        }

        20%,
        80% {
            transform: translateX(10px);
        }

        30%,
        50%,
        70% {
            transform: translateX(-10px);
        }

        40%,
        60% {
            transform: translateX(10px);
        }
    }

    .shake {
        animation: shake 0.5s;
    }
</style>

<script type="text/javascript" src="php/swal/jquery.min.js"></script>
<script type="text/javascript" src="php/swal/bootstrap.min.js"></script>
<script type="text/javascript" src="php/swal/sweetalert2@11.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Contests</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Active Contest</li>
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
                                    Active Contest
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
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sql1 = "SELECT * FROM `registration` WHERE email = '$email' ";

                                        $data1 = select_data($sql1);

                                        $row1 = mysqli_fetch_assoc($data1);

                                        $admno = $row1['admno'];


                                        date_default_timezone_set('Asia/Kolkata'); // Set your desired timezone here
                                        $time = date("H"); // Get the current time in HH:MM:SS format
                                        

                                        date_default_timezone_set('Asia/Kolkata');
                                        $date = date("Y-m-d");

                                        $candidateid = 0;

                                        // $sql = "SELECT * FROM `contest` WHERE date = '$date' AND $time BETWEEN stime AND etime-1";
                                        $sql = "SELECT * FROM contest WHERE status = 1 AND date='$date' AND $time BETWEEN stime AND etime-1 AND cid IN (SELECT cid FROM electoralroll WHERE admno = '$admno' AND candidateid = '$candidateid') ORDER BY date ASC";
                                        // $sql8="SELECT * FROM contest WHERE status = 1 and date='$date' and stime<=$time and etime>$time and cid in (select cid from electoralroll where admno='$admno' and candidateid = 0) ORDER BY date ASC";
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
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalDialogScrollable">
                                                        Cast Vote
                                                    </button>

                                                    <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Instructions</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="text-align:justify;">
                                                                    <?php echo $row['ins'] ?>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10" id="mydiv">
                                                                        <div class="form-check"
                                                                            style="margin:5px 0 5px 20px;">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                id="myCheckbox" required>
                                                                            <label class="form-check-label" for="myCheckbox"
                                                                                id="checktext">
                                                                                Read all the Instructions
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php ?>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                    <button class="btn btn-primary"
                                                                        onclick="checkCheckbox(<?php echo $row['cid']; ?>)">Cast
                                                                        Vote</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Modal Dialog Scrollable-->

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

echo "User :";
echo $email;

?>

</div>
</section>

</main><!-- End #main -->

<script>
    function checkCheckbox(id) {
        var checkbox = document.getElementById("myCheckbox");
        var textElement = document.getElementById("checktext");
        var div = document.getElementById("mydiv");
        var myString = "castvote.php?cid=";
        var id = id;

        var url = myString + id;

        if (checkbox.checked) {

            alert(url);
            //  window.replace();
            window.location.href = url;
        }
        else {
            // alert("The checkbox is not checked.");
            checkbox.style.borderColor = "red";
            textElement.style.color = "red";
            div.classList.add("shake");

            // Remove the 'shake' class after the animation completes
            setTimeout(function () {
                div.classList.remove("shake");
            }, 500)

        }
    }</script>

<?php


require('footer.html');

?>