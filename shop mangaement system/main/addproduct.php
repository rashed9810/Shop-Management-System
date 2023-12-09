<?php include 'header.php'; ?>
<?php include('navfixed.php'); ?>
<?php
require_once('auth.php');
?>
<form action="saveproduct.php" method="post">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <h4><i class="icon-plus-sign icon-large"></i> Add Product</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div id="ac">
                <span>Item Code : </span><input type="text" style="width:265px; height:30px;" value="RBH-<?php
                $prefix = md5(time() * rand(1, 2));
                echo strip_tags(substr($prefix, 0, 4)); ?>" name="code" Readonly Required><br>
                <span>Item Name : </span><input type="text" style="width:265px; height:30px;" name="name" Required/><br>
                <span>Category : </span>
                <select name="gen" style="width:265px; height:30px; margin-left:-5px;">
                    <option></option>
                    <?php
                    include('../connect.php');
                    $result = $db->prepare("SELECT * FROM category");
//                    $result->bindParam(':userid', $res);
                    $result->execute();
                    for ($i = 0; $row = $result->fetch(); $i++) {
                        ?>
                        <option><?php echo $row['name']; ?></option>
                        <?php
                    }
                    ?>
                </select><br>
                <span>Date Arrival: </span><input type="date" style="width:265px; height:30px;" placeholder="09/13/2017"
                                                  class="tcal tcalInput" name="date_arrival"><br>
                <span>Expiry Date : </span><input type="date" style="width:265px; height:30px;" placeholder="09/13/2017"
                                                  class="tcal tcalInput" name="exdate"><br>
                <span>Selling Price : </span><input type="number" id="sellPrice" value="0" style="width:265px; height:30px;" name="price"
                                                    Required><br>
                <span>Original Price : </span><input type="number" id="originPrice" style="width:265px; height:30px;"
                                                     name="o_price" value="0"
                                                     Required><br>
                <span>Profit : </span><input type="number" id="profit" style="width:265px; height:30px;" name="profit"
                                             ><br>
                <span>Supplier : </span>
                <select name="supplier" style="width:265px; height:30px; margin-left:-5px;">
                    <option></option>
                    <?php
                    include('../connect.php');
                    $result = $db->prepare("SELECT * FROM supliers");
//                    $result->bindParam(':userid', $res);
                    $result->execute();
                    for ($i = 0; $row = $result->fetch(); $i++) {
                        ?>
                        <option><?php echo $row['suplier_name']; ?></option>
                        <?php
                    }
                    ?>
                </select><br>
                <span>Quantity : </span><input type="number" style="width:265px; height:30px;" min="0" id="txt11"
                                               onkeyup="sum();" name="qty" Required><br>
                <span></span><input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" Required><br>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <button class="btn btn-success btn-block btn-large" style="width:267px;"><i
                        class="icon icon-save icon-large"></i> Save
            </button>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function () {
        $(".delbutton").click(function () {
            var element = $(this);
            var del_id = element.attr("id");
            var info = 'id=' + del_id;
            if (confirm("Sure you want to delete this update? There is NO undo!")) {
                $.ajax({
                    type: "GET",
                    url: "deletesales.php",
                    data: info,
                    success: function () {

                    }
                });
                $(this).parents(".record").animate({backgroundColor: "#fbc7c7"}, "fast")
                    .animate({opacity: "hide"}, "slow");
            }
            return false;
        });
    });

    $(document).ready(function (){
        $('#sellPrice').on('keyup',function (){
           let _sellPrice = $(this).val();
           let _originPrice = $('#originPrice').val();
           let profit = (_sellPrice - _originPrice);

           $('#profit').val(profit);
        });

        $('#originPrice').on('keyup',function (){
            let _sellPrice = $('#sellPrice').val();
            let _originPrice = $(this).val();
            let profit = (_sellPrice - _originPrice);

            $('#profit').val(profit);
        });
    });
</script>
<?php include('footer.php'); ?>
