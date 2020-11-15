<?php
include('../includes/header.php');
include('../includes/navbar.php');

//ranking query
$conn = mysqli_connect("127.0.0.1", "root", "654321", "test01");


$sex_select = $_GET['sex_select'];
$age_select = $_GET['age_select'];


$age="";
$sex="";

if($age_select=="teenager"){
    $age="10대";
}
else if($age_select=="youth"){
    $age="20대~30대";
}
else if($age_select=="middle_age"){
    $age="40대~60대";
}else if($age_select=="old_age"){
    $age="60대 이상";
}


if($sex_select=="F"){
    $sex="여성";
}
else{
    $sex="남성";
}


$sql = "
with tro2 as (
    select res_id 
    from visit_log 
    where cus_id in (select cus_id 
                    from customer 
                    where age='$age_select' and sex='$sex_select')
)
select name,rate,address,res_id, count(res_id) as count
from tro2, restaurant
where tro2.res_id=restaurant.id
group by res_id
order by count(res_id) desc limit 3;";


$res = mysqli_query($conn, $sql);


?>


<!--Begin Page Content-->
<div class="container-fluid">
    <!--Page Heading-->
    <h1 class="h3 mb2 text-gray-800">Analysis</h1>
    <p class="mb-4">5가지 종류의 분석</p>


    <!--두번째 분석 END-->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Recommendation by Customer</h6>
        </div><!--end of 제목-->

        <div class="card-body">
            <p>● 추천 식당</p>
            <p><?=$age?>의 <?=$sex?>들이 가장 많이 찾은 BEST 3입니다!</p>
            <div class="row">
                <?php
                $i=1;
                while ($row = mysqli_fetch_array($res)) {

                    ?>
                    <div class="col-xl col-md-6 mb-3">

                        <div class="card border-left-primary shadow h-100 py-2">

                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <p><?= $i?>위</p>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-900">
                                        <p><?= $row['name'] ?></p>
                                    </div>
                                    <div class="h6 mb-0 font-weight-light text-gray-800">
                                        <p>평점 : <?= $row['rate'] ?></p>
                                        <p>주소 : <?= $row['address'] ?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php $i=$i+1; } ?>
            </div>


        </div><!--end of card body-->
    </div><!--end of card shadow-->

</div><!--end of container-->

<!--첫번쨰 분석 END-->


<?php

include('../includes/footer.php');
include('../includes/scripts.php');

?>
