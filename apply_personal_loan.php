<?php 
	include('default_variables.php');
	include('includes/message.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/header_links.php');?>
</head>
<body>
	<div id="load_loanpersondetails">
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
									  <li class="breadcrumb-item active" aria-current="page"> Personal loan </li>
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
															<input type="number" class="form-control" id="loan_mobile" name="loan_mobile">
															<input type="hidden" id="hdn_mobile" name="hdn_mobile" />
															<span id="err_mobileexist" class="error"></span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Aadhar Number<b>**</b></label>
														<div class="col-sm-9">
														  <input type="number" class="form-control" id="user_aadhar" name="user_aadhar" onchange="check_aadhar(this.value)" readonly />
														  <span id="err_aadhar" class="error"></span>
														</div>
													</div>
												</div>
											</div>
											<div class="row" style="align:center">
												<div class="col-md-6">
													<button style="background-color:green"type="submit" class="btn btn-primary mr-2" value="submit">GET OTP</button>  
													<input type="number" id="user_otp" name="user_otp" />
													<i class="icon-check menu-icon"></i>
													<i class="icon-close menu-icon"></i>
													<p>Based on OTP Value, Any one mark will be displayed here.</p>
													<div class="form-group row">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">PAN Number<b>**</b></label>
														<div class="col-sm-9">
															<input type="text" class="form-control" id="user_pan" name="user_pan" onchange="check_pan(this.value)" readonly />
															<span id="err_pan" class="error"></span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Full Name<b>**</b></label>
														<div class="col-sm-9">
															<input type="text"  class="form-control" id="user_name" name="user_name" readonly />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Registration ID</label>
														<div class="col-sm-9">
															<input  class="form-control" id="user_registration_id" name="user_registration_id" value="<?php echo $fetch_regid; ?>" readonly />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Father's Name<b>**</b></label>
														<div class="col-sm-9">
															<input type="text" class="form-control" id="user_father" name="user_father" readonly />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Mother's Name</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" id="user_mother" name="user_mother" readonly />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">WhatsApp Number<b>**</b></label>
														<div class="col-sm-9">
															<input type="number" class="form-control" id="user_whatsapp" name="user_whatsapp" readonly />
														</div>
														<div class="form-check form-check-success">
															<label class="form-check-label">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Alternate Mobile Number</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" id="user_alternate_mobile" name="user_alternate_mobile" readonly />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Gender<b>**</b></label>
														<div class="col-sm-9">
															<select class="form-control" id="user_gender" name="user_gender" disabled >
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
														<label class="col-sm-3 col-form-label">Date of Birth<b>**</b></label>
														<div class="col-sm-9">
															<input type="date" class="form-control" placeholder="DD/MM/YYYY" id="user_dob" name="user_dob" readonly />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">E-Mail<b>**</b></label>
														<div class="col-sm-9">
															<input type="email" class="form-control" id="user_email" name="user_email" readonly />
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
															<input type="text" class="form-control" id="user_spouse" name="user_spouse" value="None" readonly />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Number of Dependant<b>**</b></label>
														<div class="col-sm-9">
															<input type="number" class="form-control" id="user_no_of_dependant" name="user_no_of_dependant"  readonly />
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
																<textarea class="form-control" name="user_per_address" id="user_per_address" disabled ></textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group row">
															<label class="col-sm-3 col-form-label">State</label>
															<div class="col-sm-9">
																<input readonly type="text" class="form-control" value="TamilNadu" id="user_per_state" name="user_per_state" />
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group row">
														<label class="col-sm-3 col-form-label">District</label>
															<div class="col-sm-9">
																<select class="form-control" id="user_per_district" name="user_per_district" onchange="load_per_city(this.value)" disabled >
																  <option value="">Select District</option>
																  <?php while($pdrow = mysql_fetch_array($fetch_pdistrict)){ ?>
																  <option value="<?php echo $pdrow['district_id']; ?>"><?php echo $pdrow['district_name']; ?></option>
																  <?php } ?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group row" id="per_city_name">
															<div class='col-sm-9' id='city_name'>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group row">
															<label class="col-sm-3 col-form-label">Postcode</label>
															<div class="col-sm-9">
																<input type="number" class="form-control" id="user_per_postcode" name="user_per_postcode" readonly />
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
															<input type="number" class="form-control" id="user_years" name="user_years" readonly />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
												  <div class="form-group row">
													<label class="col-sm-3 col-form-label">Landmark</label>
													<div class="col-sm-9">
													  <input type="text" class="form-control" id="user_per_landmark" name="user_per_landmark" readonly />
													</div>
												</div>
											</div>
										</div>
										<p class="card-description" style="color:#3b3b79"><b>Current Address</b></p>
										<div class="form-check form-check-success">
											<label class="form-check-label">
											<input type="checkbox" class="form-check-input" id="sameas_address" name="sameas_address"disabled >As same as Permanent Address</label>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Address</label>
													<div class="col-sm-9">
														<textarea class="form-control" name="user_cur_address" id="user_cur_address" disabled ></textarea>
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
														  <option value="">Select District</option>
														  <?php while($cdrow = mysql_fetch_array($fetch_cdistrict)){ ?>
														  <option value="<?php echo $cdrow['district_id']; ?>"><?php echo $cdrow['district_name']; ?></option>
														  <?php } ?>
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
														<select class='form-control' id='user_cur_city' name='user_cur_city' disabled >
															<option value=''>Select City</option>
															<?php while($crow = mysql_fetch_array($fetch_city)) { ?>
														  <option value='<?php echo $crow['city_id']; ?>'><?php echo $crow['city_name']; ?></option>";
														  <?php } ?>
														</select>
													</div>
												</div>
												<input type="hidden" id="hdn_cur_district" name="hdn_cur_district" />
												<input type="hidden" id="hdn_cur_city" name="hdn_cur_city" />
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Postcode</label>
													<div class="col-sm-9">
														<input type="number" class="form-control" id="user_cur_postcode" name="user_cur_postcode" readonly />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Landmark</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="user_cur_landmark" name="user_cur_landmark" readonly />
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
														  <option value="">Select Nature Of Job</option>
														  <?php while($nrow = mysql_fetch_array($fetch_nature)){ ?>
														  <option value="<?php echo $nrow['nature_id']; ?>"><?php echo $nrow['nature_name']; ?></option>
														  <?php } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Company's Name</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" placeholder="XYZ Solutions" id="work_company_name" name="work_company_name" readonly />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Current Work Period</label>
													<div class="col-sm-9">
														<input type="number" value="0" class="form-control" placeholder="Eg : 2 Years" id="work_current_period" name="work_current_period" onkeyup="workExperience()" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Previous Work Period</label>
													<div class="col-sm-9">
														<input type="number" value="0" class="form-control" placeholder="Eg : 4 Years" id="work_previous_period" name="work_previous_period" onkeyup="workExperience()" readonly />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Position</label>
													<div class="col-sm-9">
													   <input type="text" class="form-control" placeholder="Eg : Salesman" id="work_position" name="work_position"  readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Total Experience</label>
													<div class="col-sm-9">
														<input readonly type="number" class="form-control" placeholder="Eg : 6 Years (Automatic Calculation)" id="work_total_experience" name="work_total_experience" value="0" />
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
														<input type="number" value="0" class="form-control" placeholder="(+)" id="work_netsalary" name="work_netsalary"  onkeyup="netIncomeCalculation()" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Allowances (INR)</label>
													<div class="col-sm-9">
														<input type="number" value="0"  class="form-control" placeholder="(+)" id="work_allowances" name="work_allowances"  onkeyup="netIncomeCalculation()" readonly  />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Other Incomes (INR)</label>
													<div class="col-sm-9">
														<input type="number"  value="0" class="form-control" placeholder="(+)" id="work_other_incomes" name="work_other_incomes"  onkeyup="netIncomeCalculation()" readonly />
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
														<input type="number" value="0" class="form-control" placeholder="(-)" id="work_monthly_expenses" name="work_monthly_expenses"  onkeyup="netIncomeCalculation()" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Expenses on other dependants (INR)</label>
													<div class="col-sm-9">
														<input type="number" value="0" class="form-control" placeholder="(-)" id="work_expenses_on_other_dependants" name="work_expenses_on_other_dependants" onkeyup="netIncomeCalculation()" readonly />
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
														<input type="number" value="0" class="form-control" placeholder="(-)" id="work_monthly_loan_amount" name="work_monthly_loan_amount"  onkeyup="netIncomeCalculation()" readonly />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Borrower Company Name</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" placeholder="Muthoot Finance" id="work_borrower_company_name" name="work_borrower_company_name" readonly  />
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
														<input readonly type="number" class="form-control" placeholder="**Automatic Calculation" id="work_net_income" name="work_net_income" value="0" readonly />
													</div>
												</div>
											</div>
										</div>
										<p class="card-description" style="color:#3b3b79"><b>Upload Photos</b></p>
										<div class="form-check form-check-success">
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Upload Photo</label>
													<div class="col-sm-9">
														<input type="file" id="upload_photo" name="upload_photo" class="file-upload-default" accept="image/*" readonly >
														<div class="input-group col-xs-12">
															<input type="text" class="form-control file-upload-info" placeholder="Passport size">
															<span class="input-group-append">
																<button class="file-upload-browse btn btn-primary" type="button" disabled >Upload</button>
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
														<select class="form-control" id="address_proof_id" name="address_proof_id" disabled >
															<option value="">Select Address Proof </option>
															 <?php while($aprow = mysql_fetch_array($fetch_address_proof)){ ?>
															 <option value="<?php echo $aprow['address_proof_id']; ?>"><?php echo $aprow['address_proof_name']; ?></option>
															 <?php } ?>
														</select>
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
															<span class="input-group-append">
																<button class="file-upload-browse btn btn-primary" type="button" disabled >Upload</button>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Select ID Proof</label>
													<div class="col-sm-9">
														<select class="form-control" id="id_proof_id" name="id_proof_id" disabled >
														 <option value="">Select ID Proof </option>
														 <?php while($iprow = mysql_fetch_array($fetch_id_proof)){ ?>
														 <option value="<?php echo $iprow['id_proof_id']; ?>"><?php echo $iprow['id_proof_name']; ?></option>
														 <?php } ?>                                                                                                 
														</select>
														<span class="input-group-append">
															<!-- btn -->
														</span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Upload ID Proof</label>
													<div class="col-sm-9">
														<input type="file" id="upload_idproof" name="upload_idproof" class="file-upload-default" accept="image/*">
														<div class="input-group col-xs-12">
															<input type="text" class="form-control file-upload-info" placeholder="ID Proof" disabled>
															<span class="input-group-append">
																<button class="file-upload-browse btn btn-primary" type="button"disabled >Upload</button>
															</span>
														</div>
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
											  <option value="">Select Role</option>
												<?php while($role = mysql_fetch_array($fetch_usergroup)){ ?>
												<option value="<?php echo $role['usergroup_id']; ?>"><?php echo $role['usergroup_prefix'].'-'.$role['usergroup_name']; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>If Guarantor, Number of Loans Guaranteed, at TTF</label>
											<input type="number" class="form-control"  id="loans_ttf" name="loans_ttf" value="0" readonly />
										</div>
										<div class="form-group">
											<label>If Guarantor, Number of Loans Guaranteed, outside TTF</label>
											<input type="number" class="form-control"  id="loans_ottf" name="loans_ottf" value="0" readonly />
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
													<input class="typeahead" type="number" placeholder="Type Acc Number" id="bank_account_no" name="bank_account_no" readonly >
												</div>
											</div>
											<div class="col">
												<label>Account Name</label>
												<div id="bloodhound">
													<input class="typeahead" type="text" placeholder="Enter A/c Holder Name" id="bank_account_name" name="bank_account_name" readonly >
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="col">
												<label>Bank Name</label>
												<div id="the-basics">
													<input class="typeahead" type="text" placeholder="Enter Name of the Bank" id="bank_name" name="bank_name" readonly >
												</div>
											</div>
											<div class="col">
												<label>Branch Name</label>
												<div id="bloodhound">
													<input class="typeahead" type="text" placeholder="Enter name of the Branch" id="bank_branch_name" name="bank_branch_name" readonly >
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="col">
												<label>IFSC Code</label>
												<div id="the-basics">
													<input type="text" class="form-control" placeholder="**IFSC Code" id="bank_ifsc" name="bank_ifsc"  readonly />
												</div>
											</div>
										</div>
										<div>
											<button type="submit" name="add" class="btn btn-primary mr-2" value="submit" disabled >Submit</button>
											<button class="btn btn-light" disabled >Cancel</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php include('includes/footer_links.php') ?>
</body>
</html>