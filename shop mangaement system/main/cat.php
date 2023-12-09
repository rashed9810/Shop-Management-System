<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM category ORDER BY id DESC");
$result->execute();
$rowcount = $result->rowcount();

?>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-md-12 text-center">
                <h3>Category List's</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <p><b>Total Number of Category: <?php echo $rowcount; ?></b></p>
                            </div>
                            <div class="col-md-3">
                                <a href="index.php" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-arrow-left icon-large"></i> Back
                                </a>
                                <a href="addcat.php" class="btn btn-success btn-sm">
                                    <i class="fa fa-arrow-left icon-large"></i> Create New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
                            <thead>
                            <tr>
                                <th width="50%"> Category</th>

                                <th width="50%"> Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include('../connect.php');
                            $result = $db->prepare("SELECT * FROM category ORDER BY id DESC");
                            $result->execute();
                            for ($i = 0; $row = $result->fetch(); $i++) {
                                ?>


                                <td><?php echo $row['name']; ?></td>
                                <td>
                                    <a href="#" id="<?php echo $row['id']; ?>" class="delCatbutton"
                                       title="Click to Delete the Category">
                                        <button class="btn btn-danger"><i class="">Delete</i></button>
                                    </a></td>
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