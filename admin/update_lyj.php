<?php
include('includes/header.php');
include('includes/navbar.php');
$id = $_GET['id'];

$sql = "select name, address, p_id from restaurant where id=$id";

$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_array(($res));

$name_origin = $row['name'];
$p_id_origin = $row['p_id'];
$address_origin = $row['address'];
$category="";

if($p_id_origin==2)  $category='한식';
else if($p_id_origin==3)  $category='양식';
else if($p_id_origin==4)  $category='중식';
else if($p_id_origin==5)  $category='일식';
else if($p_id_origin==6)  $category='디저트';

?>


<!— Content Wrapper —>
<div id="content-wrapper" class="d-flex flex-column">

    <!— Main Content —>
    <div id="content">

        <?php require("includes/topbar.php"); ?>


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

            <div class="table-responsive">

                <form action="real_update_lyj.php?id=<?=$id?>" method="POST">

                    <div class="form-group">
                        <label>가게 이름 </label>
                        <input type="text" name="new_res_name" class="form-control" value="<?= $name_origin ?>">
                    </div>


                    <div class="form-group">
                        <label>카테고리</label>
                        <select name="new_category_select" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="<?=$p_id_origin?>"><?=$category?></option>
                            <option value="2">한식</option>
                            <option value="3">양식</option>
                            <option value="4">중식</option>
                            <option value="5">일식</option>
                            <option value="6">디저트</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>주소</label>
                        <select name="new_address_select" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="<?=$address_origin?>"><?=$address_origin?></option>
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


                    <input type="submit" class="btn btn-primary" value="수정하기">
                </form>

            </div><!--end of table responsive-->


        </div><!--end of card body-->
    </div><!--end of card shadow-->

</div><!--end of container-->

    </div>

<?php


include('includes/scripts.php');
include('includes/footer.php');


?>

