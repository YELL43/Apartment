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
                            <h1 class="m-0">แจ้งย้ายห้อง</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">แจ้งย้ายห้อง </li>
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
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">รายการแจ้งย้ายห้อง</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อผู้ย้าย</th>
                                                <th>ชั้นปัจจุบัน</th>
                                                <th>หมายเลขห้องปัจจุบัน</th>
                                                <th>ย้ายไปชั้น</th>
                                                <th>ย้ายไปหมายเลขห้อง</th>
                                                <th>วันที่แจ้งย้าย</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tb_notific_change
                                             INNER JOIN tb_customer ON tb_customer.cus_id = tb_notific_change.cus_id 
INNER JOIN tb_room ON tb_room.room_id = tb_notific_change.room_id";
                                            $query = $conn->query($sql);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $room_number = $row['room_number'];
                                                $status = $row['status'];
                                                $cus_fullname = $row['cus_fullname'];
                                                $notific_change_date = $row['notific_change_date'];
                                                $room_floor = $row['room_floor'];
                                                $room_change_floor = $row['room_change_floor'];
                                                $room_change_number = $row['room_change_number'];
                                                $room_id = $row['room_id'];
                                                $cus_id = $row['cus_id'];
                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $cus_fullname ?></td>
                                                    <td><?= $room_floor ?></td>
                                                    <td><?= $room_number ?></td>
                                                    <td><?= $room_change_floor ?></td>
                                                    <td><?= $room_change_number ?></td>
                                                    <td><?= $notific_change_date ?></td>


                                                    <td>
                                                        <form method='post'>
                                                            <div class="form-group">
                                                                <input type="hidden" value="<?= $room_id ?>" name="room_id">
                                                                <input type="hidden" value="<?= $cus_id ?>" name="cus_id">
                                                                <input type="hidden" value="<?= $room_change_floor ?>" name="room_change_floor">
                                                                <input type="hidden" value="<?= $room_change_number ?>" name="room_change_number">

                                                                <select class="form-control" id="exampleFormControlSelect1" name="status" onchange="this.form.submit()">
                                                                    <option selected disabled><?= $status ?></option>
                                                                    <option>รอดำเนินการ</option>
                                                                    <option>ย้ายเรียบร้อย</option>
                                                                    <option>ไม่อนุญาติให้ย้าย</option>
                                                                </select>
                                                            </div>
                                                        </form>

                                                    </td>
                                                </tr> <?php } ?>
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
        </div>
        <!-- Script start -->
        <?php include('script.php'); ?>
        <!-- Script end -->
</body>
<?php
if (isset($_POST['status'])) {

    $room_id = $_POST['room_id'];
    $cus_id = $_POST['cus_id'];
    $status = $_POST['status'];
    $room_change_floor = $_POST['room_change_floor'];
    $room_change_number = $_POST['room_change_number'];

    $sqlselec = "SELECT * FROM tb_room WHERE room_floor = '$room_change_floor' AND room_number = '$room_change_number'";
    $queryse = $conn->query($sqlselec);
    while ($row = mysqli_fetch_array($queryse)) {
        $nroom_id = $row['room_id'];
    }
    if ($status == "ย้ายเรียบร้อย") {

        $sqlupb = "UPDATE tb_booking SET room_id = '$nroom_id' WHERE cus_id = '$cus_id'";
        $queryupb = $conn->query($sqlupb);

        $sqluproom = "UPDATE tb_room SET room_status  = 'ห้องไม่ว่าง' WHERE room_id = '$nroom_id'";
        $queryuproom = $conn->query($sqluproom);

        $sqlolduproom = "UPDATE tb_room SET room_status  = 'ห้องว่าง' WHERE room_id = '$room_id'";
        $queryolduproom = $conn->query($sqlolduproom);

        $sqlsech = "SELECT * FROM tb_notific_change WHERE room_id = '$room_id' AND cus_id = '$cus_id'";
        $querysech = $conn->query($sqlsech);

        while ($row = mysqli_fetch_array($querysech)) {
            $notific_change_id = $row['notific_change_id'];
        }

        $sqlupb = "UPDATE tb_notific_change  SET status = '$status' WHERE notific_change_id = '$notific_change_id'";
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
        echo '<meta http-equiv="refresh" content="2;url=admin_move_room.php" />';
    } else  if ($status == "ไม่อนุญาติให้ย้าย") {
        $sqlsech = "SELECT * FROM tb_notific_change WHERE room_id = '$room_id' AND cus_id = '$cus_id'";
        $querysech = $conn->query($sqlsech);

        while ($row = mysqli_fetch_array($querysech)) {
            $notific_change_id = $row['notific_change_id'];
        }

        $sqlupb = "UPDATE tb_notific_change  SET status = '$status' WHERE notific_change_id = '$notific_change_id'";
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
        echo '<meta http-equiv="refresh" content="2;url=admin_move_room.php" />';
    } else {
    }
}
?>

</html>