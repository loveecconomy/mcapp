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
			<div id="content" class="content">
                <div class="row">
                <div class="col-lg-8 col-md-10  col-sm-12 mx-auto">
							<h2 class="content-header">Add New Report</h2>
							<div class="btn btn-success reset">Reset</div>
							<hr>
							<div class="questions-container">
								<div class="question-box header mb-5 ">
									<h3>Report Title</h3>
									<div class="answer-box short-text">
										<span class="ti-pencil left"></span>
										<input type="text" id="title">
									</div>
								</div>

								<div class="question-box mb-5">
									<h5>Where did you meet? </h5>
									<div class="answer-box short-text">
										<span class="ti-location-pin left"></span>
										<input type="text" id="1" class="input">
									</div>
									<p class="answer-attachment map-pin">Add a map pin</p>
								</div>

								<div class="question-box mb-5">
									<h5>What time did you start? </h5>
									<div class="answer-box date">
										<span class="ti-timer left"></span>
										<input type="time" id="" class="input">
									</div>
								</div>

							</div>
							<div class="btn btn-primary pull-right mb-3 next-question">Next</div>
					</div>
                </div>
			</div>
        </div>
	</div>
	<script src="<?php echo asset_url().'js/script.js' ?>"></script>
	<script src="<?php echo asset_url().'perfect-scrollbar.min.js' ?>"></script>
</body>
</html>
 