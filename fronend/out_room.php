<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="notify.php">ข้อมูลการแจ้ง</a></li>
                <li class="breadcrumb-item "> <a href="out_show.php">รายการแจ้งย้ายออก</a></li>
                <li class="breadcrumb-item active" aria-current="page">แจ้งย้ายออก</li>
            </ol>
        </nav>
        <br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-12 col-lg-8">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">แจ้งย้ายออก</h3>
                    </div>
                    <?php
                    error_reporting(E_ALL ^ E_NOTICE);
                    $chk  = "SELECT * FROM tb_booking inner join tb_room on tb_booking.room_id = tb_room.room_id where tb_booking.cus_id=$cus_id  AND status = 'อนุมัติ'";
                    $querychk = $conn->query($chk);
                    $row = mysqli_fetch_array($querychk);
                    $room_number = $row['room_number'];
                    $room_floor = $row['room_floor'];
                    $room_id = $row['room_id'];

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
                        echo '<meta http-equiv="refresh" content="1;url=out_show.php" />';
                    }
                    ?>

                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" name="room_id" value="<?= $room_id ?>">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label>ชั้น </label>
                                        <input type="text" class="form-control" value="<?= $room_floor ?>" readonly>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label>หมายเลขห้อง</label>
                                        <input type="text" class="form-control" value="<?= $room_number ?>" readonly>
                                    </div>
                                </div>


                            </div>

                            <div class="row mt-3">

                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label>วันที่ออก</label>
                                        <input type="date" class="form-control" name="notific_chkout_outdate">
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (is_null($room_number) || is_null($room_floor)) {
                            ?>
                            <?php } else { ?> <div class="row d-flex justify-content-end mt-4">
                                    <div class="col-6 col-lg-3">
                                        <a href="out_show.php" type="reset" class="btn btn-flat btn-danger btn-md btn-block">ยกเลิก</a>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <button type="submit" name="submit" class="btn btn-flat btn-success btn-md btn-block">เรียบร้อย</button>
                                    </div>
                                </div>

                            <?php } ?>



                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>

        </div>
    </div>
    <?php

    if (isset($_POST['submit'])) {
        $id = $cus_id;
        $room_id = $_POST['room_id'];
        date_default_timezone_set('Asia/Bangkok');
        $notific_chkout_date = date("Y-m-d");
        $notific_chkout_outdate = $_POST['notific_chkout_outdate'];

        $sqlse = "SELECT * FROM tb_notific_chkout WHERE cus_id = '$id' AND  status = 'รอดำเนินการ' ";
        $querysqlse = $conn->query($sqlse);
        if ($querysqlse->num_rows <= 0) {

            $sql = "INSERT INTO tb_notific_chkout (cus_id,room_id,notific_chkout_date,notific_chkout_outdate) value ('$id','$room_id','$notific_chkout_date','$notific_chkout_outdate') ";
            $query = $conn->query($sql);
            echo "<script>
            $(document).ready(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toastr.success('บันทึกข้อมูลสำเร็จ')
                });
            </script>";
            echo '<meta http-equiv="refresh" content="1;url=out_show.php" />';
        } else {
            echo "<script>
            $(document).ready(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toastr.error('บันทึกข้อมูลไม่สำเร็จ')
                });
            </script>";
            echo '<meta http-equiv="refresh" content="1;url=out_room.php" />';
        }
    }

    ?>




    <?php include('script.php') ?>
</body>






</html>