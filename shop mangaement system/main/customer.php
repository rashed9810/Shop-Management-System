<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
$result->execute();
$rowcount = $result->rowcount();
?>
<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-md-12 text-center">
            <h1>Customer List's</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <p><b>Total Number of Customers: <?php echo $rowcount; ?></b></p>
                        </div>
                        <div class="col-md-3 text-right">
                            <a href="index.php" class="btn btn-secondary btn-sm">
                                <i class="fa fa-arrow-left icon-large"></i> Back
                            </a>
                            <a href="addcustomer.php" class="btn btn-success btn-sm">
                                <i class="fa fa-arrow-left icon-large"></i> Create New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="resultTable" data-responsive="table">
                        <thead>
                        <tr>
                            <th width="15%"> Full Name</th>
                            <th width="10%"> Address</th>
                            <th width="10%"> Contact Number</th>
                            <th width="15%"> Product Name</th>
                            <th width="9%"> Total</th>
                            <th width="17%"> Note</th>
                            <th width="9%"> Due Date</th>
                            <th width="25%"> Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        include('../connect.php');
                        $result = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                            ?>
                            <tr class="record">
                                <td><?php echo $row['customer_name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['contact']; ?></td>
                                <td><?php echo $row['prod_name']; ?></td>
                                <td>P <?php echo $row['membership_number']; ?>.00</td>
                                <td><?php echo $row['note']; ?></td>
                                <td><?php echo $row['expected_date']; ?></td>

                                <td>
                                    <a title="Click To Edit Customer"
                                       href="editcustomer.php?id=<?php echo $row['customer_id']; ?>">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="#" id="<?php echo $row['customer_id']; ?>" class="delCasbutton"
                                       title="Click To Delete">
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
