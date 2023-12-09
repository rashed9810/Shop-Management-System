<?php include 'header.php'; ?>
<?php include('navfixed.php'); ?>
<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    ?>
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css"/>
    <form action="saveeditproduct.php" method="post">
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h4><i class="icon-edit icon-large"></i> Edit Product</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div id="ac">
                    <input type="hidden" name="memi" value="<?php echo $id; ?>"/>
                    <span>Brand Name : </span><input type="text" style="width:265px; height:30px;" name="code"
                                                     value="<?php echo $row['product_code']; ?>" Required/><br>
                    <span>Generic Name : </span><input type="text" style="width:265px; height:30px;" name="gen"
                                                       value="<?php echo $row['gen_name']; ?>"/><br>
                    <span>Category / Description : </span><textarea style="width:265px; height:50px;"
                                                                    name="name"><?php echo $row['product_name']; ?> </textarea><br>
                    <span>Date Arrival: </span><input type="date" style="width:265px; height:30px;" name="date_arrival"
                                                      value="<?php echo $row['date_arrival']; ?>"/><br>
                    <span>Expiry Date : </span><input type="date" style="width:265px; height:30px;" name="exdate"
                                                      value="<?php echo $row['expiry_date']; ?>"/><br>
                    <span>Selling Price : </span><input type="text" style="width:265px; height:30px;" id="sellPrice" name="price"
                                                        value="<?php echo $row['price']; ?>" onkeyup="sum();" Required/><br>
                    <span>Original Price : </span><input type="text" style="width:265px; height:30px;" id="originPrice" name="o_price"
                                                         value="<?php echo $row['o_price']; ?>" onkeyup="sum();" Required/><br>
                    <span>Profit : </span><input type="number" style="width:265px; height:30px;" id="profit" name="profit"
                                                 value="<?php echo $row['profit']; ?>" readonly><br>
                    <span>Supplier : </span>
                    <select name="supplier" style="width:265px; height:30px; margin-left:-5px;">
                        <option><?php echo $row['supplier']; ?></option>
                        <?php
                        $results = $db->prepare("SELECT * FROM supliers");
//                        $results->bindParam(':userid', $res);
                        $results->execute();
                        for ($i = 0; $rows = $results->fetch(); $i++) {
                            ?>
                            <option><?php echo $rows['suplier_name']; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <span>QTY Left: </span><input type="number" style="width:265px; height:30px;" min="0" name="qty"
                                                  value="<?php echo $row['qty']; ?>"/><br>
                    <span>Quantity: </span><input type="number" style="width:265px; height:30px;" min="0" name="sold"
                                                  value="<?php echo $row['qty_sold']; ?>"/><br>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5 text-center">
                <button class="btn btn-success btn-block btn-large" style="width:200px;"><i
                            class="icon icon-save icon-large"></i> Save Changes
                </button>
            </div>
        </div>
    </form>
    <?php
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
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
