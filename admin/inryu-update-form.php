<?php
require("includes/header.php");
require("includes/navbar.php");

$conn = mysqli_connect(
    'localhost',
    'team18',
    'team18',
    'team18');

$escaped = array(
    'name'=>'',
    'profile'=>''
);


if(isset($_GET['sight_id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['sight_id']);
    settype($filtered_id, 'integer');
    $sql = "SELECT * FROM sight WHERE sight_id = {$filtered_id}";

//    echo $sql;

    $result = mysqli_query($conn, $sql);


    $row = mysqli_fetch_array($result);


    $escaped['sight_name'] = htmlspecialchars($row['sight_name']);
    $escaped['sight_ctg'] = htmlspecialchars($row['sight_ctg']);
    $escaped['sight_fee'] = htmlspecialchars($row['sight_fee']);
    $escaped['address_detail'] = htmlspecialchars($row['address_detail']);
    $escaped['jeju_section_id'] = htmlspecialchars($row['jeju_section_id']);

    $form_id = '<input type="hidden" name="sight_id" value="'.$_GET['sight_id'].'">';

}
?>





    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php require("includes/topbar.php"); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"></h1>


            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">
                    🍊 관광명소 수정&nbsp&nbsp&nbsp
                </h4>
            </div>

            <div class="card-body">

            <!--form-->
            <form action="inryu-update-process.php" method="post">
                <?=$form_id?>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >장소 이름</label>
                    <input type="text" class="form-control" name="sight_name" id="exampleFormControlInput1" value="<?=$escaped['sight_name']?>">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">카테고리</label>
                    <select class="form-control" name="sight_ctg" id="exampleFormControlSelect1" >
                        <option>자연</option>
                        <option>문화관광</option>
                        <option>레저/체험</option>
                        <option>테마</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">입장료(원)</label>
                    <input type="text" class="form-control" name="sight_fee" id="exampleFormControlInput2" value="<?=$escaped['sight_fee']?>">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">상세 주소</label>
                    <input type="text" class="form-control" name="address_detail" id="exampleFormControlInput3" value="<?=$escaped['address_detail']?>">
                </div>


                <div class="form-group">
                    <label for="exampleFormControlInput1">제주 구역 번호</label>
                    <input type="text" class="form-control" name="jeju_section_id" id="exampleFormControlInput4" value="<?=$escaped['jeju_section_id']?>">
<!--                    <select class="form-control" name="jeju_section_id" id="exampleFormControlSelect1" >-->
<!--                        <option>1</option>-->
<!--                        <option>2</option>-->
<!--                        <option>3</option>-->
<!--                        <option>4</option>-->
<!--                        <option>5</option>-->
<!--                        <option>6</option>-->
<!--                        <option>7</option>-->
<!--                        <option>8</option>-->
<!--                        <option>9</option>-->
<!--                        <option>10</option>-->
<!--                        <option>11</option>-->
<!--                        <option>12</option>-->
<!--                        <option>13</option>-->
<!--                        <option>14</option>-->
<!--                        <option>15</option>-->
<!--                        <option>16</option>-->
<!--                    </select>-->
                </div>

                <hr/>

                <div class="text-right">
                    <button type="submit" class="btn  btn-primary">수정하기</button>
                </div>

            </form>
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