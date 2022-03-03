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
                    <li class="breadcrumb-item active" aria-current="page">รายการแจ้งซ่อมอุปกรณ์</li>
                </ol>
            </nav>
            <div class="row d-flex justify-content-end my-4">
                <div class="col-lg-3">
                    <a href="repair.php" type="submit" class="btn btn-primary btn-md btn-block"><i class="fas fa-plus-square"></i>&nbsp;แจ้งซ่อมอุปกรณ์</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">รายการแจ้งซ่อมอุปกรณ์</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชั้น</th>
                                        <th>หมายเลขห้อง</th>
                                        <th>รายละเอียด</th>
                                        <th>วันที่แจ้ง</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id =  $cus_id;
                                    $sql = "SELECT * FROM tb_notific_fix
                                    INNER JOIN tb_customer ON tb_customer.cus_id = tb_notific_fix.cus_id 
INNER JOIN tb_room ON tb_room.room_id = tb_notific_fix.room_id WHERE tb_notific_fix.cus_id = '$id'";
                                    $query = $conn->query($sql);
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        $status = $row['status'];
                                        $notific_fix_date = $row['notific_fix_date'];
                                        $notific_fix_detail = $row['notific_fix_detail'];
                                        $room_number = $row['room_number'];
                                        $room_floor = $row['room_floor'];
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $room_floor ?></td>
                                            <td><?= $room_number ?></td>
                                            <td><?= $notific_fix_detail ?></td>
                                            <td><?= $notific_fix_date ?></td>

                                            <td><?php if ($status == 'รอดำเนินการ') { ?>
                                                    <span class="badge badge-success">
                                                        <h6>รอดำเนินการ</h6>
                                                    </span>
                                                <?php } else if ($status == 'ซ่อมเรียบร้อย') { ?>
                                                    <span class="badge badge-warning">
                                                        <h6>ซ่อมเรียบร้อย</h6>
                                                    </span>
                                                <?php } ?>
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




    <?php include('script.php') ?>
</body>






</html>