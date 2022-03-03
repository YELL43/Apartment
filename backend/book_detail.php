<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tb_booking INNER JOIN tb_customer ON tb_customer.cus_id = tb_booking.cus_id 
INNER JOIN tb_room ON tb_room.room_id = tb_booking.room_id WHERE booking_id = '$id'";
$query = $conn->query($sql);
$i = 1;
while ($row = mysqli_fetch_array($query)) {
    $booking_date = $row['booking_date'];
    $booking_checkin = $row['booking_checkin'];
    $cus_fullname = $row['cus_fullname'];
    $booking_id  = $row['booking_id'];
    $cus_birthday = $row['cus_birthday'];
    $cus_tell = $row['cus_tell'];
    $cus_no = $row['cus_no'];
    $cus_address = $row['cus_tell'];
    $nationality = $row['nationality'];
    $religion = $row['religion'];
    $booking_img = $row['booking_img'];
}


?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ข้อมูลการจอง</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item "><a href="book_information.php">ข้อมูลการจอง</a> </li>
                                <li class="breadcrumb-item active">รายละเอียดข้อมูลการจอง </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12 col-lg-10">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title">รายละเอียดข้อมูลการจอง</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body register-card-body">
                                <form method="post">
                                    <div class="row ">
                                        <div class="col-12 col-lg-8 pr-4 border-right border-3 border-danger ">
                                            <div class="row mb-1">
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>ชื่อ-นามสกุล</label>
                                                        <input type="text" class="form-control" placeholder="" value="<?= $cus_fullname ?>" readonly>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>เดือน / วัน /ปีเกิด</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </span>
                                                            </div>
                                                            <input type="date" name="" class="form-control float-right" id="reservation" value="<?= $cus_birthday ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>เลขบัตรประชาชน</label>
                                                        <input type="text" class="form-control" placeholder="" value="<?= $cus_no ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label>ที่อยู่</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." readonly><?= $cus_address ?></textarea>
                                            </div>

                                            <div class="row mb-1">
                                                <div class="col-sm-3">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>เชื่อชาติ</label>
                                                        <input type="text" class="form-control" placeholder="" value="<?= $nationality ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>ศาสนา</label>
                                                        <input type="text" class="form-control" placeholder="" value="<?= $religion ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>เบอร์โทร</label>
                                                        <input type="text" class="form-control" placeholder="" value="<?= $cus_tell ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>วันที่จอง</label>

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </span>
                                                                <input type="date" name="booking_date" class="form-control float-right" id="reservation" value="<?= $booking_date ?>" readonly>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>วันที่เข้าอยู่</label>

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </span>
                                                            </div>
                                                            <input type="date" name="booking_checkin" class="form-control float-right" id="reservation" value="<?= $booking_checkin ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="row mb-1">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">สลิปค่ามัดจำ </label>
                                                        <img class="img-thumbnail" src="../fronend/img/<?= $booking_img ?>" alt="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-end m-4">
                                        <div class="col-6 col-lg-3">
                                            <button name="submitn" type="submit" class="btn btn-flat btn-danger btn-md btn-block">ไม่อนุมัติ</button>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <button name="submit" type="submit" class="btn btn-flat btn-success btn-md btn-block">อนุมัติ</button>
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
    $sql = "UPDATE tb_booking SET status = 'อนุมัติ' WHERE booking_id = '$id'";
    $query = $conn->query($sql);
    echo "<script>
    $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            toastr.success('บันทึกข้อมูลเรียบร้อย')
        });
</script>";
    echo '<meta http-equiv="refresh" content="2;url=book_information.php" />';
}
if (isset($_POST['submitn'])) {
    $sql = "UPDATE tb_booking SET status = 'ไม่อนุมัติ' WHERE booking_id = '$id'";
    $query = $conn->query($sql);

    echo "<script>
    $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            toastr.success('บันทึกข้อมูลเรียบร้อย')
        });
</script>";
    echo '<meta http-equiv="refresh" content="2;url=book_information.php" />';
}





?>

</html>