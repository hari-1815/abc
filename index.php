<?php include('default_variables.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/header_links.php');?>
</head>
<body>
    <div class="container-scroller">
		<?php 
			if(isset($_SESSION['user_id'])){
				include('includes/topmenubar.php');
		?> 
		<div class="container-fluid page-body-wrapper">
			<?php include('includes/leftmenubar.php');?> 
			<div class="main-panel">
				<?php
					$string	= "dashboard/dashboard.php";
					include($string);
				?>	
			</div>
        </div>
		<?php
			}else{
				$string	= "authorization/login.php";
				include($string);
			}
		?>
      </div>
    </div>
    <!-- container-scroller -->
	<?php include('includes/footer_links.php') ?>
</body>

<!-- Mirrored from www.bootstrapdash.com/demo/stellar-admin/jquery/template/demo_1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Apr 2021 18:25:08 GMT -->
</html>
