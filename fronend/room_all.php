<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>
    <br>
    <div class="container ">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">ข้อมูลห้องพัก</li>
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
                                                                    <input type="hidden" value="<?php echo $room_id ?>" name="room_id">
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
                                                                    <div class="row mb-1">

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>วันที่เข้าอยู่</label>
                                                                                <input value="" type="date" name="booking_checkin" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="submit" class="btn btn-flat btn-success ">จอง</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                        </div>

                                        <?php
                                        if (isset($_POST['submit'])) {

                                            $room_id = $_POST['room_id'];
                                            $booking_checkin = $_POST['booking_checkin'];
                                            date_default_timezone_set('Asia/Bangkok');
                                            $date = date("Y-m-d");
                                            $chk  = "SELECT * FROM tb_booking WHERE cus_id = '$cus_id' AND  status != 'ย้ายออก'";
                                            $querychk = $conn->query($chk);
                                            if ($querychk->num_rows <= 0) {
                                                $sql = "INSERT INTO tb_booking (booking_date,cus_id,room_id,booking_checkin)VALUES('$date','$cus_id','$room_id','$booking_checkin')";
                                                $query = $conn->query($sql);
                                                $sqlbook = "UPDATE  tb_room set room_status = 'ห้องไม่ว่าง' WHERE room_id = '$room_id' ";
                                                $querybook = $conn->query($sqlbook);
                                                echo "<script>window.location.href='room_all.php';</script>";
                                            } else {
                                                echo "<script>alert('คุณจองห้องอื่นแล้ว');</script>";
                                                echo "<script>window.location.href='room_all.php';</script>";
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