<?php
require('header.php');

$email = $_SESSION['email'];
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="userlist.php">Contests</a></li>
                <li class="breadcrumb-item "><a href="activecontest.php">Active Contest</a></li>
                <li class="breadcrumb-item active">Cast Voting</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <?php



    $cid = $_GET['cid'];
    echo "Contest ID:" . $cid;



    $sql = "SELECT * FROM `registration` WHERE email='$email'";
    $data = select_data($sql);
    $row = mysqli_fetch_assoc($data);

    $admno = $row['admno'];



    ?>

    <section class="section dashboard">
        <div class="row">

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Candidate List
                                </h5>

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Candidate Name</th>
                                            <th scope="col">Candidate</th>
                                            <th scope="col">Symbol</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql1 = "select r.full_name,r.img, e.* from candidates e,registration r where e.cid=$cid and r.admno=e.admno;";

                                    $data = select_data($sql1);

                                    $n = 1;
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $n++ ?>
                                            </th>

                                            <td>
                                                #
                                                <?php echo $row['admno'] . " " . $row['full_name']; ?>
                                                
                                            </td>

                                            <td>



                                                <div class="container">
                                                    <img src="../uploads/profile/<?php echo $row['img'] ?>"
                                                        class="square" alt="Square Image">
                                                </div>




                                            </td>

                                            <td>

                                                <div class="container">
                                                    <img src=" <?php echo "../uploads/candidate/candidate_" . $row['candidateid'] . ".jpg" ?>"
                                                        class="square" alt="Square Image">
                                                </div>


                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="php/castvoteaction.php?candidateid=<?php echo $row['candidateid']; ?>&cid=<?php echo $cid; ?>&email=<?php echo $email; ?>"
                                                        class="btn btn-success btn-sm">Vote</a>
                                                </div>
                                            </td>


                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    <tr>
                                        <th scope="row">
                                            <?php echo $n++ ?>
                                        </th>

                                        <td>
                                            # 0000 Nota
                                        </td>

                                        <td>
                                            <img src=" <?php echo "../uploads/nota/Exclamation_mark_red.png" ?>"
                                                height="40px" alt="">

                                        </td>

                                        <td>
                                            <img src=" <?php echo "../uploads/nota/Exclamation_mark_red.png" ?>"
                                                height="40px" alt="">

                                        </td>

                                        <td>
                                            <div class="btn-group">

                                                <a href="php/castvoteaction.php?candidateid=-1&cid=<?php echo $cid; ?>&email=<?php echo $email; ?>"
                                                    class="btn btn-success btn-sm">Vote</a>

                                            </div>
                                        </td>


                                    </tr>

                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
            </section>



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

<?php


require('footer.html');

?>