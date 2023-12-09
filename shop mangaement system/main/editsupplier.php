<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM supliers WHERE suplier_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    ?>
    <form action="saveeditsupplier.php" method="post">
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h4><i class="icon-plus-sign icon-large"></i> Edit Supplier</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div id="ac">
                    <input type="hidden" name="memi" value="<?php echo $id; ?>"/>
                    <span>Supplier Name : </span><input type="text" style="width:265px; height:30px;" name="name"
                                                        value="<?php echo $row['suplier_name']; ?>"/><br>
                    <span>Address : </span><input type="text" style="width:265px; height:30px;" name="address"
                                                  value="<?php echo $row['suplier_address']; ?>"/><br>
                    <span>Contact Person : </span><input type="text" style="width:265px; height:30px;" name="cperson"
                                                         value="<?php echo $row['contact_person']; ?>"/><br>
                    <span>Contact No.: </span><input type="text" style="width:265px; height:30px;" name="contact"
                                                     value="<?php echo $row['suplier_contact']; ?>"/><br>
                    <span>Note : </span><textarea style="width:265px; height:80px;"
                                                  name="note"><?php echo $row['note']; ?></textarea><br>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <button class="btn btn-success btn-block btn-sm" style="width:150px;"><i
                            class="icon icon-save icon-large"></i> Save Changes
                </button>
            </div>
        </div>
    </form>
    <?php
}
?>