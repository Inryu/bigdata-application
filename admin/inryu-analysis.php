<?php
require("includes/header.php");
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
            <h1 class="h3 mb-2 text-gray-800">관광명소 분석</h1>
            <p class="mb-4"></p>



            <!--    1. 관광객수에 따른 랭킹-->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">관광명소 랭킹</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                                id="table"
                                data-toggle="table"
                                data-height="580"
                                data-pagination="true"
                                data-search="true"

                                class="table-bordered table-striped table-hover"  width="100%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>랭킹</th>
                                <th>장소 이름</th>
                                <th>카테고리</th>
                                <th>상세 주소</th>
                                <th>이번주 누적 방문자 수</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $sql = "
                            select *, rank() over(order by visitor_sum desc) as ranking
                            from (SELECT sight_name,sight_ctg,address_detail ,(sum(visitor_info.kor_female_num)+sum(visitor_info.kor_male_num)+sum(visitor_info.for_female_num)+sum(visitor_info.for_male_num))AS visitor_sum
                            FROM tour, visitor_info,sight
                            WHERE tour.visitor_info_id=visitor_info.visitor_info_id AND tour.sight_id=sight.sight_id
                            group by sight_name,sight_ctg,address_detail
                            ) a

                            
                            ";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                $filtered = array(
                                    'sight_name'=>htmlspecialchars($row['sight_name']),
                                    'sight_ctg'=>htmlspecialchars($row['sight_ctg']),
                                    'address_detail'=>htmlspecialchars($row['address_detail']),
                                    'visitor_sum'=>htmlspecialchars($row['visitor_sum']),
                                    'ranking'=>htmlspecialchars($row['ranking']),
                                );
                                ?>

                                <tr>
                                <td><?=$filtered['ranking']?></td>
                                <td><?=$filtered['sight_name']?></td>
                                <td><?=$filtered['sight_ctg']?></td>
                                <td><?=$filtered['address_detail']?></td>
                                <td><?=$filtered['visitor_sum']?></td>

                                </tr><?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

            <!--    2. 이번주 제주도 방문자 수-->
            <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">이번주 제주도 방문자 </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                                id="table"
                                data-toggle="table"
                                data-height="400"
                                class="table-bordered table-striped table-hover"  width="100%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>날짜</th>
                                <th>방문객 수</th>
                                <th>누적 방문객 수</th>


                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $sql = "SELECT date, visitor_sum,
		SUM(visitor_sum) OVER (order by date ROWS BETWEEN unbounded preceding AND current row) accum_visitor_num
        FROM(SELECT 
date_format(date,'%Y-%m-%d') as date,(sum(visitor_info.kor_female_num)+sum(visitor_info.kor_male_num)+sum(visitor_info.for_female_num)+sum(visitor_info.for_male_num))AS visitor_sum
FROM tour, visitor_info,sight
WHERE tour.visitor_info_id=visitor_info.visitor_info_id AND tour.sight_id=sight.sight_id
group by date) a

                            ";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                $filtered = array(
                                    'date'=>htmlspecialchars($row['date']),
                                    'visitor_sum'=>htmlspecialchars($row['visitor_sum']),
                                    'accum_visitor_num'=>htmlspecialchars($row['accum_visitor_num']),

                                );
                                ?>

                                <tr>
                                <td><?=$filtered['date']?></td>
                                <td><?=$filtered['visitor_sum']?></td>
                                <td><?=$filtered['accum_visitor_num']?></td>


                                </tr><?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>

            <!--    3. 카테고리별 평균 입장료-->
            <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">카테고리별 평균 입장료</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                                id="table"
                                data-toggle="table"
                                data-height="400"
                                class="table-bordered table-striped table-hover"  width="100%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>카테고리</th>
                                <th>평균 입장료</th>
                                <th>관광지 개수</th>


                            </tr>
                            </thead>
                            <!--                                <tfoot>-->
                            <!--                                <tr>-->
                            <!--                                    <th>Name</th>-->
                            <!--                                    <th>Category</th>-->
                            <!--                                    <th>fee</th>-->
                            <!--                                    <th>address_detail</th>-->
                            <!--                                    <th>update</th>-->
                            <!--                                    <th>delete</th>-->
                            <!--                                </tr>-->
                            <!--                                </tfoot>-->

                            <tbody>
                            <?php
                            $sql = "
                            select ifnull(sight_ctg,\"전체\") as sight_ctg, truncate(avg(sight_fee),0) as fee_avg, count(*) as num
                            from sight
                            group by sight_ctg with rollup;

                            
                            ";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                $filtered = array(
                                    'sight_ctg'=>htmlspecialchars($row['sight_ctg']),
                                    'fee_avg'=>htmlspecialchars($row['fee_avg']),
                                    'num'=>htmlspecialchars($row['num']),
                                );
                                ?>

                                <tr>
                                <td><?=$filtered['sight_ctg']?></td>
                                <td><?=$filtered['fee_avg']?></td>
                                <td><?=$filtered['num']?></td>

                                </tr><?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>

            </div>

            <div class="row">

            <!--    4-1. 날짜,카테고리별 한국인 관광객 수-->
            <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">날짜,카테고리별 한국인 관광객 수</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                                id="table"
                                data-toggle="table"
                                class="table-bordered table-striped table-hover"  width="50%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>날짜</th>
                                <th>자연</th>
                                <th>문화관광</th>
                                <th>레저/체험</th>
                                <th>테마</th>


                            </tr>
                            </thead>
                            <!--                                <tfoot>-->
                            <!--                                <tr>-->
                            <!--                                    <th>Name</th>-->
                            <!--                                    <th>Category</th>-->
                            <!--                                    <th>fee</th>-->
                            <!--                                    <th>address_detail</th>-->
                            <!--                                    <th>update</th>-->
                            <!--                                    <th>delete</th>-->
                            <!--                                </tr>-->
                            <!--                                </tfoot>-->

                            <tbody>
                            <?php
                            $sql = "
                            select date_format(date,'%Y-%m-%d') as date,
	sum(if (sight_ctg='자연', kor_num, 0)) as '자연',
    sum(if (sight_ctg='문화관광', kor_num,0)) as '문화관광',
    sum(if (sight_ctg='레저/체험',kor_num,0)) as '레저/체험',
    sum(if (sight_ctg='테마', kor_num,0)) as '테마'
from (select date, sight_ctg, (kor_female_num+kor_male_num) as kor_num
from tour, sight, visitor_info
where tour.sight_id=sight.sight_id and tour.visitor_info_id=visitor_info.visitor_info_id
) a
group by date
order by date
            
                            ";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                $filtered = array(
                                    'date'=>htmlspecialchars($row['date']),
                                    '자연'=>htmlspecialchars($row['자연']),
                                    '문화관광'=>htmlspecialchars($row['문화관광']),
                                    '레저/체험'=>htmlspecialchars($row['레저/체험']),
                                    '테마'=>htmlspecialchars($row['테마']),
                                );
                                ?>

                                <tr>
                                <td><?=$filtered['date']?></td>
                                <td><?=$filtered['자연']?></td>
                                <td><?=$filtered['문화관광']?></td>
                                <td><?=$filtered['레저/체험']?></td>
                                <td><?=$filtered['테마']?></td>

                                </tr><?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>

            <!--    4-2. 날짜,카테고리별 외국인 관광객 수-->
            <div class="col-sm-6">
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">날짜,카테고리별 한국인 관광객 수</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                    id="table"
                                    data-toggle="table"
                                    class="table-bordered table-striped table-hover"  width="50%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th>날짜</th>
                                    <th>자연</th>
                                    <th>문화관광</th>
                                    <th>레저/체험</th>
                                    <th>테마</th>


                                </tr>
                                </thead>
                                <!--                                <tfoot>-->
                                <!--                                <tr>-->
                                <!--                                    <th>Name</th>-->
                                <!--                                    <th>Category</th>-->
                                <!--                                    <th>fee</th>-->
                                <!--                                    <th>address_detail</th>-->
                                <!--                                    <th>update</th>-->
                                <!--                                    <th>delete</th>-->
                                <!--                                </tr>-->
                                <!--                                </tfoot>-->

                                <tbody>
                                <?php
                                $sql = "select date_format(date,'%Y-%m-%d') as date,
	sum(if (sight_ctg='자연', for_num, 0)) as '자연',
    sum(if (sight_ctg='문화관광', for_num,0)) as '문화관광',
    sum(if (sight_ctg='레저/체험',for_num,0)) as '레저/체험',
    sum(if (sight_ctg='테마', for_num,0)) as '테마'
from (select date, sight_ctg, (for_female_num+for_male_num) as for_num
from tour, sight, visitor_info
where tour.sight_id=sight.sight_id and tour.visitor_info_id=visitor_info.visitor_info_id
) a
group by date
order by date



                        ";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    $filtered = array(
                                        'date'=>htmlspecialchars($row['date']),
                                        '자연'=>htmlspecialchars($row['자연']),
                                        '문화관광'=>htmlspecialchars($row['문화관광']),
                                        '레저/체험'=>htmlspecialchars($row['레저/체험']),
                                        '테마'=>htmlspecialchars($row['테마']),
                                    );
                                    ?>

                                    <tr>
                                    <td><?=$filtered['date']?></td>
                                    <td><?=$filtered['자연']?></td>
                                    <td><?=$filtered['문화관광']?></td>
                                    <td><?=$filtered['레저/체험']?></td>
                                    <td><?=$filtered['테마']?></td>

                                    </tr><?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>


            <div class="row">

            <!--    5. 입장료 가격대별 퍼센테이지-->
            <div class="col-sm-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">입장료 가격대별 분포</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                    id="table"
                                    data-toggle="table"
                                    class="table-bordered table-striped table-hover"  width="50%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th>입장료</th>
                                    <th>관광지 개수</th>
                                    <th>비율(%)</th>



                                </tr>
                                </thead>
                                <!--                                <tfoot>-->
                                <!--                                <tr>-->
                                <!--                                    <th>Name</th>-->
                                <!--                                    <th>Category</th>-->
                                <!--                                    <th>fee</th>-->
                                <!--                                    <th>address_detail</th>-->
                                <!--                                    <th>update</th>-->
                                <!--                                    <th>delete</th>-->
                                <!--                                </tr>-->
                                <!--                                </tfoot>-->

                                <tbody>
                                <?php
                                $sql = "
select 가격대, count(*) as count, count(*)/(select count(*) from sight)*100 AS percentage


from
(SELECT *, 
   ( CASE WHEN sight_fee=0 THEN '0원'
		WHEN (sight_fee>0 AND sight_fee<=1000) THEN '0원-1000원'
		WHEN (sight_fee>1000 AND sight_fee<=5000) THEN '1000원-5000원'
		WHEN (sight_fee>5000 AND sight_fee<=10000) THEN '5000원-10000원'
        WHEN (sight_fee>10000 AND sight_fee<=20000) THEN '10000원-20000원'
        WHEN (sight_fee>20000 AND sight_fee<=40000) THEN '20000원-40000원'
        ELSE '40000원 이상'
	END) AS '가격대'

FROM test.sight) a
group by 가격대
order by 가격대

                        ";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    $filtered = array(
                                        '가격대'=>htmlspecialchars($row['가격대']),
                                        'count'=>htmlspecialchars($row['count']),
                                        'percentage'=>htmlspecialchars($row['percentage']),

                                    );
                                    ?>

                                    <tr>
                                    <td><?=$filtered['가격대']?></td>
                                    <td><?=$filtered['count']?></td>
                                    <td><?=$filtered['percentage']?></td>

                                    </tr><?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--    6. 제주도 지역 정-->
            <div class="col-sm-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">구역 정보</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                    id="table"
                                    data-toggle="table"
                                    class="table-bordered table-striped table-hover"  width="50%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th>구역</th>



                                </tr>
                                </thead>
                                <!--                                <tfoot>-->
                                <!--                                <tr>-->
                                <!--                                    <th>Name</th>-->
                                <!--                                    <th>Category</th>-->
                                <!--                                    <th>fee</th>-->
                                <!--                                    <th>address_detail</th>-->
                                <!--                                    <th>update</th>-->
                                <!--                                    <th>delete</th>-->
                                <!--                                </tr>-->
                                <!--                                </tfoot>-->

                                <tbody>
                                <?php
                                $sql = "SELECT CONCAT( REPEAT('------', COUNT(parent.section_name) - 1), node.section_name) AS section_name , node.lft
FROM jeju_section AS node, jeju_section AS parent 
WHERE node.lft BETWEEN parent.lft AND parent.rgt 
GROUP BY node.section_name,node.lft
order by node.lft




                    ";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    $filtered = array(
                                        'section_name'=>htmlspecialchars($row['section_name']),

                                    );
                                    ?>

                                    <tr>
                                    <td><?=$filtered['section_name']?></td>


                                    </tr><?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>




        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php
include('includes/scripts.php');
include('includes/footer.php');

?>