<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
    <form action="saveuser.php" method="post">
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h4><i class="icon-plus-sign icon-large"></i> Add User</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div id="ac">
                    <span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name"
                                                    placeholder="Full Name" Required/><br>
                    <span>Username : </span><input type="text" style="width:265px; height:30px;" name="username"
                                                   placeholder="Address"/><br>
                    <span>Password : </span><input type="password" style="width:265px; height:30px;" name="password"
                                                   placeholder="Contact"/><br>
                    <span>Position : </span>
                    <select name="position" style="width:265px; height:30px; margin-left:-5px;">
                        <option>--</option>
                        <option>Cashier</option>
                        <option>admin</option>
                        <option>receptionist</option>
                    </select><br>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <button class="btn btn-success btn-block btn-sm" style="width:150px;"><i
                            class="fa fa-save icon-large"></i> Save User
                </button>
            </div>
        </div>
    </form>
<?php include('footer.php'); ?>