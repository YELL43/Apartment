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
                            <h1 class="m-0">แจ้งย้ายออก</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">แจ้งย้ายออก </li>
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
                                    <h3 class="card-title">รายการแจ้งย้ายออก</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชั้น</th>
                                                <th>หมายเลขห้อง</th>
                                                <th>วันที่แจ้ง</th>
                                                <th>วันที่ออก</th>
                                                <th>ชื่อผู้เช่า</th>
                                                <th>สถานะ</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tb_notific_chkout INNER JOIN tb_customer ON tb_customer.cus_id = tb_notific_chkout.cus_id INNER JOIN tb_room ON tb_room.room_id = tb_notific_chkout.room_id";
                                            $query = $conn->query($sql);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $notific_chkout_date = $row['notific_chkout_date'];
                                                $notific_chkout_outdate = $row['notific_chkout_outdate'];
                                                $cus_id = $row['cus_id'];
                                                $cus_fullname = $row['cus_fullname'];
                                                $room_id = $row['room_id'];
                                                $status = $row['status'];
                                                $room_number = $row['room_number'];
                                                $room_floor = $row['room_floor'];


                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $room_floor ?></td>
                                                    <td><?= $room_number ?></td>
                                                    <td><?= $notific_chkout_date ?></td>
                                                    <td><?= $notific_chkout_outdate ?></td>
                                                    <td><?= $cus_fullname ?></td>




                                                    <td>
                                                        <div class="form-group">
                                                            <form method="post">
                                                                <input type="hidden" name="cus_id" value="<?= $cus_id ?>">
                                                                <input type="hidden" name="room_floor" value="<?= $room_floor ?>">
                                                                <input type="hidden" name="room_number" value="<?= $room_number ?>">
                                                                <?php if ($status == "รออนุมัติ") { ?>
                                                                    <select style="color:darkorange" class="form-control" id="exampleFormControlSelect1" name="status" onchange="this.form.submit()">
                                                                        <option selected disabled><?= $status ?></option>
                                                                        <option style="color:black">อนุมัติ</option>
                                                                    </select>


                                                                <?php  } elseif ($status == "อนุมัติ") { ?>
                                                                    <select style="color:red" class="form-control" id="exampleFormControlSelect1" name="status" onchange="this.form.submit()">
                                                                        <option selected disabled><?= $status ?></option>
                                                                    </select>


                                                                <?php } else { ?>

                                                                    <select style="color:green" class="form-control" id="exampleFormControlSelect1" name="status" onchange="this.form.submit()">
                                                                        <option selected disabled><?= $status ?></option>
                                                                        <option style="color:black">อนุมัติ</option>
                                                                    </select>

                                                                <?php } ?>

                                                            </form>
                                                        </div>


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
        </div>
        <!-- Script start -->
        <?php include('script.php'); ?>
        <!-- Script end -->
</body>


<?php
if (isset($_POST['status'])) {

    $room_floor = $_POST['room_floor'];
    $room_number = $_POST['room_number'];
    $sqluproom = "UPDATE tb_room SET room_status  = 'ห้องว่าง' WHERE room_floor = '$room_floor' AND room_number = '$room_number' ";
    $queryuproom = $conn->query($sqluproom);

    $status = $_POST['status'];
    $cus_id = $_POST['cus_id'];
    $sql1 = "UPDATE tb_booking  SET status = 'ย้ายออก' WHERE  cus_id = '$cus_id' AND status = 'อนุมัติ'";
    $query1 = $conn->query($sql1);
    $sql = "UPDATE tb_notific_chkout  SET status = '$status' WHERE cus_id = '$cus_id'";
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
    echo '<meta http-equiv="refresh" content="1;url=admin_out_room.php" />';
}

?>

</html>