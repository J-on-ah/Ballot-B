<?php
require('header.php');

$email = $_SESSION['email'];

$cid = $_GET['cid'];
// echo $cid;

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="completedcontest.php">Completed Contest</a></li>
                <li class="breadcrumb-item"><a href="viewresult.php">View Result</a></li>

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
                           

                            // $sql = "SELECT IFNULL(COUNT(e.candidateid), 0) AS candidate_count, r.full_name FROM registration r LEFT JOIN candidates c ON r.admno = c.admno LEFT JOIN electoralroll e ON c.candidateid = e.candidateid WHERE c.cid = 1 GROUP BY r.full_name union all SELECT count(candidateid) as candidate_count,'Nota' as 'full_name' FROM `electoralroll` WHERE cid = 1 and candidateid='-1' group by candidateid;";
                    
                            // $sql = "SELECT IFNULL(COUNT(e.candidateid), 0) AS candidate_count, r.full_name FROM registration r LEFT JOIN candidates c ON r.admno = c.admno LEFT JOIN contest co ON c.cid=$cid LEFT JOIN electoralroll e ON c.candidateid = e.candidateid WHERE c.cid = $cid AND co.result_status = 1 GROUP BY r.full_name union all SELECT count(candidateid) as candidate_count,'Nota' as 'full_name' FROM `electoralroll` WHERE cid = $cid and candidateid='-1' group by candidateid;";
                            
                            $sql = "SELECT SUM(candidate_count) as candidate_count, full_name
                            FROM (
                                SELECT IFNULL(COUNT(e.candidateid), 0) AS candidate_count, r.full_name
                                FROM registration r 
                                LEFT JOIN candidates c ON r.admno = c.admno 
                                LEFT JOIN contest co ON c.cid = co.cid
                                LEFT JOIN electoralroll e ON c.candidateid = e.candidateid 
                                WHERE c.cid = $cid 
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
                                // alert(votes);
                                // alert(candidates);

                                    
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

                 $sql1 = "SELECT * FROM `contest` WHERE cid=$cid";

                $data1 = select_data($sql1);
                $row = mysqli_fetch_assoc($data1);

                if ($row['result_status'] == 0) {

                    ?>
                    <div class="btn-group text">
                        <a href="php/publishresult.php?cid=<?php echo $cid ?> &s=1" class="btn btn-success btn-sm">Publish
                            Result</a>
                    </div>

                    <?php
                } else if ($row['result_status'] == 1) {

                    ?>


                    <div class="btn-group text">
                        <a href="php/publishresult.php?cid=<?php echo $cid ?> &s=0" class="btn btn-danger btn-sm">Revoke
                            Result</a>
                    </div>

                    <?php

                }
                ?>



            </section>

</main><!-- End #main -->



<?php


require('footer.html');

?>