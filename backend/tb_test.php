<!DOCTYPE html>
<html lang="en">
<?php include('conn.php'); ?>


<body>

    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">รายการแจ้งซ่อมอุปกรณ์</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover test">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>วันที่</th>
                                        <th>รายละเอียด</th>
                                        <th>ห้อง</th>
                                        <th>ชั้น</th>
                                        <th>ชื่อผู้เเจ้ง</th>
                                        <th>สถานะ</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tb_notific_fix INNER JOIN tb_customer ON tb_customer.cus_id = tb_notific_fix.cus_id  INNER JOIN tb_room ON tb_room.room_id = tb_notific_fix.room_id ORDER BY `tb_notific_fix`.`status` DESC";
                                    $query = $conn->query($sql);
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        $notific_fix_date = $row['notific_fix_date'];
                                        $notific_fix_detail = $row['notific_fix_detail'];
                                        $status = $row['status'];
                                        $cus_fullname = $row['cus_fullname'];
                                        $room_number = $row['room_number'];
                                        $room_floor = $row['room_floor'];
                                        $cus_id = $row['cus_id'];
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $notific_fix_date ?></td>
                                            <td><?= $notific_fix_detail ?></td>
                                            <td><?= $room_number ?></td>
                                            <td><?= $room_floor ?></td>
                                            <td><?= $cus_fullname ?></td>
                                            <td>
                                                <div class="form-group">
                                                    <form method="post">
                                                        <input type="hidden" name="cus_id" value="<?= $cus_id ?>">
                                                        <?php if ($status == "รอดำเนินการ") { ?>
                                                            <select style="color:darkorange" class="form-control" id="exampleFormControlSelect1" name="status" onchange="this.form.submit()">
                                                                <option selected disabled><?= $status ?></option>
                                                                <option style="color:black">ซ่อมเรียบร้อย</option>
                                                                <option style="color:black">รอดำเนินการ</option>
                                                            </select>
                                                        <?php } else { ?>
                                                            <select style="color: green;" class="form-control" id="exampleFormControlSelect1" name="status" onchange="this.form.submit()">
                                                                <option selected disabled><?= $status ?></option>
                                                                <option style="color:black">รอดำเนินการ</option>
                                                                <option style="color:black">ซ่อมเรียบร้อย</option>

                                                            </select>

                                                        <?php } ?>

                                                    </form>
                                                </div>


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

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() { // set Interval function to carry out same operation in the time specified
                $('.test').load('tb_test.php .test > *'); // Reloads 'seminar-overview.php' table every 6 seconds as <div> tag is specified and closed after table
            }, 1000);
        });
    </script>
    <!-- Script start -->
    <?php include('script.php'); ?>
    <!-- Script end -->
</body>
<?php
if (isset($_POST['submit'])) {
    $sql = "DELETE FROM tb_booking WHERE booking_id = '$booking_id'";
    $query = $conn->query($sql);
    echo "<script>window.location.href='book_information.php';</script>";
}
?>
<?php
if (isset($_POST['status'])) {
    $status = $_POST['status'];
    $cus_id = $_POST['cus_id'];
    $sql = "UPDATE tb_notific_fix  SET status = '$status' WHERE cus_id = '$cus_id'";
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
    echo '<meta http-equiv="refresh" content="1;url=admin_repair.php" />';
}

?>

</html>