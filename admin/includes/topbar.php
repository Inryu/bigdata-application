<!— Topbar —>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!— Sidebar Toggle (Topbar) —>
    <form class="form-inline">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </form>


    <!— Topbar Navbar —>
    <ul class="navbar-nav ml-auto">


        <!—— Nav Item - User Information ——>
        <li class="nav-item dropdown no-arrow">

            <?php if (!isset($_SESSION['ID'])) { ?>
                <a class="delte" href="login.php" title="delete">
                    <button type="button" class="btn btn-primary">로그인</button>
                </a>
            <?php } else {
                ?>

                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['NICKNAME']?>님 안녕하세요 :)</span>
                <a class="delte" href="logout_process.php" title="delete">
                    <button type="button" class="btn btn-primary">로그아웃</button>
                </a>
            <?php } ?>
        </li>


    </ul>

</nav>
<!—— End of Topbar ——>