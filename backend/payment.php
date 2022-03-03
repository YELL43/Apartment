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
                            <h1 class="m-0">ข้อมูลการชำระเงิน</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลการชำระเงิน </li>
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

                                <!-- /.card-header -->

                                <script type="text/javascript">
                                    function outpayment() {
                                        const preview = document.querySelector('#imgpayout');
                                        const file = document.querySelector('input[name=imageout]').files[0];
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
                                <?php
                                if (isset($_POST['update'])) {
                                    $invoice_id = $_POST['invoice_id'];
                                    $image =  $_FILES['imageout']['name'];
                                    $path = "../fronend/img/";
                                    $type = strrchr($image, ".");
                                    $newname = "invoice" . $invoice_id . $type;
                                    $path_copy = $path . $newname;

                                    move_uploaded_file($_FILES['imageout']['tmp_name'], $path_copy);
                                    $sql = "UPDATE tb_invoice SET status = 'ชำระเรียบร้อย' , img = '$newname' WHERE invoice_id = '$invoice_id' ";
                                    $query = $conn->query($sql);
                                    //echo '<meta http-equiv="refresh" content="1;url=payment.php" />';
                                }

                                ?>
                                <div class="card-body">

                                    <div class="tab-content" id="pills-tabContent">

                                        <!-- ชำระมัดจำ -->
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อผู้ใช้</th>
                                                        <th>ชั้น</th>
                                                        <th>หมายเลขห้อง</th>
                                                        <th>วันที่เริ่มเก็บค่าห้องประจำเดือน</th>
                                                        <th>วันที่เข้าอยู่</th>
                                                        <th>จำนวน</th>
                                                        <th>สถานะ</th>
                                                        <th>ตรวจสอบ</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $sql = "SELECT tb_customer.cus_fullname,tb_invoice.expenses,tb_invoice.invoice_id,tb_invoice.img,tb_room.room_floor,tb_room.room_number,tb_invoice.invoice_date,tb_booking.booking_checkin,tb_invoice.status  FROM `tb_invoice`
                                                  INNER JOIN  tb_customer ON tb_invoice.cus_id = tb_customer.cus_id 
                                                  INNER JOIN tb_room ON tb_room.room_id = tb_invoice.room_id
                                                  INNER JOIN tb_booking ON tb_customer.cus_id = tb_booking.cus_id  GROUP BY invoice_id ORDER BY `tb_invoice`.`status` ASC";
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
                                                    $fullname = $row['cus_fullname'];

                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $fullname ?></td>
                                                            <td><?= $room_floor ?></td>
                                                            <td><?= $room_number ?></td>
                                                            <td><?= $invoice_date ?></td>
                                                            <td><?= $booking_checkin ?></td>
                                                            <td><?= $expenses ?> บาท</td>
                                                            <td>
                                                                <?php if ($status == 'ค้างชำระ') { ?>
                                                                    <span class="badge badge-danger">
                                                                        <span>ค้างชำระ</span>
                                                                    </span>
                                                                <?php } else if ($status == 'ชำระเรียบร้อย') {
                                                                ?><span class="badge badge-success">
                                                                        <span>ชำระเงินแล้ว</span>
                                                                    </span><?php
                                                                        } else if ($status == 'ปฏิเสธ') {
                                                                            ?><span class="badge badge-danger">
                                                                        <span>ไม่อนุมัติ</span>
                                                                    </span><?php
                                                                        } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($img != '') { ?>
                                                                    <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#a<?= $invoice_id ?>">ตรวจสอบ</div>
                                                                <?php } else if ($img == '') { ?>
                                                                    <div class="btn btn-secondary btn-sm" disabled>ตรวจสอบ</div>
                                                                    <button data-toggle="modal" data-target="#up<?= $invoice_id ?>" class="btn btn-flat btn-info btn-md m-1"><i class="fas fa-plus-circle"></i>&nbsp;ชำระเงินภายนอก</button>
                                                                    <div class="modal fade" id="up<?= $invoice_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">ชำระเงิน</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                        <input type="hidden" name="invoice_id" value="<?= $invoice_id ?>">
                                                                                        <div class="row ">
                                                                                            <div class="col-12 col-lg-12 ">
                                                                                                <div class="row mb-1">
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="d-flex justify-content-center m-2">
                                                                                                            <img id="imgpayout" width="250px" height="auto" src="" alt="">
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label>แนบใบเสร็จชำระเงิน หรือ เอกสารการชำระเงิน</label>
                                                                                                            <input onchange="outpayment()" name="imageout" type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                                                    <button type="submit" name="update" class="btn btn-primary">บันทึก</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                } ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <div class="modal fade" id="a<?= $invoice_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">ชำระค่ามัดจำ</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post">
                                                                    <input type="hidden" name="invoice_id" value="<?= $invoice_id ?>">
                                                                    <div class="modal-body">
                                                                        <div class="d-flex justify-content-center">
                                                                            <img id="image1" width="250px" height="auto" src="../fronend/img/<?= $img ?>" alt="">
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="check" class="btn btn-success">ตรวจสอบ</button>
                                                                        <button type="submit" name="uncheck" class="btn btn-danger">ปฏิเสธ</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } ?>
                                            </table>
                                        </div>
                                        <?php
                                        if (isset($_POST['check'])) {
                                            $invoice_id = $_POST['invoice_id'];
                                            $sql = "UPDATE tb_invoice SET status = 'ชำระเรียบร้อย' WHERE invoice_id = '$invoice_id' ";
                                            $query = $conn->query($sql);
                                            echo '<meta http-equiv="refresh" content="1;url=payment.php" />';
                                        } else if (isset($_POST['uncheck'])) {
                                            $invoice_id = $_POST['invoice_id'];
                                            $sql = "UPDATE tb_invoice SET status = 'ปฏิเสธ' WHERE invoice_id = '$invoice_id'";
                                            $query = $conn->query($sql);
                                            echo '<meta http-equiv="refresh" content="1;url=payment.php" />';
                                        }
                                        ?>



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
            <!-- /.content -->
        </div>
        <!-- Script start -->
        <?php include('script.php'); ?>
        <!-- Script end -->
</body>

</html>