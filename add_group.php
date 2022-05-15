<?php 
	include('default_variables.php');
	$usergroup_id = $_POST['roleid'];
	$fetch_user=$functionObj->fetch_user('','','','2','','');
	$fetch_district=$functionObj->fetch_pdistrict();
	$fetch_grpid=$functionObj->generate_groupid();
	if(isset($_POST['add_group'])){
		$save_group=$functionObj->save_group(); 
		$id = mysql_insert_id();
		if($save_group){
			echo "<script type='text/javascript'>window.location.href='add_groupmember.php?do=group&mode=manage_group&id=$id'</script>";
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
							<h3 class="page-title">Add Group</h3>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
								  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								  <li class="breadcrumb-item active" aria-current="page">Add Group</li>
								</ol>
							</nav>
						</div>
						<div class="card-body">
							<h5 class="card-title">Group Information <a title="Edit" href="add_group.php?do=group&mode=add" id="enable_group"><i class="icon-pencil menu-icon"></i></a></h5>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Group Name</label>
										<div class="col-sm-9">
											<input type="text"  class="form-control" id="group_name" name="group_name" value="<?php echo $fetch_grpid; ?>" readonly />
										</div>
									</div>
								</div>
							</div>
							<div class="row">  
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">District</label>
										<div class="col-sm-9">
											<select class="form-control" id="group_district" name="group_district" onchange="load_per_city(this.value)">
												<option value="">Select District</option>
												<?php while($drow = mysql_fetch_array($fetch_district)){ ?>
												<option value="<?php echo $drow['district_id']; ?>"><?php echo $drow['district_name']; ?></option>
												<?php } ?>
											</select>
										</div>
										<input type="hidden" id="hdn_district" name="hdn_district">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row" id="per_city_name">
									</div>
									<input type="hidden" id="hdn_city" name="hdn_city">
								</div>
							</div>
							<h5 class="card-title">Add Leader </h5>
							<div class="row">  
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Mobile</label>
										<div class="col-sm-9">
											<a title="Edit" href="#" id="enable_leader" style="display:none;"><i class="icon-pencil menu-icon"></i>Edit Leader</a>
											<input type="number" id="leader_mobile" name="leader_mobile" class="form-control" placeholder="Mobile Number " />
											<input type="hidden" id="hdn_leader" name="hdn_leader" />
											<span id="err_leaderexist" class="error"></span>
										</div>
									</div>
								</div>
							</div>
							<h5 class="card-title">Add Member(s)</h5>
							<div class="row">  
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Member 1 Mobile</label>
										<div class="col-sm-9">
											<a title="Edit" href="#" id="enable_member1" style="display:none;"><i class="icon-pencil menu-icon"></i>Edit Member 1</a>
											<input type="number" id="member1_mobile" name="member1_mobile" class="form-control" placeholder="Mobile Number " readonly />
											<input type="hidden" id="hdn_member1" name="hdn_member1" />
											<span id="err_member1exist" class="error"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Member 2 Mobile</label>
										<div class="col-sm-9">
											<a title="Edit" href="#" id="enable_member2" style="display:none;"><i class="icon-pencil menu-icon"></i>Edit Member 2</a>
											<input type="number" id="member2_mobile" name="member2_mobile" class="form-control" placeholder="Mobile Number " readonly />
											<input type="hidden" id="hdn_member2" name="hdn_member2" />
											<span id="err_member2exist" class="error"></span>
										</div>
									</div>
								</div>
							</div>
							<h5 class="card-title">Confirm Submission</h5>
							<div class="row">  
								<div class="col-md-6">
									<div class="form-group row">
										<div class="form-check form-check-success">
											<label class="form-check-label">
											<input type="checkbox" class="form-check-input" id="confirm_mobile" name="confirm_mobile" disabled>Confirm creating the group.</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<div>
											<button type="submit" id="add_group" name="add_group" class="btn btn-primary mr-2" value="submit" disabled >Save and Add more Mmbers</button>
											<button class="btn btn-light">Cancel</button>
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