<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">เพิ่มข้อมูลพนักงาน</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item "><a href="employee_information.php">ข้อมูลพนักงาน</a> </li>
                                <li class="breadcrumb-item active">เพิ่มข้อมูลพนักงาน </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->




            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "SELECT * FROM tb_employee where employee_id = '$id' ";
                $query = $conn->query($sql);

                while ($row = mysqli_fetch_array($query)) {
                    $employee_id = $row['employee_id'];
                    $employee_fullname = $row['employee_fullname'];
                    $employee_birthday = $row['employee_birthday'];
                    $employee_no = $row['employee_no'];
                    $employee_position = $row['employee_position'];
                    $employee_regian = $row['employee_regian'];
                    $employee_national = $row['employee_national'];
                    $employee_tell = $row['employee_tell'];
                    $employee_stardate = $row['employee_stardate'];
                    $employee_address = $row['employee_address'];
                }
            }



            ?>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title">รายละเอียดข้อมูลพนักงาน</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body rcard-body">
                                <form method="post">
                                    <div class="row ">
                                        <div class="col-12 col-lg-6 pr-4 border-right border-3 border-danger ">

                                            <div class="row mb-1">
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>ชื่อ-นามสกุล</label>
                                                        <input type="text" class="form-control" placeholder="" name="employee_fullname" value="<?php echo $employee_fullname ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>เดือน / วัน /ปีเกิด</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">

                                                            </div>
                                                            <input name="employee_birthday" type="date" class="form-control float-right" id="reservation" value="<?php echo $employee_birthday ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>เลขบัตรประชาชน</label>
                                                        <input type="text" class="form-control" placeholder="" name="employee_no" value="<?php echo $employee_no ?>">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label>ที่อยู่</label>
                                                <textarea name="employee_address" class="form-control" rows="3" placeholder="Enter ..."><?php echo $employee_address ?></textarea>
                                            </div>

                                            <div class="row mb-1">
                                                <div class="col-sm-3">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>เชื่อชาติ</label>
                                                        <input name="employee_national" type="text" class="form-control" placeholder="" value="<?php echo $employee_national ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>ศาสนา</label>
                                                        <input name="employee_regian" type="text" class="form-control" placeholder="" value="<?php echo $employee_regian ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>เบอร์โทร</label>
                                                        <input name="employee_tell" type="text" class="form-control" placeholder="" value="<?php echo $employee_tell ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6 pr-4">
                                            <div class="row mb-1">
                                                <div class="col-12">
                                                    <div class="mb-3 border-bottom border-1">
                                                        <label>ตำแหน่งงาน</label>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-sm-12">
                                                            <!-- text input -->
                                                            <div class="form-group">

                                                                <select class="custom-select" name="employee_position">
                                                                    <option value="<?php echo $employee_position ?>" selected><?php echo $employee_position ?></option>
                                                                    <option value="แม่บ้าน">แม่บ้าน</option>
                                                                    <option value="รปภ">รปภ</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>วันที่เข้าทำงาน</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">

                                                                    </div>
                                                                    <input type="date" name="employee_stardate" class="form-control float-right" id="reservation" value="<?php echo $employee_stardate ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-end m-4">
                                        <div class="col-6 col-lg-3">
                                            <a href="employee_information.php" class="btn btn-flat btn-danger btn-md btn-block">ยกเลิก</a>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <input type="hidden" value="<?= $employee_id ?>" name="employee_id">
                                            <button type="submit" name="submit" class="btn btn-flat btn-success btn-md btn-block">บันทึก</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- Script start -->
        <?php include('script.php'); ?>
        <!-- Script end -->
</body>
<?php
if (isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $employee_fullname = $_POST['employee_fullname'];
    $employee_birthday = $_POST['employee_birthday'];
    $employee_no = $_POST['employee_no'];
    $employee_position = $_POST['employee_position'];
    $employee_regian = $_POST['employee_regian'];
    $employee_national = $_POST['employee_national'];
    $employee_tell = $_POST['employee_tell'];
    $employee_stardate = $_POST['employee_stardate'];
    $employee_address = $_POST['employee_address'];

    $sql = "UPDATE tb_employee SET 
    employee_fullname = '$employee_fullname',
    employee_birthday = '$employee_birthday',
    employee_no = '$employee_no',
    employee_position = '$employee_position',
    employee_regian = '$employee_regian',
    employee_national = '$employee_national',
    employee_tell = '$employee_tell',
    employee_stardate = '$employee_stardate',
    employee_address = '$employee_address'
    where employee_id = $employee_id";
    $query = $conn->query($sql);
    echo "<script>
            $(document).ready(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });
                    toastr.success('บันทึกข้อมูลเรียบร้อย')
                });
             </script>";
    echo '<meta http-equiv="refresh" content="1;url=employee_information.php" />';
}
?>

</html>