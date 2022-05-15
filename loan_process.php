<?php 
	include('default_variables.php');
	include('includes/message.php');
	$fetch_interesttype=$functionObj->fetch_interesttype();	
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
								<h3 class="page-title">Process Loan</h3>
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
                    <h5 class="card-title">**Please be careful in processing the Loans.</h5>
                      <form class="form-sample">
                        <p class="card-description" style="color: #3b3b79"><b>Loan Details</b></p>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Select the Interest type</label>
                              <div class="col-sm-9">
								<input type="hidden" id="hdn_usrid" name="hdn_usrid" value="<?php echo $_REQUEST['id'];?>" />
								<select class="form-control" id="loan_interesttype" name="loan_interesttype" onchange="interest_allocation(this.value)">
									<option value="">Select the Interest Type</option>
									<?php while($role = mysql_fetch_array($fetch_interesttype)){ ?>
									<option value="<?php echo $role['interesttype_id']; ?>"><?php echo $role['interesttype_name']; ?></option>
									<?php } ?>
								</select>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Loan request Amount (INR)<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="number" id="request_amount" name="request_amount" placeholder="0" style="font-size: 15px" class="form-control" onkeyup="LoanCalculation()">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Interest Allocated (%)</label>
                            <div class="col-sm-9">
                              <input type="number" placeholder="0%" id="loan_interest_percent" name="loan_interest_percent" style="font-size: 15px" class="form-control" onkeyup="LoanCalculation()">
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total Payable Amount (INR)</label>
                            <div class="col-sm-9">
                              <input type="number" placeholder="0" style="font-size: 15px" class="form-control" id="tpa" name="tpa" onkeyup="LoanCalculation()">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Number of Term</label>
                            <div class="col-sm-9">
                              <select id="loan_number_of_terms" name="loan_number_of_terms" class="form-control" onchange="LoanCalculation()">
                                  <option>Select No.Of.Terms</option>
								  <option>12</option>
                                  <option>6</option>
                                  <option>9</option>
                                  <option>12</option>
                                  <option>3</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                        
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Monthly Due (INR)</label>
                            <div class="col-sm-9">
                              <input disabled class="form-control" value="0" placeholder="0" id="md" name="md" style="font-size: 15px"/>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6">
                          <button id="chk_feasibility" name="chk_feasibility" style="background-color:green" type="button" class="btn btn-primary mr-2" value="submit" onclick="chk_netincome()">Check Feasibility</button>  <input disabled id ="ni_fsbl" name="ni_fsbl" type="text" required/>
                            <i class="icon-like menu-icon" style="font-size: 20px"></i>
                            <i class="icon-dislike menu-icon" style="font-size: 20px"></i>
                            <p>Here,Monthly due amount will be compared with the Net Income. If the Monthly Due Amount will be less than Net Income, he can avail the Loans. Else it shows the Dislike Icon. </p>
                        </div>
                      </div>




                    <h5 class="card-title">**Select Co-Borrower</h5>

                     <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mobile Number<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" required/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Aadhar Number<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PAN Number<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" required/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="text" name="firstname" class="form-control" required />
                            </div>
                          </div>
                        </div>
                      </div>
                         
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Relation to Applicant<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" required />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row" style="align:center">
                        <div class="col-md-6">
                          <button style="background-color:green"type="submit" class="btn btn-primary mr-2" value="submit">GET OTP</button>  <input type="number" required/>
                          <i class="icon-check menu-icon"></i>
                          <i class="icon-close menu-icon"></i>
                          <p>Based on OTP Value, Any one mark will be displayed here.</p>
                        <div class="form-group row">
                      </div>
                    </div>
                  </div>
                    
                    <h5 class="card-title">**Select Guarantor</h5>

                     <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mobile Number<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" required/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Aadhar Number<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PAN Number<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" required/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="text" name="firstname" class="form-control" required />
                            </div>
                          </div>
                        </div>
                      </div>
                         
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Relation to Applicant<b>**</b></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" required />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row" style="align:center">
                        <div class="col-md-6">
                          <button style="background-color:green"type="submit" class="btn btn-primary mr-2" value="submit">GET OTP</button>  <input type="number" required/>
                          <i class="icon-check menu-icon"></i>
                          <i class="icon-close menu-icon"></i>
                          <p>Based on OTP Value, Any one mark will be displayed here.</p>
                        <div class="form-group row">
                      </div>
                    </div>
                  </div>

                      <div class="row">
                        <div class="col-md-6">
                          <button style="background-color:green"type="submit" class="btn btn-primary mr-2" value="submit">Check Feasibility</button>  <input disabled="" type="number" required/>
                            <i class="icon-like menu-icon" style="font-size: 20px"></i>
                            <i class="icon-dislike menu-icon" style="font-size: 20px"></i>
                            <p>Here, Number of guarantee he had given for occured loans at TT Financial Services will be checked and displays here the total number of loans he linked with. </p>
                        </div>
                      </div>

                      <br>
                    <h5 class="card-title">**Documents Submitted</h5>
                      <div class="form-check form-check-success">
                      </div>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                      
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> 2 Passport Size Photos </label>
                            </div>
                      
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Address Proof(Ration Card, Gas Book) </label>
                            </div>
                      
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> ID Proof (Aadhar Card, Pan Card, Driving License, Voter ID)</label>
                            </div>
                      
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Last 3 Months Bank Statement</label>
                            </div>
                          </div>
                        </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Post Dated Cheque </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                               <input type="checkbox" class="form-check-input"> Guarantor's Pay Slip & Bank Statement with 2 Passport size Photos </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Guarantor's ID Proof Xerox </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Demand Promissory Note </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

            <!--Select Type of Persons--->
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin's Approval Status</h4>              
                      <div class="form-group">
                        <div class="form-check form-check-success">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="ExampleRadio1" id="ExampleRadio2" checked> Borrower</label>
                        </div>

                        <div class="form-check form-check-success">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="ExampleRadio2" id="ExampleRadio2" checked> Co-Borrower </label>
                        </div>

                        <div class="form-check form-check-success">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="ExampleRadio3" id="ExampleRadio2" checked> Guarantor </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <!--Type of Person select ends--->

            <!--Bank Details--->
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Payment Details</h4>
                                        
                    <div class="form-group row">
                      <div class="col">
                        <label>Processing Fee (INR)</label>
                        <div id="the-basics">
                          <input class="typeahead" type="number" placeholder="">
                        </div>
                      </div>

                      <div class="col">
                        <label>Document Charges (INR)</label>
                        <div id="bloodhound">
                          <input class="typeahead" type="number" placeholder="">
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col">
                        <label>Sub Total (INR)</label>
                        <div id="the-basics">
                          <input class="typeahead" type="number" placeholder="Automatic Calculation">
                        </div>
                      </div>

                      <div class="col">
                        <label>Discount (INR)</label>
                        <div id="bloodhound">
                          <input disabled="" class="typeahead" type="number" placeholder="">
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col">
                        <label>Total (INR)</label>
                        <div id="the-basics">
                          <input class="typeahead" type="number" placeholder="Automatic Calculation">
                        </div>
                      </div>
                    </div>

                    <div>
                      <button type="submit" class="btn btn-primary mr-2" value="submit" onclick="showSwal('success-message')">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
		  <?php include('includes/footer_links.php') ?>

          <!-- content-wrapper ends -->
  </body>
</html>