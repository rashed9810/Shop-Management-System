<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_id DESC");
$result->execute();
$rowcount = $result->rowcount();
?>
<div class="container-fluid">
    <div class="row mt-4 mb-4">
        <div class="col-md-12 text-center">
            <h3>Supplier List's</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <p><b>Total Number of Suppliers: <?php echo $rowcount; ?></b></p>
                        </div>
                        <div class="col-md-3 text-right">
                            <a href="index.php" class="btn btn-secondary btn-sm">
                                <i class="fa fa-arrow-left icon-sm"></i> Back
                            </a>
                            <a href="addsupplier.php" class="btn btn-success btn-sm">
                                <i class="fa fa-plus icon-sm"></i> Create New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="resultTable" data-responsive="table">
                        <thead>
                        <tr>
                            <th> Supplier</th>
                            <th> Contact Person</th>
                            <th> Address</th>
                            <th> Contact No.</th>
                            <th> Note</th>
                            <th width="120"> Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        include('../connect.php');
                        $result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_id DESC");
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                            ?>
                            <tr class="record">
                                <td><?php echo $row['suplier_name']; ?></td>
                                <td><?php echo $row['contact_person']; ?></td>
                                <td><?php echo $row['suplier_address']; ?></td>
                                <td><?php echo $row['suplier_contact']; ?></td>
                                <td><?php echo $row['note']; ?></td>
                                <td>
                                    <a href="editsupplier.php?id=<?php echo $row['suplier_id']; ?>">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="#" id="<?php echo $row['suplier_id']; ?>" class="delSupplierbutton">
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
