<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->helper('date');
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
				<h2 class="content-header">All Reports</h2>
				<hr>
				<?php foreach($reports as $report): ?>
				<div class="report-list">
					<div class="report-list__item mb-3">
						<div class="pull-left item-header">
							<h4><?php echo $report['title'] ?></h4>
							<h6><?php
								echo ($report['userrole'] == 'leader') ? $report['username'].' '.$report['lastname'] : ucfirst($report['userrole']).' '.$report['username'];
								?> <span class="pull-right"><?php echo short_date(mysql_to_unix($report['date'])) ?></span>
							</h6>
						</div>
						<div class="pull-right item-icon">
							<span class="ti-angle-right pull-right"></span>
						</div>
					</div>
				<?php endforeach?>
				</div>
				<a href="<?php echo base_url('report/add') ?>">
				<div class="float-btn">
					<div class="float-btn__icon">
						<span class="ti-agenda"></span>
						<span class="ti-plus minify"></span>
					</div>
				</div>
				</a>
			</div>
        </div>
	</div>
	<script src="<?php echo asset_url().'js/script.js' ?>"></script>
	<script src="<?php echo asset_url().'perfect-scrollbar.min.js' ?>"></script>
</body>
</html>
 