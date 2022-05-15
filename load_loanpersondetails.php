<?php
	include('default_variables.php');
	$loan_mobile = $_POST['loan_mobile'];
	if($loan_mobile != '') {
		$check_existance	= $functionObj->fetch_loanuser($loan_mobile); 
		$row = mysql_fetch_array($check_existance);
		if(mysql_num_rows($check_existance) == 1){
			$user_id = $row['user_id'];
			$fetch_usergroup=$functionObj->fetch_usergroup('','1','1');
			$fetch_address_proof=$functionObj->fetch_address_proof('','1');
			$fetch_id_proof=$functionObj->fetch_id_proof('','1');
			$fetch_user=$functionObj->fetch_user($user_id,'','','','','');
			$fetch_gender=$functionObj->fetch_gender();
			$fetch_pdistrict=$functionObj->fetch_pdistrict();
			$fetch_cdistrict=$functionObj->fetch_cdistrict();
			$fetch_nature=$functionObj->fetch_nature();
			$fetch_residential=$functionObj->fetch_residential();	
			$fetch_marital=$functionObj->fetch_marital();	
			$row =mysql_fetch_array($fetch_user);
			$fetch_district=$functionObj->fetch_district($row['user_cur_district']);
			$fetch_city	= $functionObj->fetch_city('','','1');
?>
<?php include('includes/message.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/header_links.php');?>
</head>
<body>
<script type="text/javascript">
$( document ).ready(function() {
    var mobile = $("#user_mobile").val();
    var whatsapp = $("#user_whatsapp").val();
	
	if(mobile == whatsapp){
		$("#sameas_mobile").prop('checked', true);
		$("#user_whatsapp").prop('readonly', true);
	}
});
</script>
	<form action="" method="POST" name="add_person" enctype="multipart/form-data">
		<div class="container-scroller">
			<?php include('includes/topmenubar.php'); ?> 
			<div class="container-fluid page-body-wrapper">
				<?php include('includes/leftmenubar.php');?> 
				<div class="main-panel">
					<div class="content-wrapper">
						<div class="page-header">
							<h3 class="page-title">Apply Personal Loan</h3>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
								  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								  <li class="breadcrumb-item active" aria-current="page">Personal Loan</li>
								</ol>
							</nav>
						</div>
						<div class="row">
							<div class="col-12 grid-margin">
								<div class="card">
									<div class="card-body">
										<p class="card-description" style="color: #3b3b79"><b>Personal Info</b></p>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Mobile Number<b>**</b></label>
													<div class="col-sm-9">
														<input type="number" class="form-control" id="user_mobile" name="user_mobile" value="<?php echo $row['user_mobile'];?>" onchange="check_existance(this.value)" readonly />
														<span id="err_exist" class="error"></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Aadhar Number<b>**</b></label>
													<div class="col-sm-9">
													  <input type="number" class="form-control" id="user_aadhar" name="user_aadhar" value="<?php echo $row['user_aadhar'];?>" readonly />
													</div>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">PAN Number<b>**</b></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="user_pan" name="user_pan" value="<?php echo $row['user_pan'];?>" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Full Name<b>**</b></label>
													<div class="col-sm-9">
														<input type="text"  class="form-control" id="user_name" name="user_name" value="<?php echo $row['user_name'];?>" readonly />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Registration ID</label>
													<div class="col-sm-9">
														<input  class="form-control" id="user_registration_id" name="user_registration_id" value="<?php echo$row['user_registration_id'];?>" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Father's Name<b>**</b></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="user_father" name="user_father" value="<?php echo $row['user_father'];?>" readonly />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Mother's Name</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="user_mother" name="user_mother" value="<?php echo $row['user_mother'];?>" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">WhatsApp Number<b>**</b></label>
													<div class="col-sm-9">
														<input type="number" class="form-control" id="user_whatsapp" name="user_whatsapp" value="<?php echo $row['user_whatsapp'];?>" readonly />
													</div>
													<div class="form-check form-check-success">
														<label class="form-check-label">
														<input type="checkbox" class="form-check-input" id="sameas_mobile" name="sameas_mobile" disabled >As same as Mobile Number</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Alternate Mobile Number</label>
													<div class="col-sm-9">
														<input type="number" class="form-control" id="user_alternate_mobile" name="user_alternate_mobile" value="<?php echo $row['user_alternate_mobile'];?>" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Gender<b>**</b></label>
													<div class="col-sm-9">
														<select class="form-control" id="user_gender" name="user_gender" disabled >
															<option value="<?php echo $row['gender_id'];?>"><?php echo $row['gender_name'];?></option>
															<option value="">--Select Gender--</option>
															<?php 
																while($grow = mysql_fetch_array($fetch_gender)){ 
																	if($grow['gender_id'] != $row['user_gender']){ 
															?>
															<option value="<?php echo $grow['gender_id']; ?>"><?php echo $grow['gender_name']; ?></option>
															<?php } } ?>	
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Date of Birth<b>**</b></label>
													<div class="col-sm-9">
														<input type="date" class="form-control" placeholder="DD/MM/YYYY" id="user_dob" name="user_dob" value="<?php echo $row['user_dob'];?>" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">E-Mail<b>**</b></label>
													<div class="col-sm-9">
														<input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo $row['user_email'];?>" readonly />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Marital Status<b>**</b></label>
													<div class="col-sm-9">
														<select class="form-control" id="user_marital_status" name="user_marital_status" onchange="enable_spouse(this.value)" disabled >
														  <option value="<?php echo $row['marital_id'];?>"><?php echo $row['marital_name'];?></option>
														  <option value="">--Select Marital Status--</option>
														  <?php 
														  while($msrow = mysql_fetch_array($fetch_marital)){ 
															if($msrow['marital_id'] != $row['user_marital_status']){ 
														  ?>
														  <option value="<?php echo $msrow['marital_id']; ?>"><?php echo $msrow['marital_name']; ?></option>
														  <?php } } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Spouse Name<b>**</b></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="user_spouse" name="user_spouse" value="<?php echo $row['user_spouse'];?>" readonly />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Number of Dependant<b>**</b></label>
													<div class="col-sm-9">
														<input type="number" class="form-control" id="user_no_of_dependant" name="user_no_of_dependant" value="<?php echo $row['user_no_of_dependant'];?>" readonly />
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
															<textarea class="form-control" name="user_per_address" id="user_per_address" readonly ><?php echo $row['user_per_address'];?></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">State</label>
														<div class="col-sm-9">
															<input readonly type="text" class="form-control" value="TamilNadu" id="user_per_state" name="user_per_state" value="<?php echo $row['user_per_state'];?>" readonly />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
													<label class="col-sm-3 col-form-label">District</label>
														<div class="col-sm-9">
															<select class="form-control" id="user_per_district" name="user_per_district" onchange="load_per_city(this.value)" disabled >
															  <option value="<?php echo $row['district_id'];?>"><?php echo $row['district_name'];?></option>
																<option value="">--Select District--</option>
																<?php 
																	while($pdrow = mysql_fetch_array($fetch_pdistrict)){ 
																		if($pdrow['district_id'] != $row['user_per_district']){ 
																?>
																<option value="<?php echo $pdrow['district_id']; ?>"><?php echo $pdrow['district_name']; ?></option>
																<?php } } ?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row" id="per_city_name">
														<label class='col-sm-3 col-form-label'>City</label>
														<div class='col-sm-9'>
															<?php 
																$fetch_pcity=$functionObj->fetch_pcity($row['user_per_city']);
																$pcrow = mysql_fetch_array($fetch_pcity);
															?>
															<select class='form-control' id='user_per_city' name='user_per_city' disabled >
																<option value='<?php echo $row['user_per_city']; ?>'><?php echo $pcrow['city_name']; ?></option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Postcode</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" id="user_per_postcode" name="user_per_postcode" value="<?php echo $row['user_per_postcode'];?>" readonly />
														</div>
													</div>
												</div>
											</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Residential Status</label>
													<div class="col-sm-9">
														<select class="form-control" id="user_residential" name="user_residential" disabled >
														  <option value="<?php echo $row['residential_id'];?>"><?php echo $row['residential_name'];?></option>
														  <option value="">--Select Residential Status--</option>
														  <?php 
														  while($rsrow = mysql_fetch_array($fetch_residential)){ 
															if($rsrow['residential_id'] != $row['user_residential']){ 
														  ?>
														  <option value="<?php echo $rsrow['residential_id']; ?>"><?php echo $rsrow['residential_name']; ?></option>
														  <?php } } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">No.of years lived at the Address</label>
													<div class="col-sm-9">
														<input type="number" class="form-control" id="user_years" name="user_years" value="<?php echo $row['user_years'];?>" readonly />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
											  <div class="form-group row">
												<label class="col-sm-3 col-form-label">Landmark</label>
												<div class="col-sm-9">
												  <input type="text" class="form-control" id="user_per_landmark" name="user_per_landmark" value="<?php echo $row['user_per_landmark'];?>" readonly />
												</div>
											</div>
										</div>
									</div>
									<p class="card-description" style="color:#3b3b79"><b>Current Address</b></p>
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Address</label>
												<div class="col-sm-9">
													<textarea class="form-control" name="user_cur_address" id="user_cur_address" readonly ><?php echo $row['user_cur_address'];?></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">State</label>
												<div class="col-sm-9">
													<input readonly class="form-control" value="TamilNadu" id="user_cur_state" name="user_cur_state" readonly />
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">District</label>
												<div class="col-sm-9">
													<select class="form-control" id="user_cur_district" name="user_cur_district" onchange="load_cur_city(this.value)" disabled >
													  <?php $dnrow = mysql_fetch_array($fetch_district); ?>
													  <option value="<?php echo $dnrow['district_id'];?>"><?php echo $dnrow['district_name'];?></option>
													  <option value="">--Select District--</option>
													  <?php 
													  while($cdrow = mysql_fetch_array($fetch_cdistrict)){ 
														if($cdrow['district_id'] != $row['user_cur_district']){ 
													  ?>
													  <option value="<?php echo $cdrow['district_id']; ?>"><?php echo $cdrow['district_name']; ?></option>
													  <?php } } ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row" id="cur_city_name">
												<label class='col-sm-3 col-form-label'>City</label>
												<div class='col-sm-9'>
													<?php 
														$fetch_ccity=$functionObj->fetch_city($row['user_cur_city']);
														$ccrow = mysql_fetch_array($fetch_ccity);
													?>
													<select class='form-control' id='user_cur_city' name='user_cur_city' disabled >
														<option value='<?php echo $ccrow['city_id']; ?>'><?php echo $ccrow['city_name']; ?></option>
														<option value=''>Select City</option>
														<?php while($crow = mysql_fetch_array($fetch_city)) { 
														if($crow['city_id'] != $row['user_cur_city']){ 
														?>
														<option value='<?php echo $crow['city_id']; ?>'><?php echo $crow['city_name']; ?></option>";
														<?php } } ?>
													</select>
													<input type="hidden" id="hdn_cur_district" name="hdn_cur_district" />
													<input type="hidden" id="hdn_cur_city" name="hdn_cur_city" />
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Postcode</label>
												<div class="col-sm-9">
													<input type="number" class="form-control" id="user_cur_postcode" name="user_cur_postcode" value="<?php echo $row['user_cur_postcode'];?>" readonly /> 
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Landmark</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="user_cur_landmark" name="user_cur_landmark" value="<?php echo $row['user_cur_landmark'];?>" readonly />
												</div>
											</div>
										</div>
									</div>
									<p class="card-description" style="color:#3b3b79"><b>Work & Income Details</b></p>
									<p class="card-description" style="color:#3b3b79"><b>Work Details</b></p>
									<div class="form-check form-check-success">
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Nature of Job</label>
												<div class="col-sm-9">
													<select class="form-control" id="work_nature_of_job" name="work_nature_of_job" disabled >
													  <option value="<?php echo $row['work_nature_of_job']; ?>"><?php echo $row['nature_name']; ?></option>
													  <option value="">Select Nature Of Job</option>
													  <?php while($nrow = mysql_fetch_array($fetch_nature)){ 
																if($nrow['nature_id'] != $row['work_nature_of_job']){ 
													  ?>
													  <option value="<?php echo $nrow['nature_id']; ?>"><?php echo $nrow['nature_name']; ?></option>
													  <?php } } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Company's Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" placeholder="XYZ Solutions" id="work_company_name" name="work_company_name" value="<?php echo $row['work_company_name'];?>" readonly />
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Current Work Period</label>
												<div class="col-sm-9">
													<input type="number" class="form-control" placeholder="Eg : 2 Years" id="work_current_period" name="work_current_period" onkeyup="workExperience()" value="<?php echo $row['work_current_period'];?>" readonly /> 
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Previous Work Period</label>
												<div class="col-sm-9">
													<input type="number" class="form-control" placeholder="Eg : 4 Years" id="work_previous_period" name="work_previous_period" onkeyup="workExperience()" value="<?php echo $row['work_previous_period'];?>" readonly />
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Position</label>
												<div class="col-sm-9">
												   <input type="text" class="form-control" placeholder="Eg : Salesman" id="work_position" name="work_position" value="<?php echo $row['work_position'];?>" readonly />
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Total Experience</label>
												<div class="col-sm-9">
													<input readonly type="number" class="form-control" placeholder="Eg : 6 Years (Automatic Calculation)" id="work_total_experience" name="work_total_experience" value="<?php echo $row['work_total_experience'];?>" />
												</div>
											</div>
										</div>
									</div>
									<p class="card-description" style="color:#3b3b79"><b>Income Details</b></p>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Net Salary (INR)</label>
												<div class="col-sm-9">
													<input type="number" class="form-control" placeholder="(+)" id="work_netsalary" name="work_netsalary"  onkeyup="netIncomeCalculation()" value="<?php echo $row['work_netsalary'];?>" readonly />
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Allowances (INR)</label>
												<div class="col-sm-9">
													<input type="number" class="form-control" placeholder="(+)" id="work_allowances" name="work_allowances"  onkeyup="netIncomeCalculation()" value="<?php echo $row['work_allowances'];?>" readonly  />
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Other Incomes (INR)</label>
												<div class="col-sm-9">
													<input type="number"  class="form-control" placeholder="(+)" id="work_other_incomes" name="work_other_incomes"  onkeyup="netIncomeCalculation()" value="<?php echo $row['work_other_incomes'];?>" readonly />
												</div>
											</div>
										</div>
									</div>
									<p class="card-description" style="color:#3b3b79"><b>Expenditure Details</b></p>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Monthly Expenses (INR)</label>
												<div class="col-sm-9">
													<input type="number" class="form-control" placeholder="(-)" id="work_monthly_expenses" name="work_monthly_expenses"  onkeyup="netIncomeCalculation()" value="<?php echo $row['work_monthly_expenses'];?>" readonly />
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Expenses on other dependants (INR)</label>
												<div class="col-sm-9">
													<input type="number" class="form-control" placeholder="(-)" id="work_expenses_on_other_dependants" name="work_expenses_on_other_dependants" onkeyup="netIncomeCalculation()" value="<?php echo $row['work_expenses_on_other_dependants'];?>" readonly />
												</div>
											</div>
										</div>
									</div>
									<p class="card-description" style="color:#3b3b79"><b>Loan Details</b></p>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Monthly Loan Amount</label>
												<div class="col-sm-9">
													<input type="number" class="form-control" placeholder="(-)" id="work_monthly_loan_amount" name="work_monthly_loan_amount"  onkeyup="netIncomeCalculation()" value="<?php echo $row['work_monthly_loan_amount'];?>" readonly />
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Borrower Company Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" placeholder="Muthoot Finance" id="work_borrower_company_name" name="work_borrower_company_name" value="<?php echo $row['work_borrower_company_name'];?>" readonly />
												</div>
											</div>
										</div>
									</div>
									<p class="card-description" style="color:#3b3b79"><b>Net Income Details</b></p>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Net Income (INR)</label>
												<div class="col-sm-9">
													<input readonly type="number" class="form-control" placeholder="**Automatic Calculation" id="work_net_income" name="work_net_income" value="<?php echo $row['work_net_income']?>" readonly />
												</div>
											</div>
										</div>
									</div>
									<p class="card-description" style="color:#3b3b79"><b>Upload Photos</b></p>
									<div class="form-check form-check-success">
									</div>
									<div class="row">
										<div class="col-md-6">
											<img src="<?php echo $row['photo_path'];?>" alt="<?php echo $row['user_name'];?>" width="70" height="90"><br />
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Upload Photo</label>
												<div class="col-sm-9">
													<input type="file" id="upload_photo" name="upload_photo" class="file-upload-default" accept="image/*">
													<div class="input-group col-xs-12">
														<input type="text" class="form-control file-upload-info" placeholder="Passport size" disabled>
														<input type="hidden" id="photo_path" name="photo_path" value="<?php echo $row['photo_path'];?>" >
														<span class="input-group-append">
															<button class="file-upload-browse btn btn-primary" type="button" disabled>Upload </button>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Select Address Proof</label>
												<div class="col-sm-9">
													<div class="input-group col-xs-12">
														<select class="form-control" id="address_proof_id" name="address_proof_id" disabled >
															 <option value="<?php echo $row['address_proof_id']; ?>"><?php echo $row['address_proof_name']; ?></option>
															 <option value="">Select Address Proof </option>
															 <?php while($aprow = mysql_fetch_array($fetch_address_proof)){ 
																if($aprow['address_proof_id'] != $row['address_proof_id']){ 
															  ?>
															 <option value="<?php echo $aprow['address_proof_id']; ?>"><?php echo $aprow['address_proof_name']; ?></option>
															 <?php } } ?>
														</select>
														<span class="input-group-append">
														<!-- btn -->
														</span>
													</div>
													<label class="col-sm-9 col-form-label"><?php echo $row['address_proof_name']; ?></label>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Upload Address Proof</label>
												<div class="col-sm-9">
													<input type="file" id="upload_adproof" name="upload_adproof" class="file-upload-default" accept="image/*" >
													<div class="input-group col-xs-12">
														<input type="text" class="form-control file-upload-info" placeholder="Address Proof" disabled>
														<input type="hidden" id="address_proof_path" name="address_proof_path" value="<?php echo $row['address_proof_path'];?>" >
														<span class="input-group-append">
															<button class="file-upload-browse btn btn-primary" type="button" disabled >Upload</button>
														</span>
													</div>
													<label class="col-sm-9 col-form-label"><?php echo $row['address_proof_path']; ?></label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Select ID Proof</label>
												<div class="col-sm-9">
													<div class="input-group col-xs-12">
														<select class="form-control" id="id_proof_id" name="id_proof_id" disabled >
															 <option value="<?php echo $row['id_proof_id']; ?>"><?php echo $row['id_proof_name']; ?></option>
															 <option value="">Select ID Proof </option>
															 <?php while($iprow = mysql_fetch_array($fetch_id_proof)){ 
																if($iprow['id_proof_id'] != $row['id_proof_id']){ 
															  ?>
															 <option value="<?php echo $iprow['id_proof_id']; ?>"><?php echo $iprow['id_proof_name']; ?></option>
															 <?php } } ?>
														</select>
														<span class="input-group-append">
															<!-- btn -->
														</span>
													</div>
													<label class="col-sm-9 col-form-label"><?php echo $row['id_proof_name']; ?></label>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Upload ID Proof</label>
												<div class="col-sm-9">
													<input type="file" id="upload_idproof" name="upload_idproof" class="file-upload-default" accept="image/*" >
													<div class="input-group col-xs-12">
														<input type="text" class="form-control file-upload-info" placeholder="ID Proof" disabled>
														<input type="hidden" id="id_proof_path" name="id_proof_path" value="<?php echo $row['id_proof_path'];?>" >
														<span class="input-group-append">
															<button class="file-upload-browse btn btn-primary" type="button" disabled >Upload</button>
														</span>
													</div>
													<label class="col-sm-9 col-form-label"><?php echo $row['id_proof_path']; ?></label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Select the Role of the Person</h4>
									<div class="form-group">
										<label>Borrower/Co-Borrower/Guarantor/Employee</label>
										<select class="form-control" id="usergroup_id" name="usergroup_id" onchange="enable_loancount(this.value)" disabled >
										  <option value="<?php echo $row['usergroup_id'];?>"><?php echo $row['usergroup_prefix'].'-'.$row['usergroup_name'];?></option>
											<option value="">--Select Role--</option>
											<?php 
												while($role = mysql_fetch_array($fetch_usergroup)){ 
													if($role['usergroup_id'] != $row['usergroup_id']){ 
											?>
											<option value="<?php echo $role['usergroup_id']; ?>"><?php echo $role['usergroup_prefix'].'-'.$role['usergroup_name']; ?></option>
											<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label>If Guarantor, Number of Loans Guaranteed, at TTF</label>
										<input type="number" class="form-control"  id="loans_ttf" name="loans_ttf" value="<?php echo $row['loans_ttf'] ?>" readonly />
									</div>
									<div class="form-group">
										<label>If Guarantor, Number of Loans Guaranteed, outside TTF</label>
										<input type="number" class="form-control"  id="loans_ottf" name="loans_ottf" value="<?php echo $row['loans_ottf']?>" readonly />
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Bank Details</h4>
									<p class="card-description">**This column will be enabled only if the type of the person will be Borrower or Employee in the previous column. </p>
									<div class="form-group row">
										<div class="col">
											<label>Account Number</label>
											<div id="the-basics">
												<input class="typeahead" type="number" placeholder="Type Acc Number" id="bank_account_no" name="bank_account_no" value="<?php echo $row['bank_account_no'];?>" readonly >
											</div>
										</div>
										<div class="col">
											<label>Account Name</label>
											<div id="bloodhound">
												<input class="typeahead" type="text" placeholder="Enter A/c Holder Name" id="bank_account_name" name="bank_account_name" value="<?php echo $row['bank_account_name'];?>" readonly >
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col">
											<label>Bank Name</label>
											<div id="the-basics">
												<input class="typeahead" type="text" placeholder="Enter Name of the Bank" id="bank_name" name="bank_name" value="<?php echo $row['bank_name'];?>" readonly >
											</div>
										</div>
										<div class="col">
											<label>Branch Name</label>
											<div id="bloodhound">
												<input class="typeahead" type="text" placeholder="Enter name of the Branch" id="bank_branch_name" name="bank_branch_name" value="<?php echo $row['bank_branch_name'];?>" readonly >
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col">
											<label>IFSC Code</label>
											<div id="the-basics">
												<input type="text" class="form-control" placeholder="**IFSC Code" id="bank_ifsc" name="bank_ifsc" value="<?php echo $row['bank_ifsc'];?>" readonly />
											</div>
										</div>
									</div>
									<div>
										<a href="loan_process.php?id=<?php echo $row['user_id'];?>" class="btn btn-primary mr-2" >Submit</a>
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
<?php 
}
	else{
		echo "0";
	}
}
?>