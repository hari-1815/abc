<?php
	include('default_variables.php');
	$fetch_usergroup=$functionObj->fetch_usergroup('','1','1');
?>
<?php include('includes/message.php'); ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/stellar-admin/jquery/template/demo_1/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Apr 2021 18:26:00 GMT -->
<head>
    <?php include('includes/header_links.php'); ?>
</head>
<body>
<script type="text/javascript">
$(document).ready(function() {
  //load default data in table
   var roleid = $('#usergroup_id').val();
   loadData(roleid);
});
</script>
	<div class="container-scroller">
		<?php include('includes/topmenubar.php'); ?>
		<div class="container-fluid page-body-wrapper">
			<?php include('includes/leftmenubar.php'); ?>        
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="page-header">
						<h3 class="page-title"> Approve Borrowers </h3>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							  <li class="breadcrumb-item active" aria-current="page">Approve Borrowers</li>
							</ol>
						</nav>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Select the Person(s) Type</label>
									<div class="col-sm-9">
										<select class="form-control" id="usergroup_id" name="usergroup_id" onchange="loadData(this.value)">
											<?php while($role = mysql_fetch_array($fetch_usergroup)){ 
												 $usergroup_prefix =$role['usergroup_prefix']; 
												 if ($usergroup_prefix == $prefix) { ?>
											<option value="<?php echo $role['usergroup_id']; ?>"><?php echo $role['usergroup_prefix'].'-'.$role['usergroup_name']; ?></option>
											<?php } } ?>
										</select>
										<input type="hidden" id="hdn_prefix" value="<?php echo $prefix; ?>" />
										<input type="hidden" id="hdn_do" value="<?php echo $do; ?>" />						  
									</div>
								</div>
							</div>
							<h4 class="card-title">Your Result(s)</h4>
							<div class="row">
								<div class="col-12">
									<div class="table-responsive" id="load_datatable">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<footer class="footer">
					<?php include('includes/footer.php');?>
				</footer>
			</div>
		</div>
    </div>
    <?php include('includes/footer_links.php') ?>
</body>
<!-- Mirrored from www.bootstrapdash.com/demo/stellar-admin/jquery/template/demo_1/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Apr 2021 18:26:01 GMT -->
</html>