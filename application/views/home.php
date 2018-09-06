<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <?php $this->view('layout/header.php') ?>
    <title>Page Title</title>
</head>
<body>
    <div class="wrapper">
        <?php  $this->view('layout/sidebar') ?>
        <div class="content-box">
			<?php $this->view('layout/navbar') ?>
			<div class="content">
				<h2 class="content-header">Welcome MoG</h2>
				<h6 class="content-date">15th August 2018</h6>
				<hr>
			</div>
        </div>
    </div>
</body>
</html>
