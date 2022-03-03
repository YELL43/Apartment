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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
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
                                    <h3 class="card-title">ข้อมูลการจอง</h3>
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
                                                <th>วันที่จอง</th>
                                                <th>วันที่เข้าอยู่</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>มะยูกี เจะมามะ</td>
                                                <td>305</td>
                                                <td>2</td>
                                                <td>วันที่จอง</td>
                                                <td>วันที่เข้าอยู่</td>
                                                <td><button type="button" class="btn btn-success"><i class="fas fa-edit"></i>แก้ไข</button>
                                                    <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>มะยูกี เจะมามะ</td>
                                                <td>305</td>
                                                <td>2</td>
                                                <td>วันที่จอง</td>
                                                <td>วันที่เข้าอยู่</td>
                                                <td><button type="button" class="btn btn-success"><i class="fas fa-edit"></i>แก้ไข</button>
                                                    <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</button>
                                                </td>
                                            </tr>





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
            <!-- left column -->

            <!-- Script start -->
            <?php include('script.php'); ?>
            <!-- Script end -->
</body>

</html>