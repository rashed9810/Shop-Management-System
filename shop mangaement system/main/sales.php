<?php include 'header.php'; ?>
<?php include('navfixed.php'); ?>
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-md-11"></div>
            <div class="col-md-1">
                <a style="text-align: right;" href="index.php" class="btn btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Sales Panel</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $position = $_SESSION['SESS_LAST_NAME'];
                                    if ($position == 'cashier') {
                                        ?>
                                        <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>

                                        <a href="../index.php">Logout</a>
                                        <?php
                                    }
                                    if ($position == 'admin') {
                                        ?>
                                    <?php } ?>
                                    <form action="incoming.php" method="post">

                                        <input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>"/>
                                        <input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>"/>
                                        <select name="product" style="width:650px; " class="chzn-select" required>
                                            <option></option>
                                            <?php
                                            include('../connect.php');
                                            $result = $db->prepare("SELECT * FROM products");
//                                            $result->bindParam(':userid', $res);
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {
                                                ?>
                                                <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_code']; ?>
                                                    - <?php echo $row['gen_name']; ?>
                                                    - <?php echo $row['product_name']; ?> |
                                                    Expires
                                                    at: <?php echo $row['expiry_date']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="number" name="qty" value="1" min="1" placeholder="Qty"
                                               autocomplete="off"
                                               style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;"
                                        / required>
                                        <input type="hidden" name="discount" value="0" autocomplete="off"
                                               style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;"/>
                                        <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>"/>
                                        <Button type="submit" class="btn btn-info"
                                                style="width: 123px; height:35px; margin-top:-5px;"/>
                                        <i class="icon-plus-sign icon-large"></i> Add</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="resultTable" data-responsive="table">
                                        <thead>
                                        <tr>
                                            <th> Product Name</th>
                                            <th> Generic Name</th>
                                            <th> Category / Description</th>
                                            <th> Price</th>
                                            <th> Qty</th>
                                            <th> Amount</th>
                                            <th> Profit</th>
                                            <th> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $id = $_GET['invoice'];
                                        include('../connect.php');
                                        $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
                                        $result->bindParam(':userid', $id);
                                        $result->execute();
                                        for ($i = 1; $row = $result->fetch(); $i++) {
                                            ?>
                                            <tr class="record">
                                                <td hidden><?php echo $row['product']; ?></td>
                                                <td><?php echo $row['product_code']; ?></td>
                                                <td><?php echo $row['gen_name']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td>
                                                    <?php
                                                    $ppp = $row['price'];
                                                    echo formatMoney($ppp, true);
                                                    ?>
                                                </td>
                                                <td><?php echo $row['qty']; ?></td>
                                                <td>
                                                    <?php
                                                    $dfdf = $row['amount'];
                                                    echo formatMoney($dfdf, true);
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $profit = $row['profit'];
                                                    echo formatMoney($profit, true);
                                                    ?>
                                                </td>
                                                <td width="90"><a
                                                            href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty']; ?>&code=<?php echo $row['product']; ?>">
                                                        <button class="btn btn-mini btn-warning"><i
                                                                    class="icon icon-remove"></i> Cancel
                                                        </button>
                                                    </a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <td> Total Amount:</td>
                                            <td> Total Profit:</td>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th colspan="5"><strong
                                                        style="font-size: 12px; color: #222222;">Total:</strong>
                                            </th>
                                            <td colspan="1"><strong style="font-size: 12px; color: #222222;">
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
                                            <td colspan="1"><strong style="font-size: 12px; color: #222222;">
                                                    <?php
                                                    $resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
                                                    $resulta->bindParam(':b', $sdsd);
                                                    $resulta->execute();
                                                    for ($i = 0; $qwe = $resulta->fetch(); $i++) {
                                                        $asd = $qwe['sum(profit)'];
                                                        echo formatMoney($asd, true);
                                                    }
                                                    ?>

                                            </td>
                                            <th></th>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="checkout.php?pt=<?php echo $_GET['id'] ?>&invoice=<?php echo $_GET['invoice'] ?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME'] ?>"
                                       class="btn btn-success">
                                        <i class="fa fa-save icon-large"></i> Confirm
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>