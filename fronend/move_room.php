<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>
    <br>
    <div class="container ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="notify.php">ข้อมูลการแจ้ง</a></li>
                <li class="breadcrumb-item "> <a href="move_show.php">รายการแจ้งย้ายห้อง</a></li>
                <li class="breadcrumb-item active" aria-current="page">แจ้งย้ายห้อง</li>
            </ol>
        </nav>

        <?php if (isset($cus_id)) { ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-primary">
                                <div class="card-body">
                                    <div>
                                        <div class="btn-group w-100 mb-2">
                                            <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> ห้องทั้งหมด </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="1">ห้องว่าง </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="2">ห้องไม่ว่าง </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="3">ห้องชำรุด </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="4">ห้องไม่ว่าง ห้องชำรุด </a>
                                        </div>

                                    </div>
                                    <div>
                                        <div class="filter-container p-0 row" style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 3711px;">
                                            <?php
                                            $sql = "SELECT * FROM tb_room ";
                                            $query = $conn->query($sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $room_number = $row['room_number'];
                                                $room_id  = $row['room_id'];
                                                $room_status =  $row['room_status'];
                                                $room_floor =  $row['room_floor'];
                                            ?>

                                                <?php if ($room_status == 'ห้องว่าง') { ?>
                                                    <div class="filtr-item col-sm-2" data-category="0,1" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 313px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                        <img data-toggle="modal" data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/74E000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                                    </div>
                                                <?php } else if ($room_status == 'ห้องไม่ว่าง') { ?>
                                                    <div class="filtr-item col-sm-2" data-category="0,2,4" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 313px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                        <img id="<?php echo $room_id ?>" data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/FF0000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                                    </div>
                                                    <script>
                                                        $('#<?php echo $room_id ?>').click(function() {
                                                            var Toast = Swal.mixin({
                                                                toast: true,
                                                                position: 'top-end',
                                                                showConfirmButton: false,
                                                                timer: 3000
                                                            });
                                                            toastr.error('ห้องไม่ว่าง!')
                                                        });
                                                    </script>
                                                <?php } else  if ($room_status == 'ห้องชำรุด') { ?>
                                                    <div class="filtr-item col-sm-2" data-category="0,3,4" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 313px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                        <img id="<?php echo $room_id ?>" data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/F2D000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                                    </div>
                                                    <script>
                                                        $('#<?php echo $room_id ?>').click(function() {
                                                            var Toast = Swal.mixin({
                                                                toast: true,
                                                                position: 'top-end',
                                                                showConfirmButton: false,
                                                                timer: 3000
                                                            });
                                                            toastr.warning('ห้องชำรุด!')
                                                        });
                                                    </script>
                                                <?php } ?>




                                                <!-- Modal Room-->
                                                <div class="modal fade" id="exampleModalCenter<?php echo $room_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขห้อง</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>


                                                            <form method="POST">
                                                                <div class="modal-body">
                                                                    <input type="hidden" value="<?php echo $room_floor ?>" name="room_floor">
                                                                    <input type="hidden" value="<?php echo $room_number ?>" name="room_number">
                                                                    <div class="row mb-1">
                                                                        <div class="col-sm-6">
                                                                            <!-- text input -->
                                                                            <div class="form-group">
                                                                                <label>ชั้น</label>
                                                                                <input value="<?php echo $room_floor ?>" type="text" class="form-control" placeholder="" disabled name="room_floor">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>หมายเลขห้อง</label>
                                                                                <input value="<?php echo $room_number ?>" type="text" class="form-control" placeholder="" disabled name="room_number">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="submit" class="btn btn-flat btn-success ">ย้าย</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                        </div>

                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $room_number = $_POST['room_number'];
                                            $room_floor   = $_POST['room_floor'];
                                            date_default_timezone_set('Asia/Bangkok');
                                            $date = date("Y-m-d");
                                            $chkchang = "SELECT * FROM tb_notific_change WHERE status = 'รอดำเนินการ'";
                                            $querychkchang = $conn->query($chkchang);
                                            if ($querychkchang->num_rows <= 0) {
                                                $chk  = "SELECT room_id FROM tb_booking WHERE cus_id = '$cus_id' AND status = 'อนุมัติ'  ";
                                                $querychk = $conn->query($chk);
                                                while ($row = mysqli_fetch_array($querychk)) {
                                                    $r_id = $row['room_id'];
                                                }
                                                if (is_null($r_id)) {
                                                    echo "<script>alert('คุณไม่สามารถใช้หน้านี้ได้ในขณะนี้');</script>";
                                                } else {
                                                    if ($querychk) {
                                                        $sql = "INSERT INTO tb_notific_change (notific_change_date,room_id,cus_id,room_change_floor,room_change_number)VALUES('$date','$r_id','$cus_id','$room_floor','$room_number')";
                                                        $query = $conn->query($sql);
                                                        echo "<script>window.location.href='move_show.php';</script>";
                                                    } else {
                                                        echo "<script>alert('คุณได้ทำการขอย้ายห้องแล้ว');</script>";
                                                        echo "<script>window.location.href='move_show.php';</script>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>

                                    </div>
                                    <!-- END Modal Room -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else {
            include('room_all_notlog.php');
        }
        ?>

    </div>





    <?php include('script.php') ?>
</body>






</html>