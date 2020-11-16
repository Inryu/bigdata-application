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


            <!--두번째 분석 END-->

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recommendation by Customer</h6>
                </div><!--end of 제목-->

                <div class="card-body">

                    <div class="table-responsive">
                        <form name="recommend_form" action="recommend2_lyj.php" method="get">
                            <div class="dataTables_length" id="dataTable_length">

                                SEX
                                <label>
                                    <select name="sex_select" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="M">남자</option>
                                        <option value="F">여자</option>
                                    </select>
                                </label>
                            </div><!--end of table-length-->

                            <div class="dataTables_length" id="dataTable_length">
                                AGE
                                <label>
                                    <select name="age_select" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="teenager">Teenager</option>
                                        <option value="youth">Youth</option>
                                        <option value="middle_age">middle_age</option>
                                        <option value="old_age">old_age</option>
                                    </select>
                                </label>
                            </div><!--end of table-length-->

                            <input type="submit" class="btn btn-primary btn-icon-split" value="  GO  ">

                        </form>

                    </div><!--end of table responsive-->


                </div><!--end of card body-->
            </div><!--end of card shadow-->

        </div><!--end of container-->

        <!--첫번쨰 분석 END-->

    </div>

<?php

include('includes/scripts.php');
include('includes/footer.php');


?>
