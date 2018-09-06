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
	<div class="container">
		<div class="row">
			<div class="col mt-5">
				<a href="<?php echo base_url('/setup/database') ?>"><div class="btn btn-primary">Make Migrations</div></a>
			</div>
		</div>
	</div>
</body>
</html>
