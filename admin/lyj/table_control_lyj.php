<?php
include('../includes/header.php');
include('../includes/navbar.php');

$conn = mysqli_connect("127.0.0.1", "root", "654321", "test01");

?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="addadminprofile" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="insert_lyj.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>가게 이름 </label>
                        <input type="text" name="res_name" class="form-control" placeholder="가게 이름을 입력하세요.">
                    </div>


                    <div class="form-group">
                        <label>카테고리</label>
                        <select name="category_select" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="2">한식</option>
                            <option value="3">양식</option>
                            <option value="4">중식</option>
                            <option value="5">일식</option>
                            <option value="6">디저트</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>주소</label>
                        <select name="address_select" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="한림읍">한림읍</option>
                            <option value="조천읍">조천읍</option>
                            <option value="우도면">우도면</option>
                            <option value="이도1동">이도1동</option>
                            <option value="삼도2동">삼도2동</option>
                            <option value="건입동">건입동</option>
                            <option value="봉개동">봉개동</option>
                            <option value="연동">연동</option>
                            <option value="이호동">이호동</option>
                            <option value="애월읍">애월읍</option>
                            <option value="한경면">한경면</option>
                            <option value="일도1동">일도1동</option>
                            <option value="이도2동">이도2동</option>
                            <option value="용담1동">용담1동</option>
                            <option value="화북동">화북동</option>
                            <option value="아라동">아라동</option>
                            <option value="노형동">노형동</option>
                            <option value="도두동">도두동</option>
                            <option value="구좌읍">구좌읍</option>
                            <option value="주자면">주자면</option>
                            <option value="일도2동">일도2동</option>
                            <option value="삼도1동">삼도1동</option>
                            <option value="삼양동">삼양동</option>
                            <option value="오라동">오라동</option>
                            <option value="외도동">외도동</option>
                            <option value="대정읍">대정읍</option>
                            <option value="남원읍">남원읍</option>
                            <option value="안덕면">안덕면</option>
                            <option value="표선면">표선면</option>
                            <option value="송산동">송산동</option>
                            <option value="정방동">정방동</option>
                            <option value="중앙동">중앙동</option>
                            <option value="천지동">천지동</option>
                            <option value="효돈동">효돈동</option>
                            <option value="영천동">영천동</option>
                            <option value="동홍동">동홍동</option>
                            <option value="서홍동">서홍동</option>
                            <option value="대륜동">대륜동</option>
                            <option value="대천동">대천동</option>
                            <option value="중문동">중문동</option>
                            <option value="예래동">예래동</option>
                        </select>
                    </div>


                </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modiadminprofile" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modify Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_lyj.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>가게 이름 </label>
                        <input type="text" name="res_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>ID </label>
                        <input type="hidden" name="hiddenValue" id="hiddenValue" value=""/>
                    </div>

                    <div class="form-group">
                        <label>카테고리</label>
                        <select name="category_select" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="2">한식</option>
                            <option value="3">양식</option>
                            <option value="4">중식</option>
                            <option value="5">일식</option>
                            <option value="6">디저트</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>주소</label>
                        <select name="address_select" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="한림읍">한림읍</option>
                            <option value="조천읍">조천읍</option>
                            <option value="우도면">우도면</option>
                            <option value="이도1동">이도1동</option>
                            <option value="삼도2동">삼도2동</option>
                            <option value="건입동">건입동</option>
                            <option value="봉개동">봉개동</option>
                            <option value="연동">연동</option>
                            <option value="이호동">이호동</option>
                            <option value="애월읍">애월읍</option>
                            <option value="한경면">한경면</option>
                            <option value="일도1동">일도1동</option>
                            <option value="이도2동">이도2동</option>
                            <option value="용담1동">용담1동</option>
                            <option value="화북동">화북동</option>
                            <option value="아라동">아라동</option>
                            <option value="노형동">노형동</option>
                            <option value="도두동">도두동</option>
                            <option value="구좌읍">구좌읍</option>
                            <option value="주자면">주자면</option>
                            <option value="일도2동">일도2동</option>
                            <option value="삼도1동">삼도1동</option>
                            <option value="삼양동">삼양동</option>
                            <option value="오라동">오라동</option>
                            <option value="외도동">외도동</option>
                            <option value="대정읍">대정읍</option>
                            <option value="남원읍">남원읍</option>
                            <option value="안덕면">안덕면</option>
                            <option value="표선면">표선면</option>
                            <option value="송산동">송산동</option>
                            <option value="정방동">정방동</option>
                            <option value="중앙동">중앙동</option>
                            <option value="천지동">천지동</option>
                            <option value="효돈동">효돈동</option>
                            <option value="영천동">영천동</option>
                            <option value="동홍동">동홍동</option>
                            <option value="서홍동">서홍동</option>
                            <option value="대륜동">대륜동</option>
                            <option value="대천동">대천동</option>
                            <option value="중문동">중문동</option>
                            <option value="예래동">예래동</option>
                        </select>
                    </div>


                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!--Begin Page Content-->
    <div class="container-fluid">
        <!--Page Heading-->
        <h1 class="h3 mb2 text-gray-800">TABLE</h1>
        <p class="mb-4">식당추가하기</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">레스토랑 테이블
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                        Add Info
                    </button>
                </h6>

            </div><!--end of 제목-->

            <div class="card-body">


                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>가게이름</th>
                            <th>주소</th>
                            <th>평점</th>
                            <th>방문자 수</th>
                            <th>수정</th>
                            <th>삭제</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tbody>
                        <?php
                        $sql = "select id,name,rate,visit_num,address
                                    from restaurant
                                    where id>6
                                    order by name";

                        $res = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($res)) {
                            $id_identify = $row['id'];
                            ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['rate'] ?></td>
                                <td><?= $row['visit_num'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success btn-circle btn-sm" data-id="my_id_value" data-toggle="modal" data-target="#modiadminprofile" onclick="PopupEmpInfo(<?=$row['id']?>)">
                                        <img src="./check-solid.svg" width="15" height="15"></img>
                                    </button>

                                </td>
                                <form name="delete_update" method="get">
                                    <td>
                                        <a href="./delete.php?id=<?= $row['id'] ?>"
                                           class="btn btn-danger btn-circle btn-sm">
                                            <img src="./trash-alt-solid.svg" width="15" height="15"></img>
                                        </a>
                                    </td>
                                </form>
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
<!-- End of Main Content -->


</div>
<!-- End of Page Wrapper -->


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

<?php
include('../includes/scripts.php');
include('../includes/footer.php');


?>
