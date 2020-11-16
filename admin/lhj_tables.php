<?php
include('includes/header.php');
require("includes/navbar.php");


$sql1 = "SELECT * FROM lod_platform";
$result1 = mysqli_query($conn, $sql1);
$select_form1 = '<select name="reservation_site">';
while($row1 = mysqli_fetch_array($result1)){
    $select_form1 .= '<option>'.$row1['name'].'</option>';
}
$select_form1 .= '</select>';

$sql2 = "SELECT * FROM lod_region";
$result2 = mysqli_query($conn, $sql2);
$select_form2 = '<select name="region">';
while($row2 = mysqli_fetch_array($result2)){
    $select_form2 .= '<option>'.$row2['name'].'</option>';
}
$select_form2 .= '</select>';
?>



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require("includes/topbar.php"); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">숙박</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">숙소</h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Insert
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Lodgment Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="lod_mod.php" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Available_Num</label>
                                                <input type="text" name="available_num" class="form-control" placeholder="Available_Num">
                                            </div>
                                            <div class="form-group">
                                                <label>Price_Per_Person</label>
                                                <input type="text" name="price_per_person" class="form-control" placeholder="Price_Per_Person">
                                            </div>
                                            <div class="form-group">
                                                <label>Reservation_Site</label>
                                                <?=$select_form1?>
                                            </div>
                                            <div class="form-group">
                                                <label>Region</label>
                                                <?=$select_form2?>
                                            </div>
                                            <div class="form-group">
                                                <label>Star_Score</label>
                                                <input type="text" name="star_score" class="form-control" placeholder="Star_Score">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="register" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                            <th>Available_Num</th>
                                            <th>Price_Per_Person</th>
                                            <th>Reservation_Site</th>
                                            <th>Region</th>
                                            <th>Star_Score</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $sql = "SELECT * FROM lod_lodgment";
                                            $result = mysqli_query($conn, $sql);
                                            while($row=mysqli_fetch_array($result)){
                                                $filtered = array(
                                                        'name'=>htmlspecialchars($row['name']),
                                                        'available_num'=>htmlspecialchars($row['available_num']),
                                                        'price_per_person'=>htmlspecialchars($row['price_per_person']),
                                                        'reservation_site'=>htmlspecialchars($row['reservation_site']),
                                                        'region'=>htmlspecialchars($row['region']),
                                                        'star_score'=>htmlspecialchars($row['star_score'])
                                                    );
                                                ?>
                                                <tr>
                                                    <td><?=$filtered['name']?></td>
                                                    <td><?=$filtered['available_num']?></td>
                                                    <td><?=$filtered['price_per_person']?></td>
                                                    <td><?=$filtered['reservation_site']?></td>
                                                    <td><?=$filtered['region']?></td>
                                                    <td><?=$filtered['star_score']?></td>
                                                    <td style="text-align: center">
                                                        <form action="lod_update.php" method="POST">
                                                            <input type="hidden" name="update_name" value="<?=$filtered['name']?>">
                                                            <button type="submit" name="update_btn" class="btn btn-success">Update</button>
                                                        </form>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <form action="lod_mod.php" method="POST" onsubmit="if(!confirm('sure?')){return false;}">
                                                            <input type="hidden" name="del_name" value="<?=$filtered['name']?>">
                                                            <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
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
                            <h6 class="m-0 font-weight-bold text-primary">예약 사이트</h6>
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
                                        <th>Users</th>
                                        <th>Registered_Date</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php
                                        $sql = "SELECT * FROM lod_platform";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_array($result)){
                                        $filtered = array(
                                            'name'=>htmlspecialchars($row['name']),
                                            'users'=>htmlspecialchars($row['users']),
                                            'registered_date'=>htmlspecialchars($row['registered_date']),
                                            'type'=>htmlspecialchars($row['type'])
                                        );
                                        ?>
                                    <tr>
                                        <td><?=$filtered['name']?></td>
                                        <td><?=$filtered['users']?></td>
                                        <td><?=$filtered['registered_date']?></td>
                                        <td><?=$filtered['type']?></td>
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
                            <h6 class="m-0 font-weight-bold text-primary">지역</h6>
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
                                        <th>Area</th>
                                        <th>Population</th>
                                        <th>County</th>
                                        <th>City</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php
                                        $sql = "SELECT * FROM lod_region";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_array($result)){
                                        $filtered = array(
                                            'name'=>htmlspecialchars($row['name']),
                                            'area'=>htmlspecialchars($row['area']),
                                            'population'=>htmlspecialchars($row['population']),
                                            'county'=>htmlspecialchars($row['county']),
                                            'city'=>htmlspecialchars($row['city'])
                                        );
                                        ?>
                                    <tr>
                                        <td><?=$filtered['name']?></td>
                                        <td><?=$filtered['area']?></td>
                                        <td><?=$filtered['population']?></td>
                                        <td><?=$filtered['county']?></td>
                                        <td><?=$filtered['city']?></td>
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

</body>

</html>
