<?php
	include('default_variables.php');
	$fetch_usergroup=$functionObj->fetch_usergroup('','1','1');
	$fetch_address_proof=$functionObj->fetch_address_proof('','1');
	$fetch_id_proof=$functionObj->fetch_id_proof('','1');
	$fetch_user=$functionObj->fetch_user($rid,'','','','','');
	$fetch_gender=$functionObj->fetch_gender();
    $fetch_pdistrict=$functionObj->fetch_pdistrict();
    $fetch_cdistrict=$functionObj->fetch_cdistrict();
    $fetch_nature=$functionObj->fetch_nature();
    $fetch_residential=$functionObj->fetch_residential();	
    $fetch_marital=$functionObj->fetch_marital();	
	$row =mysql_fetch_array($fetch_user);
    $fetch_district=$functionObj->fetch_district($row['user_cur_district']);
	$fetch_city	= $functionObj->fetch_city('','','1');
	if(isset($_POST['update'])){
		$update=$functionObj->update_user($rid,$_SESSION['user_id']);		
		if(!$update){
			$error =true; 
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
	<form action="" method="POST" name="add_person" enctype="multipart/form-data">
		<div class="container-scroller">
			<?php include('includes/topmenubar.php'); ?> 
			<div class="container-fluid page-body-wrapper">
				<?php include('includes/leftmenubar.php');?> 
				<div class="main-panel">
					<div class="content-wrapper">
						<div class="page-header">
							<h3 class="page-title">View Persons</h3>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
								  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								  <li class="breadcrumb-item active" aria-current="page">EVD Persons</li>
								</ol>
							</nav>
						</div>
						<div class="row">
							<div class="col-12 grid-margin">
								<div class="card">
									<div class="card-body">
										<p class="card-description" style="color: #3b3b79"><b>View Personal Info</b></p>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Full Name<b>**</b></label>
													<div class="col-sm-9">
														<input  readonly type="text"  class="form-control" id="user_name" name="user_name" value="<?php echo $row['user_name'];?>">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Mobile Number<b>**</b></label>
													<div class="col-sm-9">
														<input readonly type="number" class="form-control" id="user_mobile" name="user_mobile" value="<?php echo $row['user_mobile'];?>" />
														<span id="err_exist" class="error"></span>
													</div>
												</div>
										   </div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Aadhar Number<b>**</b></label>
													<div class="col-sm-9">
													  <input readonly type="number" class="form-control" id="user_aadhar" name="user_aadhar" value="<?php echo $row['user_aadhar'];?>" onchange="check_aadhar(this.value)"/>
													  <span id="err_aadhar" class="error"></span>
													</div>
												</div>
											</div>
										   
										<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Father's Name<b>**</b></label>
													<div class="col-sm-9">
														<input readonly type="text" class="form-control" id="user_father" name="user_father" value="<?php echo $row['user_father'];?>"/>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Mother's Name</label>
													<div class="col-sm-9">
														<input readonly type="text" class="form-control" id="user_mother" name="user_mother" value="<?php echo $row['user_mother'];?>"/>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Gender<b>**</b></label>
													<div class="col-sm-9">
														<select readonly class="form-control" id="user_gender" name="user_gender" value="<?php echo $row['user_gender'];?>">
														<option value="<?php echo $row['gender_id'];?>"><?php echo $row['gender_name'];?></option>														
														<option value="">Select Gender</option>
														  <?php while($role = mysql_fetch_array($fetch_gender)){ ?>
														  <option value="<?php echo $role['gender_id']; ?>"><?php echo $role['gender_name']; ?></option>
														  <?php } ?>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Marital Status<b>**</b></label>
													<div class="col-sm-9">
												<select readonly class="form-control" id="user_marital_status" name="user_marital_status" value="<?php echo $row['user_marital_status'];?>" onchange="enable_spouse(this.value)" >
														  <option value="<?php echo $row['marital_id'];?>"><?php echo $row['marital_name'];?></option>
														  <option value="">Select Marital Status</option>
														  <?php while($msrow = mysql_fetch_array($fetch_marital)){ ?>
														  <option value="<?php echo $msrow['marital_id']; ?>"><?php echo $msrow['marital_name']; ?></option>
														  <?php } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Spouse Name<b>**</b></label>
													<div class="col-sm-9">
														<input readonly type="text" class="form-control" id="user_spouse" name="user_spouse" value="<?php echo $row['user_spouse'];?>"  />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Number of Dependant<b>**</b></label>
													<div class="col-sm-9">
														<input readonly type="number" class="form-control" id="user_no_of_dependant" name="user_no_of_dependant" value="<?php echo $row['user_no_of_dependant'];?>"   />
													</div>
												</div>
											</div>
										</div>
						
										<p class="card-description" style="color:#3b3b79"><b>Permanent Address </b></p>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Address</label>
														<div class="col-sm-9">
															<input readonly type="text" class="form-control" name="user_per_address" id="user_per_address" value="<?php echo $row['user_per_address'];?>">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Place</label>
														<div class="col-sm-9">
															<input readonly type="text" class="form-control" id="user_place" name="user_place" value="<?php echo $row['user_place'];?>" />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">State</label>
														<div class="col-sm-9">
															<input readonly readonly type="text" class="form-control" value="TamilNadu" id="user_per_state" name="user_per_state" value="<?php echo $row['user_per_state'];?>" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
													<label class="col-sm-3 col-form-label">District</label>
														<div class="col-sm-9">
															<select readonly class="form-control" id="user_per_district" name="user_per_district"  value="<?php echo $row['user_per_district'];?>"onchange="load_per_city(this.value)">
															  <option value="<?php echo $row['district_id'];?>"><?php echo $row['district_name'];?></option>
															  <option value="">Select District</option>
															  <?php while($pdrow = mysql_fetch_array($fetch_pdistrict)){ ?>
															  <option value="<?php echo $pdrow['district_id']; ?>"><?php echo $pdrow['district_name']; ?></option>
															  <?php } ?>
															</select>
														</div>
													</div>
												</div>
											<div>
											</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Postcode</label>
														<div class="col-sm-9">
															<input readonly type="number" class="form-control" id="user_per_postcode" name="user_per_postcode" value="<?php echo $row['user_per_postcode'];?>" />
														</div>
													</div>
												</div>
											</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Residential Status</label>
													<div class="col-sm-9">
														<select readonly class="form-control" id="user_residential" name="user_residential" value="<?php echo $row['user_residential'];?>">
														  <option value="<?php echo $row['residential_id'];?>"><?php echo $row['residential_name'];?></option>
														  <option value="">Select Residential Status</option>
														  <?php while($rsrow = mysql_fetch_array($fetch_residential)){ ?>
														  <option value="<?php echo $rsrow['residential_id']; ?>"><?php echo $rsrow['residential_name']; ?></option>
														  <?php } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">No.of years lived at the Address</label>
													<div class="col-sm-9">
														<input readonly type="number" class="form-control" id="user_years" name="user_years" value="<?php echo $row['user_years'];?>"/>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
											  <div class="form-group row">
												<label class="col-sm-3 col-form-label">Landmark</label>
												<div class="col-sm-9">
												  <input readonly type="text" class="form-control" id="user_per_landmark" name="user_per_landmark" value="<?php echo $row['user_per_landmark'];?>" />
												</div>
											</div>
										</div>
									</div>
									<p class="card-description" style="color:#3b3b79"><b>Loan Details</b></p>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Loan Amount</label>
												<div class="col-sm-9">
													<input readonly type="number"  class="form-control"  id="user_loan_amount" name="user_loan_amount" value="<?php echo $row['user_loan_amount'];?>" />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Start Date</label>
												<div class="col-sm-9">
													<input readonly type="Date" class="form-control"  placeholder="" id="user_start_date" name="user_start_date" value="<?php echo $row['user_start_date'];?>"  />
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">No.of.Weeks</label>
												<div class="col-sm-9">
													<input readonly type="number" class="form-control"   id="user_no_of_weeks" name="user_no_of_weeks" value="<?php echo $row['user_no_of_weeks'];?>"  />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">End Date</label>
												<div class="col-sm-9">
													<input readonly type="date" class="form-control"   placeholder="" id="user_end_date" name="user_end_date" value="<?php echo $row['user_end_date'];?>" />
												</div>
											</div>
										</div>
										<div class="col-md-6">
										
									<p class="card-description" style="color:#3b3b79"><b>Collection</b></p>
</div>									
<table id="order-listing" class="table" >
		<tfoot>
		<tr>
		    <th>#</th>
		    <th>Date</th>
			<th>Amount</th>
		    <tr><th style="color:green;">Total Received</th><td></td><td><input readonly type="number" id="received" name="received"></td></tr>
		    <tr><th style="color:red;">Pending Amount</th><td></td><td><input readonly type="number" id="pending" name="pending"></td></tr>
		    <tr><th>Week 1</th><td><input type="date" id="week1_dt" name="week1_dt"></td><td><input type="number" id="week1" name="week1"></td></tr>
		    <tr><th>Week 2</th><td><input type="date" id="week2_dt" name="week2_dt"></td><td><input type="number" id="week2" name="week2"></td></tr>
		    <tr><th>Week 3</th><td><input type="date" id="week3_dt" name="week3_dt"></td><td><input type="number" id="week3" name="week3"></td></tr>
		    <tr><th>Week 4</th><td><input type="date" id="week4_dt" name="week4_dt"></td><td><input type="number" id="week4" name="week4"></td></tr>
		    <tr><th>Week 5</th><td><input type="date" id="week5_dt" name="week5_dt"></td><td><input type="number" id="week5" name="week5"></td></tr>
		    <tr><th>Week 6</th><td><input type="date" id="week6_dt" name="week6_dt"></td><td><input type="number" id="week6" name="week6"></td></tr>
		    <tr><th>Week 7</th><td><input type="date" id="week7_dt" name="week7_dt"><td><input type="number" id="week7" name="week7"></td></tr>
		    <tr><th>Week 8</th><td><input type="date" id="week8_dt" name="week8_dt"><td><input type="number" id="week8" name="week8"></td></tr>
		    <tr><th>Week 9</th><td><input type="date" id="week9_dt" name="week9_dt"><td><input type="number" id="week9" name="week9"></td></tr>
		    <tr><th>Week 10</th><td><input type="date" id="week10_dt" name="week10_dt"><td><input type="number" id="week10" name="week10"></td></tr>
		    <tr><th>Week 11</th><td><input type="date" id="week11_dt" name="week11_dt"><td><input type="number" id="week11" name="week11"></td></tr>
		    <tr><th>Week 12</th><td><input type="date" id="week12_dt" name="week12_dt"><td><input type="number" id="week12" name="week12"></td></tr>
		    <tr><th>Week 13</th><td><input type="date" id="week13_dt" name="week13_dt"><td><input type="number" id="week13" name="week13"></td></tr>
		    <tr><th>Week 14</th><td><input type="date" id="week14_dt" name="week14_dt"><td><input type="number" id="week14" name="week14"></td></tr>
		    <tr><th>Week 15</th><td><input type="date" id="week15_dt" name="week15_dt"><td><input type="number" id="week15" name="week15"></td></tr>
		    <tr><th>Week 16</th><td><input type="date" id="week16_dt" name="week16_dt"><td><input type="number" id="week16" name="week16"></td></tr>
		    <tr><th>Week 17</th><td><input type="date" id="week17_dt" name="week17_dt"><td><input type="number" id="week17" name="week17"></td></tr>
		    <tr><th>Week 18</th><td><input type="date" id="week18_dt" name="week18_dt"><td><input type="number" id="week18" name="week18"></td></tr>
		    <tr><th>Week 19</th><td><input type="date" id="week19_dt" name="week19_dt"><td><input type="number" id="week19" name="week19"></td></tr>
		    <tr><th>Week 20</th><td><input type="date" id="week20_dt" name="week20_dt"><td><input type="number" id="week20" name="week20"></td></tr>
		    <tr><th>Week 21</th><td><input type="date" id="week21_dt" name="week21_dt"><td><input type="number" id="week21" name="week21"></td></tr>
		    <tr><th>Week 22</th><td><input type="date" id="week22_dt" name="week22_dt"><td><input type="number" id="week22" name="week22"></td></tr>
		    <tr><th>Week 23</th><td><input type="date" id="week23_dt" name="week23_dt"><td><input type="number" id="week23" name="week23"></td></tr>
		    <tr><th>Week 24</th><td><input type="date" id="week24_dt" name="week24_dt"><td><input type="number" id="week24" name="week24"></td></tr>
		    <tr><th>Week 25</th><td><input type="date" id="week25_dt" name="week25_dt"><td><input type="number" id="week25" name="week25"></td></tr>
		    <tr><th>Week 26</th><td><input type="date" id="week26_dt" name="week26_dt"><td><input type="number" id="week26" name="week26"></td></tr>
		    <tr><th>Week 27</th><td><input type="date" id="week27_dt" name="week27_dt"><td><input type="number" id="week27" name="week27"></td></tr>
		    <tr><th>Week 28</th><td><input type="date" id="week28_dt" name="week28_dt"><td><input type="number" id="week28" name="week28"></td></tr>
		    <tr><th>Week 29</th><td><input type="date" id="week29_dt" name="week29_dt"><td><input type="number" id="week29" name="week29"></td></tr>
		    <tr><th>Week 30</th><td><input type="date" id="week30_dt" name="week30_dt"><td><input type="number" id="week30" name="week30"></td></tr>
		</tr>
		</tfoot>
</table>
</div>

										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php include('includes/footer_links.php') ?>
</body>
</html>