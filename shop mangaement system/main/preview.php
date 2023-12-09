<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
    <?php
    $invoice = $_GET['invoice'];
    include('../connect.php');
    $result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
    $result->bindParam(':userid', $invoice);
    $result->execute();
    for ($i = 0; $row = $result->fetch(); $i++) {
        $cname = $row['name'];
        $invoice = $row['invoice_number'];
        $date = $row['date'];
        $cash = $row['due_date'];
        $cashier = $row['cashier'];

        $pt = $row['type'];
        $am = $row['amount'];
        if ($pt == 'cash') {
            $cash = $row['due_date'];
            $amount = $cash - $am;
        }
    }
    ?>
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-12">
            <a style="float: left;" href="sales.php?id=cash&invoice=<?php echo $finalcode ?>" class="btn btn-success btn-sm">
                    <i class="icon-arrow-left"></i> Back to Sales
            </a>
            <a style="float: right;" href="#" onclick="Clickheretoprint()" style="font-size:20px;">
                <button class="btn btn-danger btn-sm"><i class="fa fa-print"></i> Print</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="span10">
            <div class="content" id="content">
                <div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
                    <div style="width: 100%; height: 190px;">
                        <div style="width: 900px; float: left;">
                            <center>
                                <div style="font:bold 25px 'Aleo';">Sales Receipt</div>
                                Mabrur Grocery Shop <br>
                                Bamnartech, Ranavola Union,<br>
                                Uttara, Dhaka-1230
                                <br>
                            </center>
                            <div>
                                <?php
                                $resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
                                $resulta->bindParam(':a', $cname);
                                $resulta->execute();
                                for ($i = 0; $rowa = $resulta->fetch(); $i++) {
                                    $address = $rowa['address'];
                                    $contact = $rowa['contact'];
                                }
                                ?>
                            </div>
                        </div>
                        <div style="width: 136px; float: left; height: 70px;">
                            <table cellpadding="3" cellspacing="0"
                                   style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

                                <tr>
                                    <td>OR No. :</td>
                                    <td><?php echo $invoice ?></td>
                                </tr>
                                <tr>
                                    <td>Date :</td>
                                    <td><?php echo $date ?></td>
                                </tr>
                            </table>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div style="width: 100%; margin-top:-70px;">
                        <table border="1" cellpadding="4" cellspacing="0"
                               style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
                            <thead>
                            <tr>
                                <th width="90"> Item Code</th>
                                <th> Item Name</th>
                                <th> Qty</th>
                                <th> Price</th>
                                <th> Discount</th>
                                <th> Amount</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $id = $_GET['invoice'];
                            $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
                            $result->bindParam(':userid', $id);
                            $result->execute();
                            for ($i = 0; $row = $result->fetch(); $i++) {
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['product_code']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td>
                                        <?php
                                        $ppp = $row['price'];
                                        echo formatMoney($ppp, true);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $ddd = $row['discount'];
                                        echo formatMoney($ddd, true);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $dfdf = $row['amount'];
                                        echo formatMoney($dfdf, true);
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                            <tr>
                                <td colspan="5" style=" text-align:right;"><strong style="font-size: 12px;">Total:
                                        &nbsp;</strong></td>
                                <td colspan="2"><strong style="font-size: 12px;">
                                        <?php
                                        $sdsd = $_GET['invoice'];
                                        $resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
                                        $resultas->bindParam(':a', $sdsd);
                                        $resultas->execute();
                                        for ($i = 0; $rowas = $resultas->fetch(); $i++) {
                                            $fgfg = $rowas['sum(amount)'];
                                            echo formatMoney($fgfg, true);
                                        }
                                        ?>
                                    </strong></td>
                            </tr>
                            <?php if ($pt == 'cash') {
                                ?>
                                <tr>
                                    <td colspan="5" style=" text-align:right;"><strong
                                                style="font-size: 12px; color: #222222;">Cash Tendered:&nbsp;</strong>
                                    </td>
                                    <td colspan="2"><strong style="font-size: 12px; color: #222222;">
                                            <?php
                                            echo formatMoney($cash, true);
                                            ?>
                                        </strong></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="5" style=" text-align:right;"><strong
                                            style="font-size: 12px; color: #222222;">
                                        <font style="font-size:20px;">
                                            <?php
                                            if ($pt == 'cash') {
                                                echo 'Change:';
                                            }
                                            if ($pt == 'credit') {
                                                echo 'Due Date:';
                                            }
                                            ?>&nbsp;
                                    </strong></td>
                                <td colspan="2"><strong style="font-size: 15px; color: #222222;">
                                        <?php
                                        function formatMoney($number, $fractional = false)
                                        {
                                            if ($fractional) {
                                                $number = sprintf('%.2f', $number);
                                            }
                                            while (true) {
                                                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                                                if ($replaced != $number) {
                                                    $number = $replaced;
                                                } else {
                                                    break;
                                                }
                                            }
                                            return $number;
                                        }

                                        if ($pt == 'credit') {
                                            echo $cash;
                                        }
                                        if ($pt == 'cash') {
                                            echo formatMoney($amount, true);
                                        }
                                        ?>
                                    </strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

