<?php
include 'connect.php';
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
    <title> Point of Sale </title>
    <link rel="shortcut icon" href="main/images/pos.jpg">
    <link href="main/css/style.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="main/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="main/bootstrap/css/bootstrap.rtl.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="main/bootstrap/css/bootstrap-grid.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="main/bootstrap/css/bootstrap-grid.rtl.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="main/bootstrap/css/bootstrap-reboot.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="main/bootstrap/css/bootstrap-reboot.rtl.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="main/bootstrap/css/bootstrap-utilities.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="main/bootstrap/css/bootstrap-utilities.rtl.min.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" media="screen" rel="stylesheet" type="text/css"/>
</head>
<body style="background-image: url('main/images/login_body.jpg'); background-repeat: no-repeat; background-size: cover;">
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 mt-5">
            <div style="background-color:coral;" class="card">
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
                        foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
                            echo '<div style="color: red; text-align: center;">', $msg, '</div><br>';
                        }
                        unset($_SESSION['ERRMSG_ARR']);
                    }
                    ?>
                    <form action="login.php" method="post">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="text-white">Login Panel</h3>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="username" Placeholder="Username"
                                       required/>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" Placeholder="Password"
                                       required/>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button class="btn btn-success form-control" href="dashboard.html" type="submit">
                                    <i class="icon-signin icon-large"></i> LOGIN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-white">
            <p style="text-align: center;"><b>MADE BY @TECH PIRATES</b></p>
        </div>
    </div>
</div>
<script src="main/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="main/bootstrap/js/bootstrap.esm.min.js"></script>
<script src="main/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>