<?php 
	include('default_variables.php');
	$fetch_group=$functionObj->fetch_group($_REQUEST['id'],'1');	
	$mrow =mysql_fetch_array($fetch_group);
	$usergroup_id = $_POST['roleid'];
	$group_name = $mrow['group_name'];
	$fetch_groupByName=$functionObj->fetch_groupmember('','1',$group_name);	
	if(isset($_POST['add'])){
		$save=$functionObj->save_member(); 
		if(!$save){
			$error = "error";
		}
	}

?>
<?php include('includes/message.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/header_links.php');?>
</head>
<body>
	<form action="" method="POST" name="add_group" enctype="multipart/form-data">
		<div class="container-scroller">
			<?php include('includes/topmenubar.php'); ?> 
			<div class="container-fluid page-body-wrapper">
				<?php include('includes/leftmenubar.php');?> 
				<div class="main-panel">
					<div class="content-wrapper">
						<div class="page-header">
							<h3 class="page-title">Group Details</h3>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
								  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								  <li class="breadcrumb-item active" aria-current="page">Group Details</li>
								</ol>
							</nav>
						</div>
						<div class="card-body">
							<h5 class="card-title">Group Information</h5>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Group Name</label>
										<div class="col-sm-9">
											<input type="text"  class="form-control" id="group_name" name="group_name" value="<?php echo $mrow['group_name'];?>" readonly />
										</div>
									</div>
								</div>
							</div>
							<div class="row">  
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">District</label>
										<div class="col-sm-9">
											<input type="text"  class="form-control" id="group_district" name="group_district" value="<?php echo $mrow['district_name'];?>" readonly />
											<input type="hidden" id="user_per_district" name="user_per_district" value="<?php echo $mrow['group_district'];?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">City</label>
										<div class="col-sm-9">
											<input type="text"  class="form-control" id="group_city" name="group_city" value="<?php echo $mrow['city_name'];?>" readonly />
											<input type="hidden" id="user_per_city" name="user_per_city" value="<?php echo $mrow['group_city'];?>" />
										</div>
									</div>
								</div>
							</div>
							<?php if(mysql_num_rows($fetch_groupByName) < 5){ ?>
							<h5 class="card-title">Add Member(s)</h5>
							<div class="row">  
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Member Mobile</label>
										<div class="col-sm-9">
											<input type="number" id="member1_mobile" name="member1_mobile" class="form-control" placeholder="Mobile Number " onchange="check_groupborrowerexistance(this.value,'#hdn_member1','#err_member1exist','')" />
											<input type="hidden" id="hdn_member1" name="hdn_member1" />
											<span id="err_member1exist" class="error"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<div>
											<button type="submit" name="add" class="btn btn-primary mr-2" value="submit">Save</button>
											<button class="btn btn-light">Cancel</button>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="card">
						<div class="card-body">
							<h4 class="card-title">Your Result(s)</h4>
							<div class="row">
								<div class="col-12">
									<div class="table-responsive">
										<table id="order-listing" class="table" >
											<thead>
												<tr>
													<th>#</th>
													<th>Group Name</th>
													<th>District</th>
													<th>City</th>
													<th>Mobile</th>
													<th>Aadhar Number</th>
													<th>Pan Number</th>
													<th>Full Name</th>
													<th>Leader/Member</th>
													<th>Created By</th>
													<th>Created Date</th>
													<th>Last Updated By</th>
													<th>Last Updated Date</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Group Name</th>
													<th>District</th>
													<th>City</th>
													<th>Mobile</th>
													<th>Aadhar Number</th>
													<th>Pan Number</th>
													<th>Full Name</th>
													<th>Leader/Member</th>
													<th>Created By</th>
													<th>Created Date</th>
													<th>Last Updated By</th>
													<th>Last Updated Date</th>
												</tr>
											</tfoot>
											<tbody>
												<?php
													$cnt = 1;
													if(mysql_num_rows($fetch_groupByName) > 0){
													while($row = mysql_fetch_array($fetch_groupByName)) { 
														$id = $row['group_id'];
														$fetch_user = $functionObj->fetch_user($row['user_id'],'','','','','');
														$grow = mysql_fetch_array($fetch_user); 
														$fetch_createdby = $functionObj->fetch_user($row['created_by'],'','','','','');
														$cbrow = mysql_fetch_array($fetch_createdby); 
														$fetch_updatedby = $functionObj->fetch_user($row['updated_by'],'','','','','');
														$ubrow = mysql_fetch_array($fetch_updatedby);
														$leader_status = "Member";
														if(($row['leader']) == '1'){
															$leader_status = "Leader";
														}
												?>
												<tr>
													<td><?php echo htmlentities($cnt);?></td>
													<td><?php echo $row['group_name'];?></td>
													<td><?php echo $grow['district_name'];?></td>
													<td><?php echo $grow['city_name'];?></td>
													<td><?php echo $grow['user_mobile'];?></td>
													<td><?php echo $grow['user_aadhar'];?></td>
													<td><?php echo $grow['user_pan'];?></td>
													<td><?php echo $grow['user_name'];?></td>
													<td><?php echo $leader_status;?></td>
													<td><?php echo $cbrow['user_name'];?></td>
													<td><?php echo $row['date'];?></td>
													<td><?php echo $ubrow['user_name'];?></td>
													<td><?php echo $row['updated_dt'];?></td>
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
	</form>
	<?php include('includes/footer_links.php') ?>
</body>
</html>