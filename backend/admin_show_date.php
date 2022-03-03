       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
       <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-header">
                       <div class="row">
                           <div class="col-10">
                               <h4>แสดงรายได้ ในเเต่ละเดือน</h4>
                           </div>
                           <div class="col-2">
                               <form method="POST">
                                   <select class="custom-select" name="search" onchange="this.form.submit()">
                                       <option selected disabled>---- เลือกปี ----</option>
                                       <option value="2022">2565</option>
                                       <option value="2023">2566</option>
                                   </select>
                               </form>
                           </div>
                       </div>

                   </div>
                   <br>
                   <canvas id="chartjs_bar" width="800px" height="250px"></canvas>
                   <br>
               </div>
           </div>
       </div>
       <?php

        if (isset($_POST['search'])) {
            $year = $_POST['search'];
            $sql = "SELECT distinct DATE_FORMAT(invoice_date, '%M') as invoice_date ,sum(`expenses`) as expenses FROM tb_invoice WHERE status = 'ชำระเรียบร้อย'  AND  YEAR(`invoice_date`) LIKE '%$year%' GROUP BY DATE_FORMAT(invoice_date, '%M')";
        } else {
            $sql = "SELECT distinct DATE_FORMAT(invoice_date, '%M') as invoice_date ,sum(`expenses`) as expenses FROM tb_invoice WHERE status = 'ชำระเรียบร้อย' GROUP BY DATE_FORMAT(invoice_date, '%M')";
        }
        // $sql = "SELECT distinct DATE_FORMAT(invoice_date, '%M-%Y') as invoice_date ,sum(`expenses`) as expenses FROM tb_invoice WHERE status = 'ชำระเรียบร้อย'  AND YEAR(`invoice_date`) LIKE '%2021%'  GROUP by invoice_date";

        $month_arr = array(
            "January" => "มกราคม",
            "February" => "กุมภาพันธ์",
            "March" => "มีนาคม",
            "April" => "เมษายน",
            "May" => "พฤษภาคม",
            "June" => "มิถุนายน",
            "July" => "กรกฎาคม",
            "August" => "สิงหาคม",
            "September" => "กันยายน",
            "October" => "ตุลาคม",
            "November" => "พฤศจิกายน",
            "December" => "ธันวาคม"
        );

        $query = $conn->query($sql);
        while ($row = mysqli_fetch_array($query)) {
            $invoice_date[] = $month_arr[$row['invoice_date']];
            $expenses[] = $row['expenses'];
        }
        ?>

       <script type="text/javascript">
           var colors = [];
           var $ch = 0;
           var ctx = document.getElementById("chartjs_bar").getContext('2d');

           var myChart = new Chart(ctx, {
               type: 'bar',
               data: {
                   labels: <?php echo json_encode($invoice_date); ?>,
                   datasets: [{
                       label: 'แสดงรายได้ ในแต่ละเดือน',
                       backgroundColor: this.colors,
                       data: <?php echo json_encode($expenses); ?>,

                       backgroundColor: [
                           'rgba(255, 99, 132, 0.2)',
                           'rgba(54, 162, 235, 0.2)',
                           'rgba(255, 206, 86, 0.2)',
                           'rgba(75, 192, 192, 0.2)',
                           'rgba(153, 102, 255, 0.2)',
                           'rgba(255, 159, 64, 0.2)',

                       ],
                       borderColor: [
                           'rgba(255,99,132,1)',
                           'rgba(54, 162, 235, 1)',
                           'rgba(255, 206, 86, 1)',
                           'rgba(75, 192, 192, 1)',
                           'rgba(153, 102, 255, 1)',
                           'rgba(255, 159, 64, 1)'
                       ],
                       borderWidth: 2
                   }]
               },


           });
       </script>