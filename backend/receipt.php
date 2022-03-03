<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
<?php include('head.php'); ?>

<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,1000);
    @import 'https://fonts.googleapis.com/css?family=Sriracha|Prompt';

    @media print {
        * {
            font-family: 'Sriracha', sans-serif;
        }
    }

    body {
        margin: 0;
        padding: 0;
        background: #e1e1e1;
    }

    div,
    p,
    a,
    li,
    td {
        -webkit-text-size-adjust: none;
    }

    .ReadMsgBody {
        width: 100%;
        background-color: #ffffff;
    }

    .ExternalClass {
        width: 100%;
        background-color: #ffffff;
    }



    html {
        width: 100%;
    }

    p {
        padding: 0 !important;
        margin-top: 0 !important;
        margin-right: 0 !important;
        margin-bottom: 0 !important;
        margin-left: 0 !important;
    }

    .visibleMobile {
        display: none;
    }

    .hiddenMobile {
        display: block;
    }

    @media only screen and (max-width: 1200px) {


        table[class=fullTable] {
            width: 96% !important;
            clear: both;
        }

        table[class=fullPadding] {
            width: 85% !important;
            clear: both;
        }

        table[class=col] {
            width: 45% !important;
        }

        .erase {
            display: none;
        }
    }

    @media only screen and (max-width: 420px) {
        table[class=fullTable] {
            width: 100% !important;
            clear: both;
        }

        table[class=fullPadding] {
            width: 85% !important;
            clear: both;
        }

        table[class=col] {
            width: 100% !important;
            clear: both;
        }

        table[class=col] td {
            text-align: left !important;
        }

        .erase {
            display: none;
            font-size: 0;
            max-height: 0;
            line-height: 0;
            padding: 0;
        }

        .visibleMobile {
            display: block !important;
        }

        .hiddenMobile {
            display: none !important;
        }
    }
</style>



<?php

$invoice_id = $_GET['invoice_id'];

$sql = "SELECT * FROM tb_invoice INNER JOIN tb_booking ON tb_invoice.room_id = tb_booking.room_id 
 INNER JOIN tb_customer ON tb_booking.cus_id = tb_customer.cus_id 
  INNER JOIN tb_room ON tb_invoice.room_id = tb_room.room_id 
where tb_invoice.invoice_id = '$invoice_id' ";


$query = $conn->query($sql);
$i = 1;
while ($row = mysqli_fetch_array($query)) {
    $invoice_id = $row['invoice_id'];

    $invoice_curwaterbill = $row['invoice_curwaterbill'];
    $invoice_curelectricitybill = $row['invoice_curelectricitybill'];
    $expenses = $row['expenses'];

    $invoice_date = $row['invoice_date'];
    $cus_fullname = $row['cus_fullname'];
    $room_number = $row['room_number'];
    $room_floor = $row['room_floor'];
    $booking_id  = $row['booking_id'];
    $invoice_waterbill = $row['invoice_waterbill'];
    $invoice_electricitybill = $row['invoice_electricitybill'];
?>

<?php } ?>




<div onclick="printContent('print')" id='print'>
    <!-- Header -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable">
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td>
                <table width="1200" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
                    <tr class="hiddenMobile">
                        <td height="40"></td>
                    </tr>
                    <tr class="visibleMobile">
                        <td height="30"></td>
                    </tr>

                    <tr>
                        <td>
                            <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                                <tbody>
                                                    <tr>
                                                        <td align="left"> <img src="dist/img/AdminLTELogo.png" height="200px" width="auto" alt="logo" border="0" /><small style="font-size: 25px;">คุณหญิง อพาร์ทเม้นท์</small></td>
                                                    </tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="40"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                                <tbody>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 23px; color: #ff0000; letter-spacing: -1px;  line-height: 1; vertical-align: top; text-align: right;">
                                                            ใบเสร็จชำระเงิน
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="50"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 18px; color: #5b5b5b;  line-height: 20px; vertical-align: top; text-align: right;">
                                                            <small>วันที่ <?= $invoice_date  ?></small><br />
                                                            <small>ชั้น 3 ห้อง 307</small></br>
                                                            <small>คุณ มะยูกี เจะมามะ</small>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- /Header -->
    <!-- Order Details -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tbody>
            <tr>
                <td>
                    <table width="1200" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                        <tbody>
                            <tr>
                            <tr class="hiddenMobile">
                                <td height="60"></td>
                            </tr>
                            <tr class="visibleMobile">
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <th style="font-size: 16px;   font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
                                                    รายการ
                                                </th>

                                                <th style="font-size: 16px;   font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                                                    หน่วย
                                                </th>
                                                <th style="font-size: 16px;   font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                                                    ที่ใช้ไป
                                                </th>
                                            </tr>
                                            <tr>
                                                <td height="1" style="background: #bebebe;" colspan="4"></td>
                                            </tr>
                                            <tr>
                                                <td height="10" colspan="4"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                                                    ค่าน้ำ
                                                </td>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small style="font-size: 15px;">หน่วยละ 10 </small></td>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><?= $invoice_curwaterbill  ?></td>
                                                <td style="font-size: 15px;  color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right"><?= $invoice_waterbill ?> บาท</td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">ค่าไฟ</td>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small style="font-size: 15px;">หน่วยละ 10 </small></td>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><?= $invoice_electricitybill  ?></td>
                                                <td style="font-size: 15px;  color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right"><?= $invoice_electricitybill ?> บาท</td>
                                            </tr>
                                            <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>

                                            <tr>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">ค่าห้อง</td>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>-</small></td>
                                                <td style="font-size: 15px;  color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">-</td>
                                                <td style="font-size: 15px;  color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">$4,500</td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /Order Details -->
    <!-- Total -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tbody>
            <tr>
                <td>
                    <table width="1200" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                        <tbody>
                            <tr>
                                <td>

                                    <!-- Table Total -->
                                    <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <td style="font-size: 12px;  color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                </td>
                                                <td style="font-size: 12px;  color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="font-size: 18px;  color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <strong style="font-size: 18px; color: #ff0000;">รวมเป็นเงินทั้งสิน&nbsp;</strong>
                                                </td>
                                                <td style="font-size: 12px;  color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <strong style="font-size: 18px; color: #ff0000;"><?= $expenses ?> บาท</strong>
                                                </td>
                                            </tr>
                                            <tr class="hiddenMobile">
                                                <td height="80"></td>
                                            </tr>


                                        </tbody>
                                    </table>
                                    <!-- /Table Total -->

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /Total -->


    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">

        <tr>
            <td>
                <table width="1200" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
                    <tr>
                        <td>
                            <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                    <tr>
                                        <td style="font-size: 16px; color: #5b5b5b;  line-height: 18px; vertical-align: top; text-align: left;">
                                            ขอบคุณค่ะ / ครับ.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="spacer">
                        <td height="50"></td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
    </table>

    </tr>
</div>
<?php include('script.php') ?>