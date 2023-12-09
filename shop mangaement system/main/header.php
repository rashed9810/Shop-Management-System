<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('a[rel*=facebox]').facebox({
                loadingImage: 'src/loading.gif',
                closeImage: 'src/closelabel.png'
            })
        })
    </script>
    <title>Point of Sale</title>
    <?php
    require_once('auth.php');
    ?>
    <link href="../main/css/style.css" media="screen" rel="stylesheet" type="text/css"/>

    <link href="../main/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="../main/bootstrap/css/bootstrap.rtl.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="../main/bootstrap/css/bootstrap-grid.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="../main/bootstrap/css/bootstrap-grid.rtl.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="../main/bootstrap/css/bootstrap-reboot.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="../main/bootstrap/css/bootstrap-reboot.rtl.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="../main/bootstrap/css/bootstrap-utilities.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="../main/bootstrap/css/bootstrap-utilities.rtl.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" media="screen"
          rel="stylesheet" type="text/css"/>
    <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" media="screen" rel="stylesheet"
          type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" media="screen" rel="stylesheet"
          type="text/css"/>
    <script language="javascript" type="text/javascript">
        // <
        // !--Begin
        // var timerID = null;
        // var timerRunning = false;
        //
        // function stopclock() {
        //     if (timerRunning)
        //         clearTimeout(timerID);
        //     timerRunning = false;
        // }
        //
        // function showtime() {
        //     var now = new Date();
        //     var hours = now.getHours();
        //     var minutes = now.getMinutes();
        //     var seconds = now.getSeconds()
        //     var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
        //     if (timeValue == "0") timeValue = 12;
        //     timeValue += ((minutes < 10) ? ":0" : ":") + minutes
        //     timeValue += ((seconds < 10) ? ":0" : ":") + seconds
        //     timeValue += (hours >= 12) ? " P.M." : " A.M."
        //     document.clock.face.value = timeValue;
        //     timerID = setTimeout("showtime()", 1000);
        //     timerRunning = true;
        // }
        //
        // function startclock() {
        //     stopclock();
        //     showtime();
        // }
        //
        // window.onload = startclock;
        // // End -->
    </SCRIPT>

</head>
<?php
function createRandomPassword()
{
    $chars = "003232303232023232023456789";
    srand((double)microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}

$finalcode = 'RS-' . createRandomPassword();
?>
<body>
