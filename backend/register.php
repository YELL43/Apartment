<html lang="en">
<script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/prompt.js"></script>
<script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/runScript.js"></script>

<head>
    <?php include('head.php'); ?>
</head>

<body class="d-flex justify-content-center">
    <div class="box">

        <div class="register-logo ">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" height="200px" width="auto">
        </div>

        <div class="card p-1  " style=" border: 5px solid red;">
            <div class="card-body register-card-body">


                <form action="" method="post">
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>ชื่อ- นามสกุล</label>
                                <input type="text" name="cus_fullname" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>เลขบัตรประชาชน</label><span class="error"></span>
                                <input type="text" pattern="\d{13,13}" name="cus_no" class="form-control" maxlength="13" id="idcard" onkeypress="return isNumberKey(event)"  title="รูปแบบตัวเลข/จํานวน 13 หลัก"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>วัน/เดือน/ปีเกิด</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="date" name="cus_birthday" class="form-control float-right" required>
                                </div>
                                <!-- /.input group -->

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>ที่อยู่</label>
                        <textarea class="form-control" name="cus_address" rows="3" placeholder="Enter ..." required></textarea>
                    </div>

                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>เชื่อชาติ</label>
                                <input type="text" name="nationality" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ศาสนา</label>
                                <input type="text" name="religion" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>เบอร์โทร</label>
                                <input type="text" name="cus_tell" class="form-control" maxlength="10" onkeypress="return isNumberKey(event)"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" name="cus_username">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                <input type="password" class="form-control" name="cus_password">
                            </div>
                        </div>
                    </div>



                    <div class="row d-flex justify-content-end">
                        <div class="col-4">
                            <a href="login.php" type="submit" class="btn btn-danger btn-md btn-block">ยกเลิก</a>
                        </div>
                        <div class="col-4">
                            <button type="submit" name="submit" id="submit" class="btn btn-success btn-md btn-block">สมัครสมาชิก</button>
                        </div>

                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php

    if (isset($_POST['submit'])) {
        $cus_fullname = $_POST['cus_fullname'];
        $cus_tell = $_POST['cus_tell'];
        $cus_birthday = $_POST['cus_birthday'];
        $cus_no = $_POST['cus_no'];
        $cus_username = $_POST['cus_username'];
        $cus_password = $_POST['cus_password'];
        $cus_address = $_POST['cus_address'];
        $nationality = $_POST['nationality'];
        $religion = $_POST['religion'];


        $sql = "SELECT * FROM tb_customer WHERE cus_username = '$cus_username' or cus_no='$cus_no'";
        $query = $conn->query($sql);
        if ($query->num_rows >= 1) {
            echo "<script>
            $(document).ready(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });
                    toastr.error('มีชื่อผู้ใช้หรือบัตรประชาชนนี้อยู่แล้ว')
                });
             </script>";
            echo '<meta http-equiv="refresh" content="2;url=register.php" />';
        } else {
            $sql = "INSERT INTO tb_customer(cus_fullname,cus_tell,cus_birthday,cus_no,cus_username,cus_password,cus_address,nationality,religion)
            VALUES('$cus_fullname', '$cus_tell', '$cus_birthday','$cus_no','$cus_username', '$cus_password','$cus_address','$nationality','$religion')";
            $query = $conn->query($sql);
            echo "<script>
            $(document).ready(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toastr.success('สมัครสมาชิกเรียบร้อย')
                });
             </script>";
            echo '<meta http-equiv="refresh" content="2;url=login.php" />';
        }
    }



    ?>


    <script language="javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>



    <script>
        $(document).ready(function() {
            $('#idcard').on('keyup', function() {
                if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
                    id = $(this).val().replace(/-/g, "");
                    var result = Script_checkID(id);
                    if (result === false) {
                        $('span.error').removeClass('true').text('(เลขบัตรประชาชนไม่ถูกต้อง)').css("color", "red");
                        $('#submit').prop('disabled', true);
                    } else {
                        $('span.error').addClass('true').text('(เลขบัตรประชาชนถูกต้อง)').css("color", "green");
                        $('#submit').prop('disabled', false);

                    }
                } else {
                    $('span.error').removeClass('true').text('');

                }
            })
        });

        function Script_checkID(id) {
            if (!IsNumeric(id)) return false;
            if (id.substring(0, 1) == 0) return false;
            if (id.length != 13) return false;
            for (i = 0, sum = 0; i < 12; i++)
                sum += parseFloat(id.charAt(i)) * (13 - i);
            if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
            return true;
        }

        function IsNumeric(input) {
            var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
            return (RE.test(input));
        }
    </script>

    <!-- Script start -->
    <?php include('script.php'); ?>
    <!-- Script end -->


</body>

</html>