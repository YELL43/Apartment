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
    $cus_fullname = $row['cus_fullname'];
    $booking_id  = $row['booking_id'];
    $cus_birthday = $row['cus_birthday'];
    $cus_tell = $row['cus_tell'];
    $cus_no = $row['cus_no'];
    $cus_address = $row['cus_address'];
    $booking_date = $row['booking_date'];
    $booking_checkin = $row['booking_checkin'];
    $nationality = $row['nationality'];
    $religion = $row['religion'];
    $room_number = $row['room_number'];
    $room_floor = $row['room_floor'];
    $cus_id = $row['cus_id'];
    $oldroom_id = $row['room_id'];
} ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">แก้ไขข้อมูลผู้เช่า</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item "><a href="tenant_information.php">ข้อมูลผู้เช่า</a> </li>
                                <li class="breadcrumb-item active">แก้ไขข้อมูลผู้เช่า </li>

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title">รายละเอียดข้อมูลผู้เช่า</h3>
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
                                                        <input type="text" class="form-control" placeholder="" value="<?= $cus_fullname ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label>เดือน / วัน /ปีเกิด</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">

                                                            </div>
                                                            <input type="date" name="" class="form-control float-right" id="reservation" value="<?= $cus_birthday ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
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
                                        </div>

                                        <div class="col-12 col-lg-6 pr-4">
                                            <div class="row mb-1">
                                                <div class="col-12">
                                                    <div class="mb-3 border-bottom border-1">
                                                        <label>ข้อมูลห้อง </label>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>ชั้น</label>
                                                                <input type="text" class="form-control" placeholder="" value="<?= $room_floor ?>" name="room_floor">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label>หมายเลขห้อง</label>
                                                                <input type="text" class="form-control" placeholder="" value="<?= $room_number ?>" name="room_number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label>วันที่จอง</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">

                                                                </div>
                                                                <input type="date" name="booking_date" class="form-control float-right" id="reservation" value="<?= $booking_date ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label>วันที่เข้าอยู่</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">

                                                                </div>
                                                                <input type="date" name="booking_checkin" class="form-control float-right" id="reservation" value="<?= $booking_checkin ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-end m-4">
                                        <div class="col-6 col-lg-3">
                                            <a href="tenant_information.php" class="btn btn-flat btn-danger btn-md btn-block">ยกเลิก</a>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <input type="hidden" value="<?= $oldroom_id ?>" name="oldroom">

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

    $room_floor = $_POST['room_floor'];
    $room_number = $_POST['room_number'];
    $oldroom = $_POST['oldroom'];
    $booking_checkin = $_POST['booking_checkin'];
    $booking_date = $_POST['booking_date'];

    $sql = "SELECT * FROM tb_room WHERE room_floor = '$room_floor' AND room_number = '$room_number'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $sqlselec = "SELECT * FROM tb_room WHERE room_floor = '$room_floor' AND room_number = '$room_number'";
        $queryse = $conn->query($sqlselec);
        while ($row = mysqli_fetch_array($queryse)) {
            $room_id = $row['room_id'];
        }
        if ($oldroom == $room_id) {
            $sqlupb = "UPDATE tb_booking SET room_id = '$room_id',booking_checkin  = '$booking_checkin',booking_date = '$booking_date' WHERE booking_id = '$booking_id'";
            $queryupb = $conn->query($sqlupb);

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
            echo '<meta http-equiv="refresh" content="2;url=tenant_information.php" />';
        } else {
            $sqlupb = "UPDATE tb_booking SET room_id = '$room_id' WHERE booking_id = '$booking_id'";
            $queryupb = $conn->query($sqlupb);

            $sqlupcus = "UPDATE tb_customer SET cus_checkin  = '$cus_checkin', cus_book = '$cus_book' WHERE cus_id = '$cus_id'";
            $queryupcus = $conn->query($sqlupcus);

            $sqluproom = "UPDATE tb_room SET room_status  = 'ห้องไม่ว่าง' WHERE room_id = '$room_id'";
            $queryuproom = $conn->query($sqluproom);

            $sqlolduproom = "UPDATE tb_room SET room_status  = 'ห้องว่าง' WHERE room_id = '$oldroom'";
            $queryolduproom = $conn->query($sqlolduproom);
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
            echo '<meta http-equiv="refresh" content="2;url=tenant_information.php" />';
        }
    } else {
        echo '<script>alert("ไม่พบหมายเลขห้องนี้");</script>';
    }
}
?>

</html>