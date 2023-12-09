<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM user ORDER BY id DESC");
$result->execute();
$rowcount = $result->rowcount();
?>
<div class="container-fluid">
    <div class="row mt-4 mb-4">
        <div class="col-md-12 text-center">
            <h3>User Manager</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <p><b>Total Number of Users:<?php echo $rowcount; ?></b></p>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php" class="btn btn-secondary btn-sm">
                                <i class="fa fa-arrow-left icon-sm"></i> Back
                            </a>
                            <a href="adduser.php" class="btn btn-success btn-sm">
                                <i class="fa fa-plus icon-sm"></i> Create New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="resultTable" data-responsive="table">
                        <thead>
                        <tr>
                            <th width="17%"> Username</th>
                            <th width="10%"> Full Name</th>
                            <th width="10%"> Position</th>
                            <th width="14%"> Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        include('../connect.php');
                        $result = $db->prepare("SELECT * FROM user ORDER BY id DESC");
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                            ?>
                            <tr class="record">
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['position']; ?></td>

                                <td>
                                    <a title="Click To Edit Customer"
                                       href="edituser.php?id=<?php echo $row['id']; ?>">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="#" id="<?php echo $row['id']; ?>" class="delUserbutton" title="Click To Delete">
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
