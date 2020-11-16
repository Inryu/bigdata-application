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
            <h1 class="h3 mb-2 text-gray-800">관광명소 목록</h1>
            <p class="mb-4">제주도의 관광명소입니다. </p>

            <!-- 1. sight(관광 명소) -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">
                        🍊 관광명소&nbsp&nbsp&nbsp
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">데이터 추가
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                                id="table"
                                data-toggle="table"
                                data-height="580"
                                data-pagination="true"
                                data-search="true"

                                class="table-bordered table-striped table-hover" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>장소 번호</th>
                                <th>장소 이름</th>
                                <th>카테고리</th>
                                <th>입장료</th>
                                <th>상세주소</th>
                                <th>제주 구역 번호</th>
                                <th>수정하기</th>
                                <th>삭제하기</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php
                            $sql = "SELECT * FROM sight";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $filtered = array(
                                    'sight_id' => htmlspecialchars($row['sight_id']),
                                    'sight_name' => htmlspecialchars($row['sight_name']),
                                    'sight_ctg' => htmlspecialchars($row['sight_ctg']),
                                    'sight_fee' => htmlspecialchars($row['sight_fee']),
                                    'address_detail' => htmlspecialchars($row['address_detail']),
                                    'jeju_section_id' => htmlspecialchars($row['jeju_section_id']),
                                );
                                ?>

                                <tr>
                                <td><?= $filtered['sight_id'] ?></td>
                                <td><?= $filtered['sight_name'] ?></td>
                                <td><?= $filtered['sight_ctg'] ?></td>
                                <td><?= $filtered['sight_fee'] ?></td>
                                <td><?= $filtered['address_detail'] ?></td>
                                <td><?= $filtered['jeju_section_id'] ?></td>
                                <td style="text-align: center">
                                    <a class="update" href="inryu-update-form.php?sight_id=<?= $filtered['sight_id'] ?>"
                                       title="update">
                                        <i class="fa fa-edit"></i>
                                </td>
                                <td style="text-align: center">
                                    <a class="delte"
                                       href="inryu-delete-process.php?sight-id=<?= $filtered['sight_id'] ?>"
                                       title="delete" onclick="if(!confirm('정말 삭제하시겠습니까?')){return false;}">
                                        <i class="fa fa-trash"></i>
                                </td>
                                </tr><?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- 관광명소 데이터 추가 Modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">관광명소 추가</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="inryu-create-process.php" method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">장소 이름</label>
                                    <input type="text" class="form-control" name="sight_name"
                                           id="exampleFormControlInput1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">카테고리</label>
                                    <select class="form-control" name="sight_ctg" id="exampleFormControlSelect1">
                                        <option>자연</option>
                                        <option>문화관광</option>
                                        <option>레저/체험</option>
                                        <option>테마</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">입장료(원)</label>
                                    <input type="text" class="form-control" name="sight_fee"
                                           id="exampleFormControlInput2">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">상세 주소</label>
                                    <input type="text" class="form-control" name="address_detail"
                                           id="exampleFormControlInput3">
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlInput1">제주 구역 번호</label>
                                    <!--                                        <input type="text" class="form-control" name="jeju_section_id" id="exampleFormControlInput4">-->
                                    <select class="form-control" name="jeju_section_id" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                    </select>
                                </div>

                                <hr/>

                                <div class="text-right">
                                    <button type="submit" class="btn  btn-primary">추가하기</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <!-- 2. tour(일주일 관광객 로그) -->
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">
                                📊 일주일 관광객 로그
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                        id="table"
                                        data-toggle="table"
                                        data-height="580"
                                        data-pagination="true"
                                        class="table-bordered table-striped table-hover" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>날짜</th>
                                        <th>장소 번호</th>
                                        <th>관광객 정보 번호</th>

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
                                    $sql = "SELECT * FROM tour";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $filtered = array(
                                            'date' => htmlspecialchars($row['date']),
                                            'sight_id' => htmlspecialchars($row['sight_id']),
                                            'visitor_info_id' => htmlspecialchars($row['visitor_info_id']),
                                        );
                                        ?>

                                        <tr>
                                        <td><?= $filtered['date'] ?></td>
                                        <td><?= $filtered['sight_id'] ?></td>
                                        <td><?= $filtered['visitor_info_id'] ?></td>

                                        </tr><?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. visitor_info(관광객 정보) -->

                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">
                                👥 관광객 정보
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                        id="table"
                                        data-toggle="table"
                                        data-height="580"
                                        data-pagination="true"
                                        class="table-bordered table-striped table-hover" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>관광객 정보 번호</th>
                                        <th>한국 여자 관광객 수</th>
                                        <th>한국 남자 관광객 수</th>
                                        <th>외국인 여자 관광객 수</th>
                                        <th>외국인 남자 관광객 수</th>

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
                                    $sql = "SELECT * FROM visitor_info";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $filtered = array(
                                            'visitor_info_id' => htmlspecialchars($row['visitor_info_id']),
                                            'kor_female_num' => htmlspecialchars($row['kor_female_num']),
                                            'kor_male_num' => htmlspecialchars($row['kor_male_num']),
                                            'for_female_num' => htmlspecialchars($row['for_female_num']),
                                            'for_male_num' => htmlspecialchars($row['for_male_num']),
                                        );
                                        ?>

                                        <tr>
                                        <td><?= $filtered['visitor_info_id'] ?></td>
                                        <td><?= $filtered['kor_female_num'] ?></td>
                                        <td><?= $filtered['kor_male_num'] ?></td>
                                        <td><?= $filtered['for_female_num'] ?></td>
                                        <td><?= $filtered['for_male_num'] ?></td>

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

            <!-- 4. jeju_section(제주 구역 정보) -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">
                        🏝 제주 구역 정보
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                                id="table"
                                data-toggle="table"
                                data-height="580"
                                data-pagination="true"
                                class="table-bordered table-striped table-hover" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>제주 구역 번호</th>
                                <th>구역 이름</th>
                                <th>tree left num</th>
                                <th>tree right num</th>


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
                            $sql = "SELECT * FROM jeju_section";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $filtered = array(
                                    'jeju_section_id' => htmlspecialchars($row['jeju_section_id']),
                                    'section_name' => htmlspecialchars($row['section_name']),
                                    'lft' => htmlspecialchars($row['lft']),
                                    'rgt' => htmlspecialchars($row['rgt']),
                                );
                                ?>

                                <tr>
                                <td><?= $filtered['jeju_section_id'] ?></td>
                                <td><?= $filtered['section_name'] ?></td>
                                <td><?= $filtered['lft'] ?></td>
                                <td><?= $filtered['rgt'] ?></td>

                                </tr><?php
                            }
                            ?>

                            </tbody>
                        </table>
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
