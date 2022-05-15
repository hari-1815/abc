<?php 
	include('default_variables.php');
	$fetch_day=$functionObj->fetch_day();
	$fetch_place=$functionObj->fetch_place();
	$fetch_session=$functionObj->fetch_session();
	$fetch_user=$functionObj->fetch_user('','','',$usergroup_id,'','');
	$load_loan_data=$functionObj->load_loan_data();
	if(isset($_REQUEST['did'])){
		$delete=$functionObj->delete_user($_REQUEST['did']); 
		if(!$delete){
			$error = true;
		}
	}
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
   var roleid = $('#usergroup_id').val();
   load_evdData(roleid);
});
</script>
<form action="" method="POST" name="manage_person" enctype="multipart/form-data">
    <div class="container-scroller">
		<?php include('includes/topmenubar.php'); ?>
		<div class="container-fluid page-body-wrapper">
			<?php include('includes/leftmenubar.php'); ?>        
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="page-header">
						<h3 class="page-title">Manage Loans</h3>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							  <li class="breadcrumb-item active" aria-current="page">EVD Persons</li>
							</ol>
						</nav>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="col-md-6">
								<div class="form-group row">
									<p><label class="badge badge-success"><a href="add_persons.php">Add Person</a></label></p>						
								 </div>
								<div class="form-group row">
								 </div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Day</label>
									<div class="col-sm-9">
										<select class="form-control" id="loan_day" name="loan_day" onchange="load_evdData()">
											<?php while($role = mysql_fetch_array($fetch_day)){ ?> 
											<option value="<?php echo $role['day_id']; ?>"><?php echo $role['day_prefix'].'-'.$role['day_name']; ?></option>
											<?php } ?>
										</select>
										<input type="hidden" id="hdn_do" value="<?php echo $do; ?>" />						  
									</div>
									<label class="col-sm-3 col-form-label">Session</label>
									<div class="col-sm-9">
										<select class="form-control" id="loan_session" name="loan_session" onchange="load_evdData()">
											<?php while($role = mysql_fetch_array($fetch_session)){ ?> 
											<option value="<?php echo $role['session_id']; ?>"><?php echo $role['session_prefix'].'-'.$role['session_name']; ?></option>
											<?php } ?>
										</select>
										<input type="hidden" id="hdn_do" value="<?php echo $do; ?>" />						  
									</div>
									<label class="col-sm-3 col-form-label">Place</label>
									<div class="col-sm-9">
										<select class="form-control" id="loan_place" name="loan_place" onchange="load_evdData()">
											<?php while($role = mysql_fetch_array($fetch_place)){ ?> 
											<option value="<?php echo $role['loan_place_id']; ?>"><?php echo $role['loan_place_prefix'].'-'.$role['loan_place_name']; ?></option>
											<?php } ?>
										</select>
										<input type="hidden" id="hdn_do" value="<?php echo $do; ?>" />						  
									</div>
								 </div>
							</div>
							<div>
										<button type="submit" name="load" class="btn btn-primary mr-2" value="submit" onclick="load_loan_data()">Submit</button>
										<button class="btn btn-light">Cancel</button>
									</div>
									</div>
							<h4 class="card-title">Your Result(s)</h4>
							<div class="row">
								<div class="col-12">
									<div class="table-responsive" id="load_datatable">
<table id="order-listing" class="table" >
	<thead>
		<tr>
		    <th>S.NO</th>
		    <th>Actions</th>						  			
		    <th>No.Weeks</th>						  			
		    <th>Date</th>
		    <th>Name</th>
		    <th>Loan Amount</th>
		    <th>Received Amount</th>
		    <th>Balance Amount</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
		    <th>S.NO</th>
		    <th>Actions</th>						  			
		    <th>No.Weeks</th>						  			
		    <th>Date</th>
		    <th>Name</th>
		    <th>Loan Amount</th>
		    <th>Received Amount</th>
		    <th>Balance Amount</th>
		</tr>
	</tfoot>
	<tbody>
		<?php
			$cnt = 1;
			if(mysql_num_rows($load_loan_data) > 0){
			while($row = mysql_fetch_array($load_loan_data)) { 
				$id = $row['user_id'];
				$fetch_createdby = $functionObj->fetch_user($row['created_by']);
				$cbrow = mysql_fetch_array($fetch_createdby); 
				$fetch_updatedby = $functionObj->fetch_user($row['updated_by']);
				$ubrow = mysql_fetch_array($fetch_updatedby);
		?>
		<tr>
			<td><?php echo htmlentities($cnt);?></td>
			<?php include('includes/action_row.php'); ?>
			<td><input type="number"></td>
			<td><input type="Date"</td>
			<td><?php echo $row['user_name'];?></td>
			<td><?php echo $row['user_loan_amount'];?></td>
			<td></td>
			<td></td>
		</tr>
		<?php $cnt++; } } else {?>
		<tr>
			<td colspan="6">No Records Found.</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
									
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
</form>
<!-- Mirrored from www.bootstrapdash.com/demo/stellar-admin/jquery/template/demo_1/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Apr 2021 18:26:01 GMT -->
</html>