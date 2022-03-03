<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <section class="content">

        <div class="container">
            <br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="notify.php">ข้อมูลการแจ้ง</a></li>
                    <li class="breadcrumb-item active" aria-current="page">รายการแจ้งย้ายออก</li>
                </ol>
            </nav>
            <div class="row d-flex justify-content-end my-4">
                <div class="col-lg-3">
                    <a href="out_room.php" type="submit" class="btn btn-primary btn-md btn-block"><i class="fas fa-plus-square"></i>&nbsp;แจ้งย้ายออก</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">รายการแจ้งย้ายออก</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example3" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชั้น</th>
                                        <th>หมายเลขห้อง</th>
                                        <th>วันที่แจ้ง</th>
                                        <th>วันที่ออก</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tb_notific_chkout
                                    INNER JOIN tb_customer ON tb_customer.cus_id = tb_notific_chkout.cus_id
                                    INNER JOIN tb_room ON tb_room.room_id = tb_notific_chkout.room_id  WHERE tb_customer.cus_id = '$cus_id'";
                                    $query = $conn->query($sql);
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        $room_number = $row['room_number'];
                                        $status = $row['status'];
                                        $cus_fullname = $row['cus_fullname'];
                                        $notific_chkout_date = $row['notific_chkout_date'];
                                        $notific_chkout_outdate = $row['notific_chkout_outdate'];
                                        $room_id = $row['room_id'];
                                        $cus_id = $row['cus_id'];
                                        $room_floor = $row['room_floor'];


                                    ?>

                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $room_floor ?></td>
                                            <td><?= $room_number ?></td>
                                            <td><?= $notific_chkout_date ?></td>
                                            <td><?= $notific_chkout_outdate ?></td>
                                            <td>
                                                <?php if ($status == 'อนุมัติ') { ?>
                                                    <span class="badge badge-warning">
                                                        <h6>ดำเนินการแล้ว</h6>
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">
                                                        <h6>รอดำเนินการ</h6>
                                                    </span>
                                                <?php } ?>
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




    <?php include('script.php') ?>
</body>






</html>