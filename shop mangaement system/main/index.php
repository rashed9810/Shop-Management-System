<?php include 'header.php'; ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM products ORDER BY product_id DESC");
$result->execute();
$all_product_count = $result->fetchColumn();

$ex_result = $db->prepare("SELECT * FROM products WHERE products.expiry_date < DATE_ADD(DATE(now()), INTERVAL 4 DAY) ORDER BY product_id DESC");
$ex_result->execute();
$expire_product = $ex_result->rowcount();

$result_cs = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
$result_cs->execute();
$rowcount_cs = $result_cs->rowcount();

if ($expire_product == false) {
    echo $expire_product = 0;
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 style="text-align: center; margin-top: 50px;"><b>Mabrur Grocery Shop</b></h3>
        </div>
        <?php
        if ($expire_product == false) {}else{
            echo '<div class="col-md-6">
            <p style="background-color: #ce938e; color:white; padding: 5px;" class="text-center">You have <b class="badge bg-danger">' . $expire_product . '</b> expired products!</p>
        </div>';
        }
        ?>
    </div>
    <div id="mainmain">
        <?php
        $position = $_SESSION['SESS_LAST_NAME'];
        if ($position == 'Cashier') {
            ?>
            <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i
                        class="fa fa-cart-plus icon-2x"></i><br> Sales</a>
            <a href="customer.php"><i class="icon-group icon-2x"></i><br> Customers</a>

            <a href="../index.php"><i class="icon-signout icon-2x"></i><br>Logout</a>
            <?php
        }
        if ($position == 'admin') {
            ?>

            <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i
                        class="fa fa-cart-plus icon-2x"></i><br> Sales</a>
            <a href="products.php"><i class="fa fa-list icon-2x"></i><br>
                Products <b style="background-color: #99e3c3;" class="badge"><?php echo '<span style="color: #0e0e0e;">' . $all_product_count . '/</span><span style="color: red;">' . $expire_product . '</span>' ?></b>
            </a>
            <a href="cat.php"><i class="fa fa-list icon-2x"></i><br> Categories</a>
            <a href="customer.php"><i class="fa fa-users icon-2x"></i><br> Customers <b style="background-color: #99e3c3;" class="badge text-dark"><?php echo $rowcount_cs; ?></b></a>
            <a href="supplier.php"><i class="fa fa-users icon-2x"></i><br> Suppliers</a>
            <a href="salesreport.php?d1=0&d2=0"><i class="fa fa-list-alt icon-2x"></i><br> Sales Report</a>
            <a href="admin-settings.php"><i class="fa fa-cogs icon-2x"></i><br> User Manager</a>
            <?php
        }
        ?>
        <div class="clearfix"></div>
    </div>
</div>
</body>
<footer>
    <p style="font-family: Arial, Helvetica, sans-serif; text-align: center;    "><b>MADE BY @TECH PIRATES</b></p>
</footer>
<?php include('footer.php'); ?>
</html>
