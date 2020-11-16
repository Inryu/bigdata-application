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
                    <h6 class="m-0 font-weight-bold text-primary">제주도내 식당 분포</h6>
                </div><!--end of 제목-->

                <div class="card-body">

                    <p>● 제주시의 음식점 분포</p>

                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>카테고리</th>
                                <th>분포비율</th>
                                <th>개수</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $sql = "with t_join as (select p_id,city from restaurant,address where restaurant.address=address.address and address.city=\"제주시\") select p_id,count(p_id) as count,count(p_id)/(select count(*)from t_join)*100 as pct from t_join group by p_id";

                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($res)) {

                                $category = "";

                                if ($row['p_id'] == 2)
                                    $category = "한식";
                                else if ($row['p_id'] == 3)
                                    $category = "양식";
                                else if ($row['p_id'] == 4)
                                    $category = "중식";
                                else if ($row['p_id'] == 5)
                                    $category = "한식";
                                else
                                    $category = "디저트";

                                ?>
                                <tr>
                                    <td><?= $category ?></td>
                                    <td><?= $row['pct'] . "%" ?></td>
                                    <td><?= $row['count'] ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>

                        </table>


                        <p>● 서귀포시의 음식점 분포</p>

                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>카테고리</th>
                                    <th>분포비율</th>
                                    <th>개수</th>

                                </tr>
                                </thead>

                                <tbody>
                                <tbody>
                                <?php
                                $sql = "with t_join as (select p_id,city from restaurant,address where restaurant.address=address.address and address.city=\"서귀포시\") select p_id,count(p_id) as count,count(p_id)/(select count(*)from t_join)*100 as pct from t_join group by p_id";

                                $res = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($res)) {

                                    $category = "";

                                    if ($row['p_id'] == 2)
                                        $category = "한식";
                                    else if ($row['p_id'] == 3)
                                        $category = "양식";
                                    else if ($row['p_id'] == 4)
                                        $category = "중식";
                                    else if ($row['p_id'] == 5)
                                        $category = "한식";
                                    else
                                        $category = "디저트";

                                    ?>
                                    <tr>
                                        <td><?= $category ?></td>
                                        <td><?= $row['pct'] . "%" ?></td>
                                        <td><?= $row['count'] ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>

                            </table>


                        </div><!--end of table responsive-->
                    </div><!--end of card body-->
                </div><!--end of card shadow-->


                <!--첫번쨰 분석 END-->

            </div><!--end of container-->

            <!--첫번쨰 분석 END-->
        </div>
    </div>


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');


    ?>
