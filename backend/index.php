<!DOCTYPE html>
<html lang="en">
  
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>
<?php
$sqlnotific_fix = "SELECT COUNT(`notific_fix_id`) FROM `tb_notific_fix` WHERE `status` = 'รอดำเนินการ'";
$querynotific_fix = $conn->query($sqlnotific_fix);
$querynotific_fix2 = mysqli_fetch_array($querynotific_fix);

$sqltb_notific_change = "SELECT COUNT(`notific_change_id`) FROM `tb_notific_change` WHERE `status` = 'รอดำเนินการ'";
$querytb_notific_change = $conn->query($sqltb_notific_change);
$querytb_notific_change2 = mysqli_fetch_array($querytb_notific_change);

$sqlnotific_chkout = "SELECT COUNT(`notific_chkout_id`) FROM `tb_notific_chkout` WHERE `status` = 'รอดำเนินการ'";
$querynotific_chkout = $conn->query($sqlnotific_chkout);
$querynotific_chkout2 = mysqli_fetch_array($querynotific_chkout);
?>

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
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $querynotific_fix2[0] ?> </h3>

                  <p>รายการแจ้งซ่อม</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $querytb_notific_change2[0] ?></h3>

                  <p>รายการแจ้งย้าย</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?= $querynotific_chkout2[0] ?></h3>

                  <p>รายการแจ้งออก</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body px-3">
            <div>
              <a class="btn btn-outline-primary" href="index.php?p=c">จำนวนผู้เข้าพักในเเต่ละเดือน</a>
              <a class="btn btn-outline-primary" href="index.php?p=d">จำนวนรายได้ในเเต่ละเดือน</a>

              <?php $p = (isset($_GET['p']) ? $_GET['p'] : '');
              if ($p == 'd') {
                include('admin_show_date.php');
              } elseif ($p == 'c') {
                include('admin_show_customer.php');
              } else {
                include('admin_show_date.php');
              }
              ?>
            </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- Script start -->
    <?php include('script.php'); ?>
    <!-- Script end -->

  </div>
</body>

</html>