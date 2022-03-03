<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>แสดงจำนวนผู้เข้าพักในเเต่ละเดือน</h4>
            </div>
            <canvas id="chartjs_bar"></canvas>
        </div>
    </div>
</div>
<script type="text/javascript">
    <?php
    $sql = "SELECT DISTINCT COUNT(`booking_id`) as `cus_id`,  DATE_FORMAT(`booking_date`, '%M-%Y') as booking_date  FROM tb_booking WHERE status = 'อนุมัติ' OR status = 'ย้ายออก' GROUP by DATE_FORMAT(`booking_date`, '%M-%Y')";
    $query = $conn->query($sql);
    while ($row = mysqli_fetch_array($query)) {
        $booking_date[] = $row['booking_date'];
        $cus_id[] = $row['cus_id'];
    }
    ?>
     var colors = [];
    var $ch = 0;
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
    for (let i = 0; i < <?php echo json_encode($cus_id); ?>.length; i++) {
        this.colors.push(generateRandomColor())
    }
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($booking_date); ?> ,
            datasets: [{
                label: 'แสดงจำนวนผู้เข้าพักในเเต่ละเดือน',
                backgroundColor:  this.colors,
                data: <?php echo json_encode($cus_id); ?>,
            }]
        },
        

    });
    function generateRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>