<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-4">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="notify.php">ข้อมูลการแจ้ง</a></li>
                <li class="breadcrumb-item "> <a href="repair_show.php">รายการแจ้งซ่อมอุปกรณ์</a></li>
                <li class="breadcrumb-item active" aria-current="page">แจ้งซ่อมอุปกรณ์</li>
            </ol>
        </nav>
        <br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-12 col-lg-8">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">แจ้งซ่อมอุปกรณ์</h3>
                    </div> <?php
                            error_reporting(E_ALL ^ E_NOTICE);
                            $sql = "SELECT * FROM tb_booking INNER JOIN tb_customer ON tb_customer.cus_id = tb_booking.cus_id 
INNER JOIN tb_room ON tb_room.room_id = tb_booking.room_id WHERE tb_booking.cus_id = '$cus_id' AND status = 'อนุมัติ'";
                            $query = $conn->query($sql);
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) {
                                $room_number = $row['room_number'];
                                $room_floor = $row['room_floor'];
                            }
                            if (is_null($room_number) || is_null($room_floor)) {
                                echo "<script>
                                $(document).ready(function() {
                                        var Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });
                                        toastr.error('ไม่สามารถเรียกใช้หน้านี้ได้')
                                    });
                                </script>";
                                echo '<meta http-equiv="refresh" content="1;url=repair_show.php" />';
                            }
                            ?>

                    <div class="card-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                        <label>ชั้น </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" readonly value="<?= $room_floor ?>">

                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                        <label>หมายเลขห้อง</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" readonly value="<?= $room_number ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label>รายละเอียด</label>
                                        <textarea name="notific_fix_detail" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row d-flex justify-content-end mt-4">
                                <div class="col-6 col-lg-3">
                                    <a href="repair_show.php" type="submit" class="btn btn-flat btn-danger btn-md btn-block">ยกเลิก</a>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="submit" name="submit" class="btn btn-flat btn-success btn-md btn-block">เรียบร้อย</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>

        </div>
    </div>




    <?php include('script.php') ?>
</body>


<?php
if (isset($_POST['submit'])) {
    $notific_fix_detail =  $_POST['notific_fix_detail'];
    date_default_timezone_set('Asia/Bangkok');
    $notific_fix_date = date("Y-m-d");
    $sqlse = "SELECT room_id FROM tb_room WHERE room_number = '$room_number' AND  room_floor = '$room_floor' ";
    $querysqlse = $conn->query($sqlse);
    while ($row = mysqli_fetch_array($querysqlse)) {
        $room_id = $row['room_id'];
    }
    $sql = "INSERT INTO tb_notific_fix(room_id,notific_fix_detail,cus_id,notific_fix_date)VALUES('$room_id','$notific_fix_detail','$cus_id','$notific_fix_date')";
    $query = $conn->query($sql);
}
?>



</html>