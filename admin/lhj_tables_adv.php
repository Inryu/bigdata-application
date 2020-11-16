<?php
include('includes/header.php');
require("includes/navbar.php");

?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require("includes/topbar.php"); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">분석</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">시별 면적, 인구, 행정구역</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                        id="table"
                                        data-toggle="table"
                                        data-height="600"
                                        data-pagination="true"
                                        data-search="true"
                                        class="table-bordered table-striped table-hover"
                                        width="100%"
                                        cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>City</th>
                                            <th>Sum(Area)</th>
                                            <th>Sum(population)</th>
                                            <th>Sum(county)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $sql = "select coalesce(city, \"제주도 전체\") as city, sum(area), sum(population), sum(county)
                                                    from lod_region
                                                    group by city with rollup;";
                                            $result = mysqli_query($conn, $sql);
                                            while($row=mysqli_fetch_array($result)){
                                                $filtered = array(
                                                        'city'=>htmlspecialchars($row['city']),
                                                        'sum(area)'=>htmlspecialchars($row['sum(area)']),
                                                        'sum(population)'=>htmlspecialchars($row['sum(population)']),
                                                        'sum(county)'=>htmlspecialchars($row['sum(county)']),
                                                    );
                                                ?>
                                                <tr>
                                                    <td><?=$filtered['city']?></td>
                                                    <td><?=$filtered['sum(area)']?></td>
                                                    <td><?=$filtered['sum(population)']?></td>
                                                    <td><?=$filtered['sum(county)']?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">별점 별 순위</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                        id="table"
                                        data-toggle="table"
                                        data-height="580"
                                        data-pagination="true"
                                        data-search="true"
                                        class="table-bordered table-striped table-hover"
                                        width="100%"
                                        cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price_Per_Person</th>
                                        <th>Star_Score</th>
                                        <th>Rank</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php
                                        $sql = "select name, price_per_person, star_score, rank() over(partition by star_score order by price_per_person) rk
                                                from lod_lodgment;";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_array($result)){
                                        $filtered = array(
                                            'name'=>htmlspecialchars($row['name']),
                                            'price_per_person'=>htmlspecialchars($row['price_per_person']),
                                            'star_score'=>htmlspecialchars($row['star_score']),
                                            'rk'=>htmlspecialchars($row['rk'])
                                        );
                                        ?>
                                    <tr>
                                        <td><?=$filtered['name']?></td>
                                        <td><?=$filtered['price_per_person']?></td>
                                        <td><?=$filtered['star_score']?></td>
                                        <td><?=$filtered['rk']?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">사이트별 인접 숙소의 가격 합</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                        id="table"
                                        data-toggle="table"
                                        data-height="600"
                                        data-pagination="true"
                                        data-search="true"
                                        class="table-bordered table-striped table-hover"
                                        width="100%"
                                        cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Reservation_Site</th>
                                        <th>Price_Per_Person</th>
                                        <th>Price_Between_Two_Lod</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php
                                        $sql = "select name, reservation_site, price_per_person, sum(price_per_person) over (partition by reservation_site order by price_per_person rows 1 preceding) price_between_two_lod
                                                from lod_lodgment; ";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_array($result)){
                                        $filtered = array(
                                            'name'=>htmlspecialchars($row['name']),
                                            'reservation_site'=>htmlspecialchars($row['reservation_site']),
                                            'price_per_person'=>htmlspecialchars($row['price_per_person']),
                                            'price_between_two_lod'=>htmlspecialchars($row['price_between_two_lod']),
                                        );
                                        ?>
                                    <tr>
                                        <td><?=$filtered['name']?></td>
                                        <td><?=$filtered['reservation_site']?></td>
                                        <td><?=$filtered['price_per_person']?></td>
                                        <td><?=$filtered['price_between_two_lod']?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">년도별 예약사이트의 수, 유저 수</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                        id="table"
                                        data-toggle="table"
                                        data-height="600"
                                        data-pagination="true"
                                        data-search="true"
                                        class="table-bordered table-striped table-hover"
                                        width="100%"
                                        cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>users 2015</th>
                                        <th>launched 2015</th>
                                        <th>users 2016</th>
                                        <th>launched 2016</th>
                                        <th>users 2017</th>
                                        <th>launched 2017</th>
                                        <th>users 2018</th>
                                        <th>launched 2018</th>
                                        <th>users 2019</th>
                                        <th>launched 2019</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php
                                        $sql = "select
                                                sum(case when substring(registered_date, 1, 4) = '2015' then users end) as 'users 2015',
                                                count(case when substring(registered_date, 1, 4) = '2015' then 1 end) as 'launched 2015',
                                                sum(case when substring(registered_date, 1, 4) = '2016' then users end) as 'users 2016',
                                                count(case when substring(registered_date, 1, 4) = '2016' then 1 end) as 'launched 2016',
                                                sum(case when substring(registered_date, 1, 4) = '2017' then users end) as 'users 2017',
                                                count(case when substring(registered_date, 1, 4) = '2017' then 1 end) as 'launched 2017',
                                                sum(case when substring(registered_date, 1, 4) = '2018' then users end) as 'users 2018',
                                                count(case when substring(registered_date, 1, 4) = '2018' then 1 end) as 'launched 2018',
                                                sum(case when substring(registered_date, 1, 4) = '2019' then users end) as 'users 2019',
                                                count(case when substring(registered_date, 1, 4) = '2019' then 1 end) as 'launched 2019'
                                                from lod_platform;";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_array($result)){
                                        $filtered = array(
                                            'users 2015'=>htmlspecialchars($row['users 2015']),
                                            'launched 2015'=>htmlspecialchars($row['launched 2015']),
                                            'users 2016'=>htmlspecialchars($row['users 2016']),
                                            'launched 2016'=>htmlspecialchars($row['launched 2016']),
                                            'users 2017'=>htmlspecialchars($row['users 2017']),
                                            'launched 2017'=>htmlspecialchars($row['launched 2017']),
                                            'users 2018'=>htmlspecialchars($row['users 2018']),
                                            'launched 2018'=>htmlspecialchars($row['launched 2018']),
                                            'users 2019'=>htmlspecialchars($row['users 2019']),
                                            'launched 2019'=>htmlspecialchars($row['launched 2019'])
                                        );
                                        ?>
                                    <tr>
                                        <td><?=$filtered['users 2015']?></td>
                                        <td><?=$filtered['launched 2015']?></td>
                                        <td><?=$filtered['users 2016']?></td>
                                        <td><?=$filtered['launched 2016']?></td>
                                        <td><?=$filtered['users 2017']?></td>
                                        <td><?=$filtered['launched 2017']?></td>
                                        <td><?=$filtered['users 2018']?></td>
                                        <td><?=$filtered['launched 2018']?></td>
                                        <td><?=$filtered['users 2019']?></td>
                                        <td><?=$filtered['launched 2019']?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">예약 사이트별 비중</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                        id="table"
                                        data-toggle="table"
                                        data-height="600"
                                        data-pagination="true"
                                        data-search="true"
                                        class="table-bordered table-striped table-hover"
                                        width="100%"
                                        cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Reservation_Site</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php
                                        $sql = "select 
                                                reservation_site, 
                                                count(reservation_site) as count, 
                                                count(reservation_site)/(select count(*) from lod_lodgment)*100 as percentage
                                                from lod_lodgment
                                                group by reservation_site;";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_array($result)){
                                        $filtered = array(
                                            'reservation_site'=>htmlspecialchars($row['reservation_site']),
                                            'count'=>htmlspecialchars($row['count']),
                                            'percentage'=>htmlspecialchars($row['percentage'])
                                        );
                                        ?>
                                    <tr>
                                        <td><?=$filtered['reservation_site']?></td>
                                        <td><?=$filtered['count']?></td>
                                        <td><?=$filtered['percentage']?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
