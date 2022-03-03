<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ข้อมูลพนักงาน</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลพนักงาน </li>
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">รายละเอียดข้อมูลพนักงาน</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div align="right">
                                        <div class="col-sm-12 col-md-2">
                                            <a href="employee_add.php" class="btn btn-flat btn-info btn-md m-1"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มข้อมูลพนักงาน</a>
                                        </div>
                                    </div>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อ</th>
                                                <th>ตำแหน่ง</th>
                                                <th>เบอร์โทร</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tb_employee";
                                            $query = $conn->query($sql);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $employee_id = $row['employee_id'];
                                                $employee_fullname = $row['employee_fullname'];
                                                $employee_position = $row['employee_position'];
                                                $employee_tell = $row['employee_tell'];
                                                $employee_address = $row['employee_address'];


                                            ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $employee_fullname ?></td>
                                                    <td><?php echo $employee_position ?></td>
                                                    <td><?php echo $employee_tell ?></td>
                                                    <td>
                                                        <a href="employee_edit.php?id=<?php echo $employee_id ?>" class="btn btn-success btn-md m-1 text-light"><i class="fas fa-edit"></i></i>&nbsp;ข้อมูลเพิ่มเติม</a>
                                                        <a href="employee_information.php?delete=<?php echo $employee_id ?>" class="btn btn-danger btn-md m-1" onclick="return confirm('คุณแน่ใจว่าต้องการลบข้อมูล ?')" ><i class="fas fa-trash-alt"></i>&nbsp;ลบ</a>
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
            <!-- /.content -->

            <?php
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $sql = "DELETE FROM tb_employee WHERE employee_id = '$id'";
                $query = $conn->query($sql);
                echo "<script>
    $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            toastr.success('ลบข้อมูลเรียบร้อย')
        });
</script>";
                echo '<meta http-equiv="refresh" content="1;url=employee_information.php" />';
            }
            ?>


        </div>
        <!-- Script start -->
        <?php include('script.php'); ?>
        <!-- Script end -->
</body>

</html>