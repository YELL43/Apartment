<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <section class="content">

        <div class="container">
            <br>


            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ชำระมัดจำ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ชำระห้องรายเดือน</a>
                </li>

            </ul>


            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">รายการชำระเงิน</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">

                                <!-- ชำระมัดจำ -->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <table id="example4" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ชั้น</th>
                                                <th>หมายเลขห้อง</th>
                                                <th>วันที่จอง</th>
                                                <th>จำนวน</th>
                                                <th>สถานะ</th>
                                                <th>ชำระเงิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            error_reporting(E_ALL ^ E_NOTICE);
                                            $id =  $cus_id;
                                            $sql = "SELECT * FROM tb_booking INNER JOIN tb_customer ON tb_customer.cus_id = tb_booking.cus_id INNER JOIN tb_room ON tb_room.room_id = tb_booking.room_id WHERE tb_customer.cus_id = '$cus_id' ORDER BY `tb_booking`.`status` ASC ";
                                            $query = $conn->query($sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $booking_id = $row['booking_id'];
                                                $booking_date = $row['booking_date'];
                                                $booking_checkin = $row['booking_checkin'];
                                                $cus_fullname = $row['cus_fullname'];
                                                $room_number = $row['room_number'];
                                                $room_floor = $row['room_floor'];
                                                $status = $row['status'];
                                                $booking_price = $row['booking_price'];
                                                $booking_img = $row['booking_img'];


                                            ?>
                                                <tr>
                                                    <td><?= $room_floor ?></td>
                                                    <td><?= $room_number ?></td>
                                                    <td><?= $booking_date ?></td>
                                                    <td><?= $booking_price ?></td>
                                                    <td>
                                                        <?php if ($status == 'รออนุมัติ') { ?>
                                                            <span class="badge badge-danger">
                                                                <span>ค้างชำระ</span>
                                                            </span>
                                                        <?php } else if ($status == 'อนุมัติ'  || $status == 'ย้ายออก') {
                                                        ?><span class="badge badge-success">
                                                                <span>ชำระเงินแล้ว</span>
                                                            </span>
                                                        <?php } else if ($status == 'ไม่อนุมัติ') {
                                                        ?><span class="badge badge-danger">
                                                                <span>ไม่อนุมัติ</span>
                                                            </span>
                                                        <?php } ?>

                                                    </td>
                                                    <td>
                                                        <?php if ($booking_img != "" && $status == 'ไม่อนุมัติ') { ?>
                                                            <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#b<?= $booking_id ?>">ส่งหลักฐานอีกครั้ง</div>
                                                        <?php } else if ($booking_img != "") {
                                                        ?>
                                                            <div class="btn btn-secondary btn-sm" disabled>ชำระเงิน</div>
                                                        <?php
                                                        } else if ($booking_img == "") {
                                                        ?>
                                                            <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#b<?= $booking_id ?>">ชำระเงิน</div>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="b<?= $booking_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">ชำระค่ามัดจำ</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" value="<?= $booking_id ?> " name='booking_id'>

                                                                <div class=" modal-body">
                                                                    <div class="d-flex justify-content-center">
                                                                        <img id="image1" width="250px" height="auto" src="" alt="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">แนบใบเสร็จชำระเงิน</label>
                                                                        <input onchange="viewcard1()" name="image1" type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                                    <button type="submit" name='booking' class="btn btn-primary">ชำระเงิน</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php  }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                if (isset($_POST['booking'])) {
                                    $booking_id = $_POST['booking_id'];
                                    $booking_img =  $_FILES['image1']['name'];
                                    $path = "../fronend/img/";
                                    $type = strrchr($booking_img, ".");
                                    $newname = "paybook" . $booking_id . $type;
                                    $path_copy = $path . $newname;
                                    move_uploaded_file($_FILES['image1']['tmp_name'], $path_copy);

                                    $sqlup = "UPDATE tb_booking SET  booking_img = '$newname' WHERE  booking_id = '$booking_id'";
                                    $queryup = $conn->query($sqlup);
                                    echo '<meta http-equiv="refresh" content="1;url=pay_ment.php" />';
                                }
                                ?>


                                <script type="text/javascript">
                                    function viewcard1() {
                                        const preview = document.querySelector('#image1');
                                        const file = document.querySelector('input[name=image1]').files[0];
                                        const reader = new FileReader();


                                        reader.addEventListener("load", function() {
                                            // convert image file to base64 string
                                            preview.src = reader.result;
                                        }, false);

                                        if (file) {
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>
                                <!-- จบมันจำ -->

                                <!-- ชำระรายเดือน -->
                                <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-home-tab">


                                    <table id="example2" class="table table-bordered table-hover">

                                        <thead>
                                            <tr>
                                                <th>ชั้น</th>
                                                <th>หมายเลขห้อง</th>
                                                <th>วันที่เริ่มเก็บค่าห้องประจำเดือน</th>
                                                <th>วันที่เข้าอยู่</th>
                                                <th>จำนวน</th>
                                                <th>สถานะ</th>
                                                <th>ชำระเงิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id =  $cus_id;
                                            $sql = "SELECT tb_invoice.expenses,tb_invoice.invoice_id,tb_invoice.img,tb_room.room_floor,tb_room.room_number,tb_invoice.invoice_date,tb_booking.booking_checkin,tb_invoice.status  FROM `tb_invoice`
    INNER JOIN  tb_customer ON tb_invoice.cus_id = tb_customer.cus_id 
    INNER JOIN tb_room ON tb_room.room_id = tb_invoice.room_id
     INNER JOIN tb_booking ON tb_customer.cus_id = tb_booking.cus_id
    WHERE tb_customer.cus_id = '$id' GROUP BY invoice_id ORDER BY `tb_invoice`.`status` ASC";
                                            $query = $conn->query($sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $room_floor = $row['room_floor'];
                                                $room_number = $row['room_number'];
                                                $invoice_date = $row['invoice_date'];
                                                $booking_checkin = $row['booking_checkin'];
                                                $status = $row['status'];
                                                $img = $row['img'];
                                                $invoice_id = $row['invoice_id'];
                                                $expenses = $row['expenses'];

                                            ?>
                                                <tr>
                                                    <td><?= $room_floor ?></td>
                                                    <td><?= $room_number ?></td>
                                                    <td><?= $invoice_date ?></td>
                                                    <td><?= $booking_checkin ?></td>
                                                    <td><?= $expenses ?></td>
                                                    <td>
                                                        <?php if ($status == 'ค้างชำระ') { ?>
                                                            <span class="badge badge-danger">
                                                                <span>ค้างชำระ</span>
                                                            </span>
                                                        <?php } else if ($status == 'ชำระเรียบร้อย') {
                                                        ?><span class="badge badge-success">
                                                                <span>ชำระเงินแล้ว</span>
                                                            </span><?php
                                                                } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($img == "") { ?>
                                                            <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#a<?= $invoice_id ?>">ชำระเงิน</div>
                                                        <?php } else if ($img != "") {
                                                        ?>
                                                            <div class="btn btn-secondary btn-sm" disabled>ชำระเงิน</div>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="a<?= $invoice_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">ชำระเงินรายเดือน</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" value="<?= $invoice_id ?> " name='invoice_id'>
                                                                <div class="modal-body">
                                                                    <div class="d-flex justify-content-center">
                                                                        <img id="image2" width="250px" height="auto" src="" alt="">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">แนบใบเสร็จชำระเงิน</label>
                                                                        <input onchange="viewcard2()" name="image2" type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                                    <button type="submit" name="invoice" class="btn btn-primary">ชำระเงิน</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                if (isset($_POST['invoice'])) {
                                    $invoice_id = $_POST['invoice_id'];
                                    $booking_img =  $_FILES['image2']['name'];
                                    $path = "../fronend/img/";
                                    $type = strrchr($booking_img, ".");
                                    $newname = "invoice" . $invoice_id . $type;
                                    $path_copy = $path . $newname;
                                    move_uploaded_file($_FILES['image2']['tmp_name'], $path_copy);
                                    $sqlup = "UPDATE tb_invoice SET  img = '$newname' WHERE  invoice_id = '$invoice_id'";
                                    $queryup = $conn->query($sqlup);
                                    echo '<meta http-equiv="refresh" content="1;url=pay_ment.php" />';
                                }
                                ?>
                                <script type="text/javascript">
                                    function viewcard2() {
                                        const preview = document.querySelector('#image2');
                                        const file = document.querySelector('input[name=image2]').files[0];
                                        const reader = new FileReader();


                                        reader.addEventListener("load", function() {
                                            // convert image file to base64 string
                                            preview.src = reader.result;
                                        }, false);

                                        if (file) {
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>
                                <!-- จบชำระรายเดือน -->

                            </div>
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




    <?php include('script.php') ?>
</body>






</html>