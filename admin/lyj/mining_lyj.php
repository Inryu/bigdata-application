<?php
include('../includes/header.php');
include('../includes/navbar.php');

//ranking query


$sql = "select name, rate, visit_num,address
        from restaurant
        where id>=7";

$res = mysqli_query($conn, $sql);

$excellent = "";
$good = "";
$avg = "";
$bad = "";

while ($row = mysqli_fetch_array(($res))) {

    if ($row['visit_num'] >= 100000) {
        if ($row['rate'] >= 4.0) $excellent = $excellent . "<li>{$row['name']}</li>";
        else if ($row['rate'] >= 3.0) $good = $good . "<li>{$row['name']}</li>";
        else $avg = $avg . "<li>{$row['name']}</li>";
    } else if ($row['visit_num'] >= 10000) {
        if ($row['rate'] >= 4.5) $excellent = $excellent . "<li>{$row['name']}</li>";
        else if ($row['rate'] >= 4.0) $good = $good . "<li>{$row['name']}</li>";
        else if ($row['rate'] >= 3.0) $avg = $avg . "<li>{$row['name']}</li>";
        else $bad = $bad . "<li>{$row['name']}</li>";
    } else {
        if ($row['rate'] >= 3.5) $avg = $avg . "<li>{$row['name']}</li>";
        else $bad = $bad . "<li>{$row['name']}</li>";
    }


}


?>


<!--Begin Page Content-->
<div class="container-fluid">
    <!--Page Heading-->
    <h1 class="h3 mb2 text-gray-800">Analysis</h1>
    <p class="mb-4">5가지 종류의 분석</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">제주도내 식당 평가</h6>
        </div><!--end of 제목-->

        <div class="card-body">
            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-header">
                            EXCELLENT
                        </div>
                        <div class="card-body">
                            <ul>
                                <?php
                                echo $excellent;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card mb-4 py-3 border-left-info">
                        <div class="card-header">
                            GOOD
                        </div>
                        <div class="card-body">

                            <ul>
                                <?php
                                echo $good;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card mb-4 py-3 border-left-warning">
                        <div class="card-header">
                            AVERAGE
                        </div>
                        <div class="card-body">
                            <ul>
                                <?php
                                echo $avg;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card mb-4 py-3 border-left-danger">
                        <div class="card-header">
                            BAD
                        </div>
                        <div class="card-body">
                            <ul>
                                <?php
                                echo $bad;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


</div> <!--end of card body-->

</div><!--end of card shadow-->


<!--첫번쨰 분석 END-->

</div><!--end of container-->

<!--첫번쨰 분석 END-->


<?php

include('../includes/footer.php');
include('../includes/scripts.php');

?>
