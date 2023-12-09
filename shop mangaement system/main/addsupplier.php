<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
    <form action="savesupplier.php" method="post">
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div id="ac">
                    <span>Supplier Name : </span><input type="text" style="width:265px; height:30px;" name="name"
                                                        required/><br>
                    <span>Address : </span><input type="text" style="width:265px; height:30px;" name="address"/><br>
                    <span>Contact Person : </span><input type="text" style="width:265px; height:30px;"
                                                         name="contact"/><br>
                    <span>Contact No. : </span><input type="text" style="width:265px; height:30px;" name="cperson"/><br>
                    <span>Note : </span><textarea style="width:265px; height:80px;" name="note"/></textarea><br>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <button class="btn btn-success btn-block btn-sm" style="width:150px;"><i
                            class="icon icon-save icon-large"></i> Save
                </button>
            </div>
        </div>
    </form>
<?php include('footer.php'); ?>