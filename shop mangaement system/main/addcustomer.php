<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<form action="savecustomer.php" method="post">
<div class="row mt-4">
    <div class="col-md-12 text-center">
        <h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4>
    </div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div id="ac">
                <span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name"
                                                placeholder="Full Name" Required/><br>
                <span>Address : </span><input type="text" style="width:265px; height:30px;" name="address"
                                              placeholder="Address"/><br>
                <span>Contact : </span><input type="text" style="width:265px; height:30px;" name="contact"
                                              placeholder="Contact"/><br>
                <span>Product Name : </span><textarea style="height:70px; width:265px;" name="prod_name"></textarea><br>
                <span>Total: </span><input type="text" style="width:265px; height:30px;" name="memno" placeholder="Total"/><br>
                <span>Note : </span><textarea style="height:60px; width:265px;" name="note"></textarea><br>
                <span>Expected Date: </span><input type="date" style="width:265px; height:30px;" name="date"
                                                   placeholder="Date"/><br>
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