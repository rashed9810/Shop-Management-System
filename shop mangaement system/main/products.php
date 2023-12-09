<?php include 'header.php'; ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM products ORDER BY qty_sold DESC");
$result->execute();
$rowcount = $result->rowcount();
?>

<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM products where qty < 10 ORDER BY product_id DESC");
$result->execute();
$rowcount123 = $result->rowcount();

?>

<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM products where expiry_date < DATE_ADD(DATE(now()), INTERVAL 4 DAY) ORDER BY product_id DESC");
$result->execute();
$total = $result->rowcount();

?>
<div class="container-fluid">
    <div class="row mt-4 mb-4">
        <div class="col-md-12 text-center">
            <h3>Product List's</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <p>
                                <b class="text-success">Total Number of Products: <?php echo $rowcount; ?></b> |
                                <b class="text-warning">Products are below QTY of 10: <?php echo $rowcount123; ?></b> |
                                <b class="text-danger">Total expired products: <?php echo $total; ?></b>
                            </p>
                        </div>
                        <div class="col-md-1">
                            <a href="index.php" class="btn btn-secondary btn-sm">
                                <i class="fa fa-arrow-left"></i>
                                Back
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="addproduct.php" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>
                                Create New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-hover" id="resultTable">
                        <thead>
                        <tr>
                            <th width="12%"> Item Code</th>
                            <th width="12%"> Item Name</th>
                            <th width="11%"> Category</th>
                            <th width="7%"> Supplier</th>
                            <th width="9%"> Date Received</th>
                            <th width="10%"> Expiry Date</th>
                            <th width="6%"> Original Price</th>
                            <th width="6%"> Selling Price</th>
                            <th width="6%"> QTY</th>
                            <th width="5%"> Qty Left</th>
                            <th width="8%"> Total</th>
                            <th width="12%"> Action</th>
                        </tr>
                        </thead>
                        <tbody>
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

                        include('../connect.php');
                        $result = $db->prepare("SELECT *, price * qty as total FROM products ORDER BY product_id DESC");
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                            $total = $row['total'];
                            $availableqty = $row['qty'];
                            if ($availableqty < 10) {
                                echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
                            }

                            $total = $row['total'];
                            $expiredgood = $row['expiry_date'];
                            if ($expiredgood < 'expiry_date') {
                                echo '<tr class="alert alert-warning record" style="color: #fff; background:#e30fff;">';


                            } else {
                                echo '<tr class="record">';
                            }
                            ?>
                            <td><?php echo $row['product_code']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['gen_name']; ?></td>
                            <td><?php echo $row['supplier']; ?></td>
                            <td><?php echo $row['date_arrival']; ?></td>
                            <td><?php echo $row['expiry_date']; ?></td>
                            <td><?php
                                $oprice = $row['o_price'];
                                echo formatMoney($oprice, true);
                                ?></td>
                            <td><?php
                                $pprice = $row['price'];
                                echo formatMoney($pprice, true);
                                ?></td>
                            <td><?php echo $row['qty_sold']; ?></td>
                            <td><?php echo $row['qty']; ?></td>
                            <td>
                                <?php
                                $total = $row['total'];
                                echo formatMoney($total, true);
                                ?>
                            </td>
                            <td>
                                <a href="editproduct.php?id=<?php echo $row['product_id']; ?>"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" id="<?php echo $row['product_id']; ?>"
                                   class="delbutton btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
