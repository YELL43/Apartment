<nav style="background-color:#FCA339" class="navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" height="70px" width="auto">
            <span class="brand-text font-weight-light">คุณหญิง อพาร์ทเม้นท์</span>
        </a>

        <button class="navbar-toggler order-1 collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if (isset($cus_id)) { ?>
            <div class="navbar-collapse order-3 collapse" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a href="room_all.php" class="nav-link">ข้อมูลห้อง</a>
                    </li>
                    <li class="nav-item">
                        <a href="map.php" class="nav-link">แผนที่</a>
                    </li>
                    <li class="nav-item">
                        <a href="notify.php" class="nav-link">ข้อมูลการแจ้ง</a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav  ml-auto ">
                    <li class="nav-item dropdown">
                        <span>สวัสดี,<?= $cus_fullname ?>&nbsp;&nbsp;</span>
                        <img src="dist/img/aaa.png" height="40px" id="navbarDropdown" data-toggle="dropdown" role="button" width="auto" alt="Avatar" class="avatar">
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i>&nbsp;แก้ไขโปรไฟล์</a>
                            <a class="dropdown-item" href="pay_ment.php"><i class="fas fa-money-bill"></i>&nbsp;การชำระเงิน</a>
                            <a class="dropdown-item" href="../backend/logout.php"  onclick="return confirm('คุณต้องการออกจากระบบหรือไม่');" ><i class="fas fa-sign-out-alt"></i>&nbsp;ออกจากระบบ</a>
                        </div>
                    </li>
                </ul>
            </div>

        <?php } else { ?>
            <div class="navbar-collapse order-3 collapse" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a href="room_all.php" class="nav-link">ข้อมูลห้อง</a>
                    </li>
                    <li class="nav-item">
                        <a href="map.php" class="nav-link">แผนที่</a>
                    </li>

                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav  ml-auto ">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item">
                        <a href="../backend/login.php" class="nav-link">เข้าสู่ระบบ</a>
                    </li>
                    <li class="nav-item">
                        <a href="../backend/register.php" class="nav-link">สมัครสมาชิก</a>
                    </li>

                </ul>
            </div>
        <?php } ?>
    </div>
    </div>
</nav>