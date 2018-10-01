
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1, user-scalable=yes">
    <link rel="stylesheet" href="<?php echo asset_url().'bootstrap/css/bootstrap.css' ?>">
    <!-- <link rel="stylesheet" href="<?php echo asset_url().'perfectScroll/perfect-scrollbar.css' ?>"> -->
    <link rel="stylesheet" href="<?php echo asset_url().'css/style.css' ?>">
    <link rel="stylesheet" href="<?php echo asset_url().'themify-icons/themify-icons.css' ?>">
    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    <title>Page Title</title>
</head>
<body>
    <div  id="login"  class="wrapper" >
        <div class="page-form">
            <h4>Mega Center App</h4>
            <div class="logo-box">
                <img src="<?php echo asset_url().'images/logo.png' ?>" alt="">
            </div>
            <?php if(null != $this->session->flashdata('register')): ?>
                <?php $message = $this->session->flashdata('register'); ?>
                <div class="alert alert-<?php echo $message['class'] ?>"><?php echo $message['message'] ?></div>
            <?php endif ?>
            <form class="form-box" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label>Username</label>
                            <input type="text" name="name">
                        </div>
                        <div class="col-sm-6 col-md-6 mb-4">
                            <label>Mc Name</label>
                            <input type="text" name="name">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label>First Name</label>
                            <input type="text" name="name">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="name">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label>Password</label>
                            <input type="text" name="name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary form-btn">Register</button>
                </div>
                <div class="form-footer"><a href="<?php echo base_url('register') ?>">  Create a new account?</a></div>
            </form>
        </div>
    </div>
    <script src="<?php echo asset_url().'js/jquery-3.3.1.min.js' ?>"></script>
    <!-- <script src="<?php echo asset_url().'perfectScroll/perfect-scrollbar.min.js' ?>"></script> -->
    <script src="<?php echo asset_url().'js/script.js' ?>"></script>
</body>
</html>