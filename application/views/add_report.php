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
						<div class="loader-overlay">
							<div class="loader">
								<div class="lds-dual-ring"></div>
							</div>
						</div>
						<div class="display-box">
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

							</div>
						</div>	
						<div class="btn btn-primary pull-right mb-3 next-question">Next</div>
					</div>
                </div>
			</div>
        </div>
	</div>
	<script src="<?php echo asset_url().'js/jquery.min.js' ?>"></script>
	<script src="<?php echo asset_url().'perfectScroll/perfect-scrollbar.min.js' ?>"></script>
	<script src="<?php echo asset_url().'js/script.js' ?>"></script>
</body>
</html>
 