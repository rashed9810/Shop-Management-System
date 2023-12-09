<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="../main/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../main/bootstrap/js/bootstrap.esm.min.js"></script>
<script src="../main/bootstrap/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#resultTable').DataTable({
            bJQueryUI: true,
            sDom: 'lfrtip',
            dom: 'Bfrtip',
            buttons: [{ extend: 'print', footer: true }]
        });

        $(".delbutton").click(function () {
            let element = $(this);
            let del_id = element.attr("id");
            let info = 'id=' + del_id;
            if (confirm("Sure you want to delete this Product? There is NO undo!")) {
                $.ajax({
                    type: "GET",
                    url: "deleteproduct.php",
                    data: info,
                    success: function () {
                        location.reload();
                    }
                });
                $(this).parents(".record").animate({backgroundColor: "#fbc7c7"}, "fast")
                    .animate({opacity: "hide"}, "slow");
            }
            return false;
        });

        $(".delCatbutton").click(function () {
            var element = $(this);
            var del_id = element.attr("id");
            var info = 'id=' + del_id;
            if (confirm("Sure you want to delete this Category? There is NO undo!")) {
                $.ajax({
                    type: "GET",
                    url: "deletecat.php",
                    data: info,
                    success: function () {
                        location.reload();
                    }
                });
                $(this).parents(".record").animate({backgroundColor: "#fbc7c7"}, "fast")
                    .animate({opacity: "hide"}, "slow");
            }
            return false;
        });

        $(".delUserbutton").click(function () {
            var element = $(this);
            var del_id = element.attr("id");
            var info = 'id=' + del_id;
            if (confirm("Are you sure want to delete? There is NO undo!")) {
                $.ajax({
                    type: "GET",
                    url: "deleteuser.php",
                    data: info,
                    success: function () {

                    }
                });
                $(this).parents(".record").animate({backgroundColor: "#fbc7c7"}, "fast")
                    .animate({opacity: "hide"}, "slow");
            }
            return false;
        });

        $(".delSupplierbutton").click(function () {
            var element = $(this);
            var del_id = element.attr("id");
            var info = 'id=' + del_id;
            if (confirm("Are you sure want to delete? There is NO undo!")) {
                $.ajax({
                    type: "GET",
                    url: "deletesupplier.php",
                    data: info,
                    success: function () {

                    }
                });
                $(this).parents(".record").animate({backgroundColor: "#fbc7c7"}, "fast")
                    .animate({opacity: "hide"}, "slow");
            }
            return false;
        });

        $(".delCasbutton").click(function () {
            var element = $(this);
            var del_id = element.attr("id");
            var info = 'id=' + del_id;
            if (confirm("Are you sure want to delete? There is NO undo!")) {
                $.ajax({
                    type: "GET",
                    url: "deletecustomer.php",
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

    function Clickheretoprint() {
        var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
        disp_setting += "scrollbars=yes,width=800, height=400, left=100, top=25";
        var content_vlue = document.getElementById("content").innerHTML;

        var docprint = window.open("", "", disp_setting);
        docprint.document.open();
        docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');
        docprint.document.write(content_vlue);
        docprint.document.close();
        docprint.focus();
    }
</script>
</body>
</html>