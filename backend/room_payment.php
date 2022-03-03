<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ข้อมูลห้องการชำระ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลห้องการชำระ</li>
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
                            <div class="card card-outline card-primary">
                                <div class="card-body">
                                    <div>
                                        <div class="btn-group w-100 mb-2">

                                            <a class="btn btn-info active" href="javascript:void(0)" data-filter="2">ห้องไม่ว่าง </a>

                                        </div>

                                    </div>
                                    <div>
                                        <div class="filter-container p-0 row" style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 3711px;">
                                            <?php
                                            $sql = "SELECT * FROM tb_room INNER JOIN tb_booking ON tb_room.room_id = tb_booking.room_id 
 INNER JOIN tb_customer ON tb_booking.cus_id = tb_customer.cus_id 
where tb_room.room_status = 'ห้องไม่ว่าง' AND tb_booking.status = 'อนุมัติ' ";
                                            $query = $conn->query($sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $cus_id = $row['cus_id'];
                                                $cus_fullname = $row['cus_fullname'];
                                                $room_number = $row['room_number'];
                                                $room_id  = $row['room_id'];
                                                $room_status =  $row['room_status'];
                                                $room_floor =  $row['room_floor'];
                                            ?>

                                                <div class="filtr-item col-sm-2" data-category="0,2,4" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 313px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                    <img data-toggle="modal" data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/FF0000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                                </div>


                                                <!-- Modal Room-->
                                                <div class="modal fade " id="exampleModalCenter<?php echo $room_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">ชำระเงิน</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST">
                                                                <div class="modal-body">
                                                                    <input type="hidden" value="<?php echo $room_id ?>" name="room_id">
                                                                    <input type="hidden" value="<?php echo $cus_id ?>" name="cus_id">

                                                                    <label>ชื่อ-นามสกุล</label>
                                                                    <input value="<?php echo $cus_fullname ?>" type="text" class="form-control" placeholder="" readonly>
                                                                    <br>
                                                                    <div class="row mb-3 border-bottom border-2">
                                                                        <div class="col-sm-6">
                                                                            <!-- text input -->
                                                                            <div class="form-group">
                                                                                <label>ชั้น</label>
                                                                                <input value="<?php echo $room_floor ?>" type="text" class="form-control" placeholder="" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>หมายเลขห้อง</label>
                                                                                <input value="<?php echo $room_number ?>" type="text" class="form-control" placeholder="" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row border-bottom border-2">
                                                                        <div class="col-lg-6 col-12 border-right border-2">
                                                                            <div class="row mb-3" id="water<?php echo $room_id ?>">
                                                                                <div class="col-sm-6 ">
                                                                                    <!-- text input -->
                                                                                    <div class="form-group">
                                                                                        <label>มิเตอร์น้ำ เริ่ม</label>
                                                                                        <input value="waterstart" name="waterstart" id="waterstart<?php echo $room_id ?>" type="number" class="form-control" placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>มิเตอร์น้ำ สิ้นสุด</label>
                                                                                        <input name="waterend" id="waterend<?php echo $room_id ?>" type="number" class="form-control" placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-12">
                                                                                    <label>มิเตอร์น้ำ ที่ใช้ไป</label>
                                                                                    <div class="input-group mb-3">
                                                                                        <input id="usewater<?php echo $room_id ?>" class="form-control" name="usewater" value="" readonly>
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text">หน่วย</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-4">
                                                                                    <!-- text input -->
                                                                                    <div class="form-group">
                                                                                        <label>หน่วย : 10 บาท</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-8">

                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">รวม</span>
                                                                                        </div>
                                                                                        <input value="sumwater" name="sumwater" class="form-control" id="sumwater<?php echo $room_id ?>" readonly>
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text">บาท</span>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-12 border-right border-2">
                                                                            <div class="row mb-3" id="fire<?php echo $room_id ?>">
                                                                                <div class="col-sm-6 ">
                                                                                    <!-- text input -->
                                                                                    <div class="form-group">
                                                                                        <label>มิเตอร์ไฟ เริ่ม</label>
                                                                                        <input name="firestart" id="firestart<?php echo $room_id ?>" type="number" class="form-control" placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>มิเตอร์ไฟ สิ้นสุด</label>
                                                                                        <input name="fireend" id="fireend<?php echo $room_id ?>" type="number" class="form-control" placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-12">
                                                                                    <label>มิเตอร์ไฟ ที่ใช้ไป</label>
                                                                                    <div class="input-group mb-3">
                                                                                        <input id="usefire<?php echo $room_id ?>" class="form-control" name="usefire" readonly>
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text">หน่วย</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-4">
                                                                                    <!-- text input -->
                                                                                    <div class="form-group">
                                                                                        <label>หน่วย : 10 บาท</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-8">

                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">รวม</span>
                                                                                        </div>
                                                                                        <input name="sumfire" class="form-control" id="sumfire<?php echo $room_id ?>" readonly>
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text">บาท</span>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row d-flex justify-content-end" id="alltotal">
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"> + ค่าห้อง 4500 รวมทั้งหมด</span>
                                                                                </div>
                                                                                <input name="total" class="form-control" id="total<?php echo $room_id ?>" readonly>
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text">บาท</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $("#water<?php echo $room_id ?>").on("change", function() {
                                                                            var unit = 10;
                                                                            var room = 4500;
                                                                            var value1 = document.getElementById('waterstart<?php echo $room_id ?>').value;
                                                                            var value2 = document.getElementById('waterend<?php echo $room_id ?>').value;
                                                                            var sum2 = document.getElementById('sumfire<?php echo $room_id ?>').value;

                                                                            var use = parseInt(value2) - parseInt(value1);
                                                                            var sum1 = parseInt(use) * parseInt(unit);
                                                                            var total = parseInt(sum1) + parseInt(sum2) + parseInt(room);

                                                                            document.getElementById("usewater<?php echo $room_id ?>").value = use;
                                                                            document.getElementById("sumwater<?php echo $room_id ?>").value = sum1;

                                                                            document.getElementById("total<?php echo $room_id ?>").value = total;
                                                                        });


                                                                        $("#fire<?php echo $room_id ?>").on("change", function() {
                                                                            var unit = 10;
                                                                            var room = 4500;
                                                                            var value1 = document.getElementById('firestart<?php echo $room_id ?>').value;
                                                                            var value2 = document.getElementById('fireend<?php echo $room_id ?>').value;
                                                                            var sum1 = document.getElementById('sumwater<?php echo $room_id ?>').value;

                                                                            var use = parseInt(value2) - parseInt(value1);
                                                                            var sum2 = parseInt(use) * parseInt(unit);
                                                                            var total = parseInt(sum1) + parseInt(sum2) + parseInt(room);

                                                                            document.getElementById("usefire<?php echo $room_id ?>").value = use;
                                                                            document.getElementById("sumfire<?php echo $room_id ?>").value = sum2;

                                                                            document.getElementById("total<?php echo $room_id ?>").value = total;

                                                                        });
                                                                    </script>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <button type="submit" name="submit" class="btn btn-flat btn-success ">บันทึก</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- END Modal Room -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">รายละเอียดข้อมูลการชำระ</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อผู้เช่า</th>
                                                <th>ชั้น</th>
                                                <th>หมายเลขห้อง</th>
                                                <th>ค่าใช้จ่ายทั้งหมด</th>
                                                <th>วันที่ทำรายการ</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tb_invoice INNER JOIN tb_booking ON tb_invoice.room_id = tb_booking.room_id 
 INNER JOIN tb_customer ON tb_booking.cus_id = tb_customer.cus_id 
  INNER JOIN tb_room ON tb_invoice.room_id = tb_room.room_id 
where tb_booking.status = 'อนุมัติ'";
                                            $query = $conn->query($sql);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $invoice_id = $row['invoice_id'];

                                                $invoice_curwaterbill = $row['invoice_curwaterbill'];
                                                $invoice_curelectricitybill = $row['invoice_curelectricitybill'];
                                                $expenses = $row['expenses'];

                                                $expenses = $row['expenses'];
                                                $invoice_date = $row['invoice_date'];
                                                $cus_fullname = $row['cus_fullname'];
                                                $room_number = $row['room_number'];
                                                $room_floor = $row['room_floor'];
                                                $booking_id  = $row['booking_id'];
                                                $invoice_waterbill = $row['invoice_waterbill'];
                                                $invoice_electricitybill = $row['invoice_electricitybill'];
                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $cus_fullname ?></td>
                                                    <td><?= $room_floor ?></td>
                                                    <td><?= $room_number ?></td>
                                                    <td><?= $expenses ?></td>
                                                    <td><?= $invoice_date ?></td>

                                                    <td>
                                                        <form method="POST">
                                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal<?= $invoice_id ?>">
                                                                <i class="fas fa-search"></i>&nbsp;รายละเอียด
                                                            </button>
                                                            <input type="hidden" value="<?= $invoice_id ?>" name="invoice_id">
                                                            <a href="receipt.php?invoice_id=<?= $invoice_id ?>" class="btn btn-primary btn-md m-1"><i class="fas fa-print"></i>&nbsp;พิม</a>
                                                            <button name="del" type='submit' class="btn btn-danger btn-md m-1"><i class="fas fa-trash-alt"></i>&nbsp;ลบ</button>

                                                        </form>
                                                    </td>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal<?= $invoice_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">ชำระเงิน</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST">

                                                                    <div class="modal-body">
                                                                        <input type="hidden" value="<?php echo $room_id ?>" name="room_id">
                                                                        <label>ชื่อ-นามสกุล</label>
                                                                        <input value="<?php echo $cus_fullname ?>" type="text" class="form-control" placeholder="" disabled>
                                                                        <br>
                                                                        <div class="row mb-3 border-bottom border-2">
                                                                            <div class="col-sm-6">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>ชั้น</label>
                                                                                    <input value="<?php echo $room_floor ?>" type="text" class="form-control" placeholder="" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>หมายเลขห้อง</label>
                                                                                    <input value="<?php echo $room_number ?>" type="text" class="form-control" placeholder="" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row border-bottom border-2">
                                                                            <div class="col-lg-6 col-12 border-right border-2">

                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-12">
                                                                                        <label>มิเตอร์น้ำ ที่ใช้ไป</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input value="<?php echo $invoice_curwaterbill ?>" id="usewater" class="form-control" name="usewater" disabled>
                                                                                            <div class="input-group-append">
                                                                                                <span class="input-group-text">หน่วย</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-4">
                                                                                        <!-- text input -->
                                                                                        <div class="form-group">
                                                                                            <label>หน่วย : 10 บาท</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-8">

                                                                                        <div class="input-group">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text">รวม</span>
                                                                                            </div>
                                                                                            <input name="sumfire" class="form-control" id="sumfire" readonly value="<?= $invoice_waterbill ?>">
                                                                                            <div class="input-group-append">
                                                                                                <span class="input-group-text">บาท</span>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>


                                                                            </div>

                                                                            <div class="col-lg-6 col-12 border-right border-2">

                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-12">
                                                                                        <label>มิเตอร์ไฟ ที่ใช้ไป</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input value="<?php echo $invoice_curelectricitybill ?>" id="usefire" class="form-control" name="usefire" disabled>
                                                                                            <div class="input-group-append">
                                                                                                <span class="input-group-text">หน่วย</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-4">
                                                                                        <!-- text input -->
                                                                                        <div class="form-group">
                                                                                            <label>หน่วย : 10 บาท</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-8">

                                                                                        <div class="input-group">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text">รวม</span>
                                                                                            </div>
                                                                                            <input name="sumfire" class="form-control" id="sumfire" readonly value="<?= $invoice_electricitybill ?>">
                                                                                            <div class="input-group-append">
                                                                                                <span class="input-group-text">บาท</span>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row d-flex justify-content-end" id="alltotal">
                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"> + ค่าห้อง 4500 รวมทั้งหมด</span>
                                                                                    </div>
                                                                                    <input value="<?php echo $expenses ?>" name="total" class="form-control" id="total" disabled>
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">บาท</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                    <div class="modal-footer">

                                                                        <button class="btn btn-flat btn-danger ">ปิด</button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

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

        <?php
        if (isset($_POST['submit'])) {

            $usewater = $_POST['usewater'];
            $usefire = $_POST['usefire'];
            $total = $_POST['total'];
            $sumfire = $_POST['sumfire'];
            $sumwater = $_POST['sumwater'];



            $cus_id = $_POST['cus_id'];
            $room_id = $_POST['room_id'];
            date_default_timezone_set('Asia/Bangkok');
            $date = date("Y-m-d");
            $sql = "INSERT INTO `tb_invoice`( `room_id`, `invoice_date`, `invoice_curwaterbill`, `invoice_curelectricitybill`, `cus_id`, `expenses`, `invoice_electricitybill`, `invoice_waterbill`)
			VALUES ('$room_id','$date','$usewater','$usefire','$cus_id','$total','$sumfire','$sumwater')";
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
            echo '<meta http-equiv="refresh" content="1;url=room_payment.php" />';
        }
        if (isset($_POST['del'])) {

            $invoice_id = $_POST['invoice_id'];

            $sql = "DELETE FROM tb_invoice WHERE invoice_id = '$invoice_id' ";
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
            echo '<meta http-equiv="refresh" content="1;url=room_payment.php" />';
        }
        ?>
</body>

</html>