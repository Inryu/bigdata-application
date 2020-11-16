<?php
include('includes/header.php');
include('includes/navbar.php');



?>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php require("includes/topbar.php"); ?>


<!--Begin Page Content-->
<div class="container-fluid">
    <!--Page Heading-->
    <h1 class="h3 mb2 text-gray-800">Analysis</h1>
    <p class="mb-4">5가지 종류의 분석</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ranking by Category</h6>
        </div><!--end of 제목-->

        <div class="card-body">
            <div class="table-responsive">
                <p>● 한식 TOP 5</p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>랭킹</th>
                            <th>이름</th>
                            <th>위치</th>
                            <th>별점</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $sql = "select name,rate,address,rank() over(partition by p_id order by rate desc) as s_rank from restaurant where p_id != 1 and p_id != 0 and p_id =2 limit 5";

                        $res = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($res)) {

                            ?>
                            <tr>
                                <td><?= $row['s_rank'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['rate'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>


                <p>● 양식 TOP 5</p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>랭킹</th>
                        <th>이름</th>
                        <th>위치</th>
                        <th>별점</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tbody>
                    <?php
                    $sql = "select name,rate,address,rank() over(partition by p_id order by rate desc) as s_rank from restaurant where p_id != 1 and p_id != 0 and p_id =3 limit 5";

                    $res = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($res)) {

                        ?>
                        <tr>
                            <td><?= $row['s_rank'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['rate'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>

                <p>● 중식 TOP 5</p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>랭킹</th>
                        <th>이름</th>
                        <th>위치</th>
                        <th>별점</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tbody>
                    <?php
                    $sql = "select name,rate,address,rank() over(partition by p_id order by rate desc) as s_rank from restaurant where p_id != 1 and p_id != 0 and p_id =4 limit 5";

                    $res = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($res)) {

                        ?>
                        <tr>
                            <td><?= $row['s_rank'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['rate'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>

                <p>● 일식 TOP 5</p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>랭킹</th>
                        <th>이름</th>
                        <th>위치</th>
                        <th>별점</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tbody>
                    <?php
                    $sql = "select name,rate,address,rank() over(partition by p_id order by rate desc) as s_rank from restaurant where p_id != 1 and p_id != 0 and p_id =5 limit 5";

                    $res = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($res)) {

                        ?>
                        <tr>
                            <td><?= $row['s_rank'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['rate'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>


                <p>● 디저트 TOP 5</p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>랭킹</th>
                        <th>이름</th>
                        <th>위치</th>
                        <th>별점</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tbody>
                    <?php
                    $sql = "select name,rate,address,rank() over(partition by p_id order by rate desc) as s_rank from restaurant where p_id != 1 and p_id != 0 and p_id =6 limit 5";

                    $res = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($res)) {

                        ?>
                        <tr>
                            <td><?= $row['s_rank'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['rate'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>

            </div><!--end of table responsive-->
        </div><!--end of card body-->
    </div><!--end of card shadow-->


    <!--첫번쨰 분석 END-->


</div><!--end of container-->
</div>
</div>
</div>
</div>



<!--첫번쨰 분석 END-->


<?php

include('includes/scripts.php');
include('includes/footer.php');


?>
