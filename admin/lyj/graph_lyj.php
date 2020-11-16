<?php
include('../includes/header.php');
include('../includes/navbar.php');

//ranking query

$sql = "select name,rate,address,rank() over(partition by p_id order by rate desc) as s_rank from restaurant where p_id != 1 and p_id != 0 limit 5";
$res = mysqli_query($conn, $sql); //conn이 왜없는..?

$filtered_gr = array( //$article이라는 변수에 두가지의 index를 만들어 값을 불러와저장해둠
    //function array( 'index'=>'value' )
    'date' => '계',
    'count' => '0'
);


?>


<!--Begin Page Content-->
<div class="container-fluid">
    <!--Page Heading-->
    <h1 class="h3 mb2 text-gray-800">Analysis</h1>
    <p class="mb-4">5가지 종류의 분석</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">일주일간 제주도내 모든 식당 방문량</h6>
        </div><!--end of 제목-->

        <div class="card-body">

            <p>● 일주일간의 방문자수</p>

            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>날짜</th>
                        <th>총 방문자수</th>

                    </tr>
                    </thead>

                    <tbody>
                    <tbody>
                    <?php
                    $sql = "select date,count(date) as count from visit_log group by date with rollup;";

                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($res)) {

                        if ($row['date'] == null) {
                            $filtered_gr['date'] = '계';
                        } else {
                            $filtered_gr['date'] = $row['date'];
                        }

                        $filtered_gr['count'] = $row['count'];

                        ?>
                        <tr>
                            <td><?= $filtered_gr['date'] ?></td>
                            <td><?= $filtered_gr['count'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>

                <p>● 방문자가 가장 많은 날</p>
                <?php
                $sql = " select date from visit_log group by date having count(*) = (select max(mycount) from(select date,count(date) as mycount from visit_log group by date) as result);";

                $res = mysqli_query($conn, $sql);

                $row = mysqli_fetch_array($res);
                echo $row['date'];

                ?>

            </div><!--end of table responsive-->
        </div><!--end of card body-->
    </div><!--end of card shadow-->


    <!--첫번쨰 분석 END-->

</div><!--end of container-->

<!--첫번쨰 분석 END-->


<?php

include('../includes/footer.php');
include('../includes/scripts.php');

?>
