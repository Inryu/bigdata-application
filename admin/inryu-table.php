<?php
require("includes/header.php");
require("includes/navbar.php");



?>





    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                         alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                         alt="">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how
                                        would you like them sent to you?</div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                         alt="">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with
                                        the progress so far, keep up the good work!</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                         alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                        told me that people say this to all dogs, even if they aren't good...</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            <img class="img-profile rounded-circle"
                                 src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">관광명소 목록</h1>
                <p class="mb-4">제주도의 관광명소입니다. </p>

                <!-- 1. sight(관광 명소) -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            🍊 관광명소&nbsp&nbsp&nbsp<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">데이터 추가</button>
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

                                class="table-bordered table-striped table-hover"  width="100%" cellspacing="0">
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
                                        while($row = mysqli_fetch_array($result)){
                                          $filtered = array(
                                            'sight_id'=>htmlspecialchars($row['sight_id']),
                                            'sight_name'=>htmlspecialchars($row['sight_name']),
                                            'sight_ctg'=>htmlspecialchars($row['sight_ctg']),
                                            'sight_fee'=>htmlspecialchars($row['sight_fee']),
                                            'address_detail'=>htmlspecialchars($row['address_detail']),
                                            'jeju_section_id'=>htmlspecialchars($row['jeju_section_id']),
                                          );
                                      ?>

                                <tr>
                                    <td><?=$filtered['sight_id']?></td>
                                    <td><?=$filtered['sight_name']?></td>
                                    <td><?=$filtered['sight_ctg']?></td>
                                    <td><?=$filtered['sight_fee']?></td>
                                    <td><?=$filtered['address_detail']?></td>
                                    <td><?=$filtered['jeju_section_id']?></td>
                                    <td style="text-align: center">
                                        <a class="update" href="inryu-update-form.php?sight_id=<?=$filtered['sight_id']?>" title="update">
                                        <i class="fa fa-edit"></i>
                                    </td>
                                    <td style="text-align: center">
                                        <a class="delte" href="inryu-delete-process.php?sight-id=<?=$filtered['sight_id']?>" title="delete" onclick="if(!confirm('정말 삭제하시겠습니까?')){return false;}">
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
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"  aria-hidden="true">
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
                                        <input type="text" class="form-control" name="sight_name" id="exampleFormControlInput1">
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
                                        <input type="text" class="form-control" name="sight_fee" id="exampleFormControlInput2">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">상세 주소</label>
                                        <input type="text" class="form-control" name="address_detail" id="exampleFormControlInput3">
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
                                class="table-bordered table-striped table-hover"  width="100%" cellspacing="0">
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
                            while($row = mysqli_fetch_array($result)){
                                $filtered = array(
                                    'date'=>htmlspecialchars($row['date']),
                                    'sight_id'=>htmlspecialchars($row['sight_id']),
                                    'visitor_info_id'=>htmlspecialchars($row['visitor_info_id']),
                                );
                                ?>

                                <tr>
                                <td><?=$filtered['date']?></td>
                                <td><?=$filtered['sight_id']?></td>
                                <td><?=$filtered['visitor_info_id']?></td>

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
                                    class="table-bordered table-striped table-hover"  width="100%" cellspacing="0">
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
                                while($row = mysqli_fetch_array($result)){
                                    $filtered = array(
                                        'visitor_info_id'=>htmlspecialchars($row['visitor_info_id']),
                                        'kor_female_num'=>htmlspecialchars($row['kor_female_num']),
                                        'kor_male_num'=>htmlspecialchars($row['kor_male_num']),
                                        'for_female_num'=>htmlspecialchars($row['for_female_num']),
                                        'for_male_num'=>htmlspecialchars($row['for_male_num']),
                                    );
                                    ?>

                                    <tr>
                                    <td><?=$filtered['visitor_info_id']?></td>
                                    <td><?=$filtered['kor_female_num']?></td>
                                    <td><?=$filtered['kor_male_num']?></td>
                                    <td><?=$filtered['for_female_num']?></td>
                                    <td><?=$filtered['for_male_num']?></td>

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
                                    class="table-bordered table-striped table-hover"  width="100%" cellspacing="0">
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
                                while($row = mysqli_fetch_array($result)){
                                    $filtered = array(
                                        'jeju_section_id'=>htmlspecialchars($row['jeju_section_id']),
                                        'section_name'=>htmlspecialchars($row['section_name']),
                                        'lft'=>htmlspecialchars($row['lft']),
                                        'rgt'=>htmlspecialchars($row['rgt']),
                                    );
                                    ?>

                                    <tr>
                                    <td><?=$filtered['jeju_section_id']?></td>
                                    <td><?=$filtered['section_name']?></td>
                                    <td><?=$filtered['lft']?></td>
                                    <td><?=$filtered['rgt']?></td>

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