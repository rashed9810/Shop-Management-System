<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM user WHERE id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    ?>
    <form action="saveedituser.php" method="post">
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h4><i class="icon-plus-sign icon-large"></i> Edit User</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div id="ac">
                    <input type="hidden" name="memi" value="<?php echo $id; ?>"/>
                    <span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name"
                                                    value="<?php echo $row['name']; ?>"/><br>
                    <span>Username : </span><input type="text" style="width:265px; height:30px;" name="username"
                                                   value="<?php echo $row['username']; ?>"/><br>
                    <span>Password : </span><input type="password" style="width:265px; height:30px;" name="password"
                                                   value="<?php echo $row['password']; ?>"/><br>
                    <span>Position : </span>
                    <select name="position" style="width:265px; height:30px; margin-left:-5px;">
                        <option><?php echo $row['position']; ?></option>
                        <option>Cashier</option>
                        <option>admin</option>
                        <option>receptionist</option>
                    </select><br>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <button class="btn btn-success btn-block btn-sm" style="width:200px;"><i
                            class="fa fa-save icon-sm"></i> Save Changes
                </button>
            </div>
        </div>
    </form>
    <?php
}
?>