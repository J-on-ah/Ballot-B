<?php
require('header.php');

$email = $_SESSION['email'];



$cid = $_GET['cid'];
// echo $cid;


?>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Published Results</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="publishedresult.php">Published Result</a></li>
                <li class="breadcrumb-item active">View Result</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <section class="section">
                <div class="row">

                    <div class="card ">

                        <div class="col-lg-12">

                            <h5 class="card-title">Result</h5>

                            <!-- Bar Chart -->
                            <div id="barChart"></div>

                            <script>
                                let votes = [];
                                let candidates = [];
                            </script>

                            <?php

                            // $sql = "SELECT IFNULL(COUNT(e.candidateid), 0) AS candidate_count, r.full_name FROM registration r LEFT JOIN candidates c ON r.admno = c.admno LEFT JOIN electoralroll e ON c.candidateid = e.candidateid WHERE c.cid = $cid AND c.result_status = 1 GROUP BY r.full_name;";
                            //   $sql = "SELECT IFNULL(COUNT(e.candidateid), 0) AS candidate_count, r.full_name FROM registration r LEFT JOIN candidates c ON r.admno = c.admno LEFT JOIN contest co ON c.cid=$cid LEFT JOIN electoralroll e ON c.candidateid = e.candidateid WHERE c.cid = $cid AND co.result_status = 1 GROUP BY r.full_name;";
                            //  $sql = "SELECT IFNULL(COUNT(e.candidateid), 0) AS candidate_count, r.full_name FROM registration r LEFT JOIN candidates c ON r.admno = c.admno LEFT JOIN contest co ON c.cid=$cid LEFT JOIN electoralroll e ON c.candidateid = e.candidateid WHERE c.cid = $cid AND co.result_status = 1 GROUP BY r.full_name union all SELECT count(candidateid) as candidate_count,'Nota' as 'full_name' FROM `electoralroll` WHERE cid = $cid and candidateid='-1' group by candidateid;";
                            
                            $sql = "SELECT SUM(candidate_count) as candidate_count, full_name
                        FROM (
                            SELECT IFNULL(COUNT(e.candidateid), 0) AS candidate_count, r.full_name
                            FROM registration r 
                            LEFT JOIN candidates c ON r.admno = c.admno 
                            LEFT JOIN contest co ON c.cid = co.cid
                            LEFT JOIN electoralroll e ON c.candidateid = e.candidateid 
                            WHERE c.cid = $cid AND co.result_status = 1
                            GROUP BY r.full_name
                        
                            UNION ALL 
                        
                            SELECT COUNT(candidateid) as candidate_count, 'Nota' as full_name 
                            FROM electoralroll 
                            WHERE cid = $cid AND candidateid = '-1'
                        ) AS combined_results
                        GROUP BY full_name;
                        ";

                            $data = select_data($sql);

                            while ($row1 = mysqli_fetch_assoc($data)) {

                                ?>

                                <script>
                                    votes.push('<?php echo $row1['candidate_count']; ?>');
                                    candidates.push('<?php echo $row1['full_name']; ?>');

                                </script>


                                <?php
                            }

                            ?>

                            <script>

                                let sortedData = candidates.map((candidate, index) => ({ candidate, votes: parseInt(votes[index]) }));
                                sortedData.sort((a, b) => b.votes - a.votes);
                                votes = sortedData.map(item => item.votes);
                                candidates = sortedData.map(item => item.candidate);

                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#barChart"), {
                                        series: [{

                                            data: votes

                                        }],
                                        chart: {
                                            type: 'bar',
                                            height: 350
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 4,
                                                horizontal: true,
                                            }
                                        },
                                        dataLabels: {
                                            enabled: true
                                        },
                                        xaxis: {
                                            categories: candidates

                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Bar Chart -->

                        </div>
                    </div>
                </div>

                <?php

                //  $sql1 = "SELECT IFNULL(COUNT(e.candidateid), 0) AS candidate_count, r.full_name, r.admno FROM registration r LEFT JOIN candidates c ON r.admno = c.admno LEFT JOIN contest co ON c.cid=$cid LEFT JOIN electoralroll e ON c.candidateid = e.candidateid WHERE c.cid = $cid AND co.result_status = 1 GROUP BY r.full_name ORDER BY candidate_count DESC LIMIT 1;";
                
                $sql1 = "SELECT IFNULL(COUNT(electoralroll.candidateid), 0) AS candidate_count, registration.full_name, registration.img, registration.admno
                 FROM registration
                 LEFT JOIN candidates ON registration.admno = candidates.admno
                 LEFT JOIN contest ON candidates.cid = contest.cid
                 LEFT JOIN electoralroll ON candidates.cid = electoralroll.cid AND candidates.candidateid = electoralroll.candidateid
                 WHERE candidates.cid = $cid
                 GROUP BY registration.full_name
                 ORDER BY candidate_count DESC
                 LIMIT 1;
                 ";

      


                $data1 = select_data($sql1);
                $row2 = mysqli_fetch_assoc($data1);


                $admno = $row2['admno'];

                ?>
                <style>
                    .custom-card {
                        width: 330px;
                        /* Set the desired width */
                        height: 225px;
                        /* Set the desired height */
                    }
                </style>


                <!-- Card with an image on left -->
                <style>
                    .custom-card {
                        width: 400px;
                        height: 300px;
                        animation: pulse 2s infinite;
                    }

                    @keyframes pulse {
                        0% {
                            transform: scale(1);
                        }

                        50% {
                            transform: scale(1.1);
                        }

                        100% {
                            transform: scale(1);
                        }
                    }
                </style>

                <div class="card mb-3 custom-card">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="../uploads/profile/<?php echo $row2['img'] ?>"
                                class="img-fluid rounded-start" alt="<?php echo $row2['full_name']; ?>" width="400"
                                height="300">
                        </div>

                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">Winner</h5>
                                <p class="card-text">
                                    <strong>Name:</strong>
                                    <?php echo $row2['full_name']; ?>
                                </p>
                                <p class="card-text">
                                    <strong>Votes:</strong>
                                    <?php echo $row2['candidate_count']; ?>
                                </p>
                                <p class="card-text">
                                    <strong>Admission Number:</strong>
                                    <?php echo $row2['admno']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- End Card with an image on left -->


            </section>

</main><!-- End #main -->




<?php


require('footer.html');

?>