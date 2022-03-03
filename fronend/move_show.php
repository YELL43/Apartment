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
                    <li class="breadcrumb-item active" aria-current="page">รายการแจ้งย้ายห้อง</li>
                </ol>
            </nav>
            <div class="row d-flex justify-content-end my-4">
                <div class="col-lg-3">
                    <a href="move_room.php" type="submit" class="btn btn-primary btn-md btn-block"><i class="fas fa-plus-square"></i>&nbsp;แจ้งย้ายห้อง</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">รายการแจ้งย้ายห้อง</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อผู้ย้าย</th>
                                        <th>ชั้นปัจจุบัน</th>
                                        <th>หมายเลขห้องปัจจุบัน</th>
                                        <th>ย้ายไปชั้น</th>
                                        <th>ย้ายไปหมายเลขห้อง</th>
                                        <th>วันที่แจ้งย้าย</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tb_notific_change
                                             INNER JOIN tb_customer ON tb_customer.cus_id = tb_notific_change.cus_id 
INNER JOIN tb_room ON tb_room.room_id = tb_notific_change.room_id";
                                    $query = $conn->query($sql);
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        $room_number = $row['room_number'];
                                        $status = $row['status'];
                                        $cus_fullname = $row['cus_fullname'];
                                        $notific_change_date = $row['notific_change_date'];
                                        $room_floor = $row['room_floor'];
                                        $room_change_floor = $row['room_change_floor'];
                                        $room_change_number = $row['room_change_number'];
                                        $room_id = $row['room_id'];
                                        $cus_id = $row['cus_id'];
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $cus_fullname ?></td>
                                            <td><?= $room_floor ?></td>
                                            <td><?= $room_number ?></td>
                                            <td><?= $room_change_floor ?></td>
                                            <td><?= $room_change_number ?></td>
                                            <td><?= $notific_change_date ?></td>


                                            <td>
                                                <form method='post'>
                                                    <div class="form-group">
                                                        <input type="hidden" value="<?= $room_id ?>" name="room_id">
                                                        <input type="hidden" value="<?= $cus_id ?>" name="cus_id">
                                                        <input type="hidden" value="<?= $room_change_floor ?>" name="room_change_floor">
                                                        <input type="hidden" value="<?= $room_change_number ?>" name="room_change_number">

                                                        <?php if ($status == 'รอดำเนินการ') { ?>
                                                            <span class="badge badge-success">
                                                                <h6>รอดำเนินการ</h6>
                                                            </span>
                                                        <?php } else if ($status == 'ไม่อนุญาติให้ย้าย') { ?>
                                                            <span class="badge badge-danger">
                                                                <h6>ไม่อนุญาติให้ย้าย</h6>
                                                            </span>
                                                        <?php } else {
                                                        ?> <span class="badge badge-warning">
                                                                <h6>ย้ายเรียบร้อย</h6>
                                                            </span><?php
                                                                } ?>
                                                        
                                                    </div>
                                                </form>

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