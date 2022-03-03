<html lang="en">
<script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/prompt.js"></script>
<script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/runScript.js"></script>

<head>
    <?php include('head.php');
    include('conn.php');
    ?>
</head>

<body class="login-page" style="min-height: 8px;">
    <div class="login-box">
        <div class="login-logo ">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" height="200px" width="auto">
        </div>
        <!-- /.login-logo -->
        <div class="card" style="  border: 5px solid red;">
            <div class="card-body login-card-body">
                <form method="post">
                    <div class="input-group mb-3 mt-3">
                        <input type="text" class="form-control" placeholder="Username" name="user_username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="user_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-danger btn-md btn-block">LogIn</button>
                        </div>

                    </div>
                </form>


                <!-- /.social-auth-links -->
                <div class=" d-flex justify-content-end ">


                    <p class="mb-0">
                        <a href="register.php" class="text-dark">สมัครสมาชิก</a>
                    </p>

                </div>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


    <!-- Script start -->
    <?php include('script.php'); ?>
    <!-- Script end -->


</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $user_username = mysqli_real_escape_string($conn, $_POST['user_username']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
    $sql = "SELECT * FROM tb_customer WHERE cus_username = '$user_username' and cus_password = '$user_password'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        while ($row = mysqli_fetch_array($query)) {
            $cus_id = $row['cus_id'];
            $cus_username = $row['cus_username'];
            $cus_fullname = $row['cus_fullname'];

            $_SESSION['cus_id'] = $cus_id;
            $_SESSION['cus_username'] = $cus_username;
            $_SESSION['cus_fullname'] = $cus_fullname;
        }
        echo "<script>window.location.href='../fronend/index.php';</script>";
    } else {
        $sql = "SELECT * FROM tb_admin WHERE admin_username = '$user_username' and admin_password = '$user_password'";
        $query = $conn->query($sql);
        if ($query->num_rows >= 1) {
            while ($row = mysqli_fetch_array($query)) {
                $admin_id = $row['admin_id'];
                $admin_username = $row['admin_username'];
                $admin_fullname = $row['admin_fullname'];

                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['admin_fullname'] = $admin_fullname;
                $_SESSION['admin_username'] = $admin_username;
            }
            echo "<script>window.location.href='index.php';</script>";
        } else {
            //     echo "<script>
            //     $(document).ready(function() {
            //             var Toast = Swal.mixin({
            //                 toast: true,
            //                 position: 'top-end',
            //                 showConfirmButton: false,
            //                 timer: 3000
            //             });
            //             Toast.fire({
            //                 icon: 'error',
            //                 title: 'ชื่อผู้ใช้หรือ รหัสผ่านไม่ถูกต้อง'
            //             })
            //         });
            // </script>";
            //     echo '<meta http-equiv="refresh" content="2;url=login.php" />';


            echo "<script>
            $(document).ready(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toastr.error('ชื่อผู้ใช้หรือ รหัสผ่านไม่ถูกต้อง')
                });
        </script>";
            echo '<meta http-equiv="refresh" content="2;url=login.php" />';
        }
    }
}
?>

<!-- Page specific script -->