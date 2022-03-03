<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="jp_contact_map_wrapper">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3963.7765946627687!2d101.2910614!3d6.5498666!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b37433c725c409%3A0x5d7bf86ff8cf8d02!2z4LiE4Li44LiT4Lir4LiN4Li04LiHIOC4reC4nuC4suC4o-C5jOC4l-C5gOC4oeC5ieC4meC4l-C5jCDguKLguLDguKXguLI!5e0!3m2!1sth!2sth!4v1643993888852!5m2!1sth!2sth" style="width:100%; float:left; height:655px;  border-top-color: white;" allowfullscreen="" loading="lazy"></iframe>
        <div class="jp_map_cont_label">
            <h3>คุณสามารถหาเราได้ที่</h3>
            <p>50/5 ถนน เทศบาล 5 สะเตง อำเภอเมืองยะลา ยะลา 95000 โทร +66943198989</p>
        </div>
    </div>


    <style>
        .carousel-control-prev,
        .carousel-control-next {
            background: url(img/arrows.png);
            width: 22px;
            height: 33px;
            position: absolute;
            top: 40%;
            display: block;
            padding: 0;
            cursor: pointer;
            color: transparent;
            border: none;
            outline: none;
            z-index: 100;
        }

        .carousel-control-prev {
            background-position: 0px;
            left: 0px;
        }

        .carousel-control-next {
            background-position: -22px;
            right: 0px;
        }


        .jp_contact_map_wrapper {
            float: left;
            width: 100%;
            position: relative;
        }

        .jp_map_cont_label {
            float: left;
            width: 260px;
            background: #ffffff;
            position: absolute;
            top: 55%;
            left: 0;
            right: 0;
            margin: 0px auto;
            z-index: 1000;
            padding: 30px;
        }

        .jp_map_cont_label:after {
            content: '';
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 15px solid #ffffff;
            position: absolute;
            left: 113px;
            top: -15px;
        }

        .jp_map_cont_label h3 {
            font-size: 16px;
            font-weight: bold;
            color: #000000;
            position: relative;
        }

        .jp_map_cont_label h3:after {
            content: '';
            border: 1px solid #23c0e9;
            width: 30px;
            position: absolute;
            bottom: -15px;
            left: 11px;
        }

        .jp_map_cont_label h3:before {
            content: '';
            border: 1px solid #23c0e9;
            width: 8px;
            position: absolute;
            bottom: -15px;
            left: 0;
        }

        .jp_map_cont_label p {
            padding-top: 35px;
        }
    </style>









    <?php include('script.php') ?>
</body>

</html>