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
                            <h1 class="m-0">ข้อมูลห้อง</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลห้อง</li>
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
                                            <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> ห้องทั้งหมด </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="1">ห้องว่าง </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="2">ห้องไม่ว่าง </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="3">ห้องชำรุด </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="4">ห้องไม่ว่าง ห้องชำรุด </a>
                                        </div>
                                        <div class="mb-2">
                                            <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle=""> สลับเล่น เล่น!! </a>
                                            <div class="float-right">
                                                <select class="custom-select" style="width: auto;" data-sortorder="">
                                                    <option value="index"> Sort by Position </option>
                                                    <option value="sortData"> Sort by Custom Data </option>
                                                </select>
                                                <div class="btn-group">
                                                    <a class="btn btn-default" href="javascript:void(0)" data-sortasc=""> Ascending </a>
                                                    <a class="btn btn-default" href="javascript:void(0)" data-sortdesc=""> Descending </a>
                                                </div>
                                            </div>
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
                                                        <img data-toggle="modal" data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/FF0000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                                    </div>
                                                <?php } else  if ($room_status == 'ห้องชำรุด') { ?>
                                                    <div class="filtr-item col-sm-2" data-category="0,3,4" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 313px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                        <img data-toggle="modal" data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/F2D000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                                    </div>
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

                                                                    <select class="custom-select" name="state">
                                                                        <option selected disabled><?php echo $room_status ?></option>
                                                                        <option value="ห้องว่าง">ห้องว่าง</option>
                                                                        <option value="ห้องไม่ว่าง">ห้องไม่ว่าง</option>
                                                                        <option value="ห้องชำรุด">ห้องชำรุด</option>
                                                                    </select>
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

        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Script start -->
    <?php include('script.php'); ?>
    <!-- Script end -->

    <?php
    if (isset($_POST['submit'])) {
        $room_id = $_POST['room_id'];
        $state = $_POST['state'];

        $sql = "UPDATE tb_room SET room_status = '$state' WHERE  room_id = '$room_id'";
        $query = $conn->query($sql);

        echo "<script>
        $(document).ready(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                toastr.success('เปลี่ยนสถานะเรียบร้อย')
            });
    </script>";
        echo '<meta http-equiv="refresh" content="2;url=room_information.php" />';
    }

    ?>
</body>

</html>