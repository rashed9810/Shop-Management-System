<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    ?>
    <form action="saveeditcustomer.php" method="post">
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h4><i class="icon-edit icon-large"></i> Edit Customer</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div id="ac">
                    <input type="hidden" name="memi" value="<?php echo $id; ?>"/>
                    <span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name"
                                                    value="<?php echo $row['customer_name']; ?>"/><br>
                    <span>Address : </span><input type="text" style="width:265px; height:30px;" name="address"
                                                  value="<?php echo $row['address']; ?>"/><br>
                    <span>Contact : </span><input type="text" style="width:265px; height:30px;" name="contact"
                                                  value="<?php echo $row['contact']; ?>"/><br>
                    <span>Product Name : </span><textarea style="width:265px; height:60px;"
                                                          name="prod_name"><?php echo $row['prod_name']; ?></textarea><br>
                    <span>Total : </span><input type="text" style="width:265px; height:30px;" name="memno"
                                                value="<?php echo $row['membership_number']; ?>"/><br>
                    <span>Note : </span><textarea style="height:60px; width:265px;"
                                                  name="note"><?php echo $row['note']; ?></textarea><br>
                    <span>Expected Date: </span><input type="date" style="width:265px; height:30px;" name="date"
                                                       value="<?php echo $row['expected_date']; ?>" placeholder="Date"/><br>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <button class="btn btn-success btn-block btn-sm" style="width:150px;"><i
                                class="icon icon-save icon-sm"></i> Save Changes
                    </button>
                </div>
            </div>
    </form>
    <?php
}
?>
<?php include('footer.php'); ?>
