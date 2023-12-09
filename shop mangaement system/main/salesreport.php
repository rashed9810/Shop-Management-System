<?php include('header.php'); ?>
<?php include('navfixed.php'); ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h3>Sale's Report</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="margin-top: -19px; margin-bottom: 21px;">
                    <a href="index.php" class="btn btn-success btn-sm">
                        <i class="fa fa-arrow-left icon-sm"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="salesreport.php" method="get">
                            <center>
                                <strong>
                                    From : <input type="date" style="width: 223px; height:35px; color:#222;" name="d1"
                                                  class="tcal" value="<?php echo $_GET['d1'] ?>"/>
                                    To: <input type="date" style="width: 223px; height:35px; color:#222;" name="d2"
                                               class="tcal" value="<?php echo $_GET['d2'] ?>"/>
                                    <button class="btn btn-info"
                                            style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;"
                                            type="submit">
                                        <i class="icon icon-search icon-large"></i>
                                        Search
                                    </button>
                                </strong>
                            </center>
                        </form>
                        <br>
                        <br>
                        <div class="content" id="content">
                            <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px; color: #198754;">
                                Sales Report from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
                            </div>
                            <table class="table table-bordered" id="resultTable" data-responsive="table"
                                   style="text-align: left;">
                                <thead>
                                <tr>
                                    <th width="13%"> Transaction ID</th>
                                    <th width="13%"> Transaction Date</th>
                                    <th width="20%"> Customer Name</th>
                                    <th width="16%"> Invoice Number</th>
                                    <th width="18%"> Amount</th>
                                    <th width="13%"> Profit</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                include('../connect.php');
                                $d1 = $_GET['d1'];
                                $d2 = $_GET['d2'];

                                $date1 = date('m/d/y', strtotime($d1));
                                $date2 = date('m/d/y', strtotime($d2));

                                $result = $db->prepare("SELECT * FROM sales WHERE date BETWEEN :a AND :b ORDER by transaction_id DESC ");
                                $result->bindParam(':a', $date1);
                                $result->bindParam(':b', $date2);
                                $result->execute();
                                for ($i = 0; $row = $result->fetch(); $i++) {
                                    ?>
                                    <tr class="record">
                                        <td>STI-00<?php echo $row['transaction_id']; ?></td>
                                        <td><?php echo date('d/m/y', strtotime($row['date'])); ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['invoice_number']; ?></td>
                                        <td><?php
                                            $dsdsd = $row['amount'];
                                            echo formatMoney($dsdsd, true);
                                            ?></td>
                                        <td><?php
                                            $zxc = $row['profit'];
                                            echo formatMoney($zxc, true);
                                            ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="border-top:1px solid #999999; text-align: right"> Total:</th>
                                    <th style="border-top:1px solid #999999">
                                        <?php
                                        function formatMoney($number, $fractional = false)
                                        {
                                            if ($fractional) {
                                                $number = sprintf('%.2f', $number);
                                            }
                                            while (true) {
                                                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                                                if ($replaced != $number) {
                                                    $number = $replaced;
                                                } else {
                                                    break;
                                                }
                                            }
                                            return $number;
                                        }

                                        $results = $db->prepare("SELECT sum(amount) FROM sales WHERE date BETWEEN :a AND :b");
                                        $results->bindParam(':a', $date1);
                                        $results->bindParam(':b', $date2);
                                        $results->execute();
                                        for ($i = 0; $rows = $results->fetch(); $i++) {
                                            $dsdsd = $rows['sum(amount)'];
                                            echo formatMoney($dsdsd, true);
                                        }
                                        ?>
                                    </th>
                                    <th style="border-top:1px solid #999999">
                                        <?php
                                        $resultia = $db->prepare("SELECT sum(profit) FROM sales WHERE date BETWEEN :c AND :d");
                                        $resultia->bindParam(':c', $date1);
                                        $resultia->bindParam(':d', $date2);
                                        $resultia->execute();
                                        for ($i = 0; $cxz = $resultia->fetch(); $i++) {
                                            $zxc = $cxz['sum(profit)'];
                                            echo formatMoney($zxc, true);
                                        }
                                        ?>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </script>
<?php include('footer.php'); ?>