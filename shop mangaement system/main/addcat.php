<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
<form action="savecat.php" method="post">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <h4><i class="icon-plus-sign icon-large"></i> Add Category</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div id="ac">
                <span>Category Name : </span><input type="text" style="width:200px; height:30px;" name="name" Required/><br>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <button class="btn btn-success btn-block btn-large" style="width:150px;"><i
                        class="icon icon-save icon-large"></i> Save
            </button>
        </div>
    </div>
</form>
<?php include('footer.php'); ?>