<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div  class="container mt-4 testll">
        <br>
        <div class="row">
            <a href="repair_show.php" class="col-12 col-lg-4 notify">
                <div class="text-center">
                    <img src="https://media.discordapp.net/attachments/589667494718078979/940510275063382017/1.png" width="400px" alt="">
                </div>

                <div class="small-box bg-info text-center">
                    <div class="inner">
                        <h3>แจ้งซ่อมอุปกรณ์</h3>
                        <p></p>

                    </div>
                </div>
            </a>

            <a href="move_show.php" class="col-12 col-lg-4 notify">
                <div class="text-center">
                    <img src="https://media.discordapp.net/attachments/589667494718078979/940510275470262312/2.png" width="400px" alt="">
                </div>
                <div class="small-box bg-info text-center">
                    <div class="inner">
                        <h3>แจ้งย้ายห้อง</h3>
                        <p></p>
                    </div>
                </div>
            </a>

            <a href="out_show.php" class="col-12 col-lg-4 notify">
                <div class="text-center">
                    <img src="https://media.discordapp.net/attachments/589667494718078979/940510275642212362/3.png" width="400px" alt="">
                </div>
                <div class="small-box bg-info text-center">
                    <div class="inner">
                        <h3>แจ้งย้ายออก</h3>
                        <p></p>
                    </div>
                </div>

            </a>
        </div>
    </div>

    <style>
        .notify .inner:hover {
            background-color: #C86A44;

        }

        .notify img {
            transition: transform .5s ease;
        }

        .notify:hover img {
            transform: scale(0.5);
        }
    </style>

    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() { // set Interval function to carry out same operation in the time specified
                $('.testll').load('notify.php .testll > *'); // Reloads 'seminar-overview.php' table every 6 seconds as <div> tag is specified and closed after table
            }, 3000);
        });
    </script> -->



    <?php include('script.php') ?>
</body>






</html>