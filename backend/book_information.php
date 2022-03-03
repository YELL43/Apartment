<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<?php include('load.php') ?>
<?php include('navbar.php'); ?>

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
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลการจอง </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">รายละเอียดข้อมูลการจอง</h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อผู้เช่า</th>
                                                <th>ชั้น</th>
                                                <th>หมายเลขห้อง</th>
                                                <th>วันที่จอง</th>
                                                <th>วันที่เข้าอยู่</th>
                                                <th>สถานะ</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tb_booking INNER JOIN tb_customer ON tb_customer.cus_id = tb_booking.cus_id INNER JOIN tb_room ON tb_room.room_id = tb_booking.room_id WHERE status = 'รออนุมัติ' ||  status = 'ไม่อนุมัติ'";
                                            $query = $conn->query($sql);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $booking_date = $row['booking_date'];
                                                $booking_checkin = $row['booking_checkin'];
                                                $cus_fullname = $row['cus_fullname'];
                                                $room_number = $row['room_number'];
                                                $room_floor = $row['room_floor'];
                                                $booking_id  = $row['booking_id'];
                                                $status = $row['status'];
                                                $room_id = $row['room_id'];
                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $cus_fullname ?></td>
                                                    <td><?= $room_floor ?></td>
                                                    <td><?= $room_number ?></td>
                                                    <td><?= $booking_date ?></td>
                                                    <td><?= $booking_checkin ?></td>
                                                    <td><?= $status ?></td>
                                                    <td>
                                                        <form method="POST">
                                                            <a href="book_detail.php?id=<?= $booking_id ?>" class="btn btn-success btn-md m-1"><i class="fas fa-check-circle"></i>&nbsp;ดำเนินการ</a>
                                                            <input type="hidden" value="<?= $booking_id ?>" name="booking_id">
                                                            <input type="hidden" value="<?= $room_id ?>" name="room_id">
                                                            <button type="submit" name="submit" class="btn btn-danger btn-md m-1"><i class="fas fa-trash-alt"></i>&nbsp;ลบ</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- Script start -->
        <?php include('script.php'); ?>
        <!-- Script end -->
</body>
<?php
if (isset($_POST['submit'])) {
    $booking_id = $_POST['booking_id'];
    $room_id = $_POST['room_id'];
    $sql = "DELETE FROM tb_booking WHERE booking_id = '$booking_id'";
    $query = $conn->query($sql);
    $sqlselec = "UPDATE  tb_room SET room_status = 'ห้องว่าง' WHERE room_id = '$room_id'";
    $queryse = $conn->query($sqlselec);
    while ($row = mysqli_fetch_array($queryse)) {
        $nroom_id = $row['room_id'];
    }
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
    echo '<meta http-equiv="refresh" content="1;url=book_information.php" />';
}
?>

</html>