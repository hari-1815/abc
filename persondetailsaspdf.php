<?php 
    require_once('includes/htmltopdf/html2pdf.class.php');
	include('default_variables.php');
	$fetch_user=$functionObj->fetch_user($rid,'','','','','');
	$row =mysql_fetch_array($fetch_user);
	$address_proof=$row['address_proof_path'];
	if ($address_proof != '')
	{
		$address_proof="Updated";
	}
	$id_proof=$row['id_proof_path'];
	if($id_proof != '')
	{
		$id_proof="Updated";
	}
	$photo_proof=$row['photo_path'];
	if($photo_proof != '')
	{
		$photo_proof="Updated";
	}
	
	$html2pdf = new HTML2PDF('P', 'A4', 'en');
	try
	{
		$content .= '<page>
				<table cellspacing="0" style="width:744;">
					<tr>
						<td style="text-align:center;width:560;">
							<h4><u>APPLICANT DETAILS</u></h4>
						</td>
					</tr>
				</table>
				<br/>
				<table cellspacing="0" style="border-bottom:0px; width:744;font-family: "Segoe UI", Tahoma, sans-serif;font-size:75%; ">
					<tr>
						<td>
							<table cellspacing="0" cellpadding="0" style="width:744;font-size:10pt;text-align:center;">
								<tr>
									<td style="border-right: solid 1px #000000;border-left: solid 1px #000000;border-top: solid 1px #000000;width:280;height:30;">
										Type of the Person
									</td>
									<td style="width:260;border-right: solid 1px #000000;border-top: solid 1px #000000;width:280;">
										Borrower
									</td>
									<td rowspan="4" style="padding-left:20px;text-align:center;">
										<img src="'.$row['photo_path'].'" alt="" width="100">
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-left: solid 1px #000000;border-top: solid 1px #000000;width:280;height:30;">
										Added by
									</td>
									<td style="border-top: solid 1px #000000;border-right: solid 1px #000000;width:280;">
										Mr Kanimuthu
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-left: solid 1px #000000;border-top: solid 1px #000000;width:280;height:30;">
										Employee ID
									</td>
									<td style="border-top: solid 1px #000000;border-right: solid 1px #000000;width:280;">
										TTFSEMP002
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-left: solid 1px #000000;border-bottom: solid 1px #000000;border-top: solid 1px #000000;width:280;height:30;">
										Added on
									</td>
									<td style="border-top: solid 1px #000000;border-right: solid 1px #000000;border-bottom: solid 1px #000000;width:280;">
										04/05/2021,1:30 PM
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<br />
				<table cellspacing="0" style="border: solid 1px #000000;border-bottom:0px; width:744;font-family: "Segoe UI", Tahoma, sans-serif;font-size:75%; ">
					<tr>
						<td>
							<table cellspacing="0" cellpadding="0" style="width:725;font-size:8pt;border-bottom: solid 1px #000000;text-align:center;">
								<tr>
									<td style="border-right: solid 1px #000000;width:40;height:30;">
										S.No.
									</td>
									<td style="border-right: solid 1px #000000;width:260;">
										Name of the Details
									</td>
									<td style="width:432;">
										Description
									</td>
								</tr>
								
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										1.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Registration ID
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_registration_id'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										2.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;" rowspan="2">
										3.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Mobile Number
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_mobile'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Mobile.No Verification Status
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										4.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Aadhar Number
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_aadhar'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										5.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Pan Number
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_pan'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										6.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Fathers Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_father'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										7.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Mothers Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_mother'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										8.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Gender
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['gender_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										9.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Date of Birth
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_dob'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										10.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										E-mail
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_email'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										11.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Martial Status
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['marital_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										12.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Spouse Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_spouse'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										13.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Number of Dependent
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_no_of_dependant'].'
									</td>
								</tr>
							</table>							
						</td>
					</tr>
				</table>
			</page>';
	$content .= '<page>
				<table cellspacing="0" style="border: solid 1px #000000;border-bottom:0px; width:744;font-family: "Segoe UI", Tahoma, sans-serif;font-size:75%; ">
					<tr>
						<td>
							<table cellspacing="0" cellpadding="0" style="width:725;font-size:8pt;border-bottom: solid 1px #000000;text-align:center;">
								<tr>								
									<td style="height:20;" colspan="3">
										ADDRESS INFO-PERMANENT
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										14.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Address.1
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_per_address'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										15.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										State
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_per_state'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										16.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										District
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['district_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										17.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										City
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_per_city'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										18.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Postcode
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_per_postcode'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										19.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Residential Status
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['residential_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										20.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										No.of yrs lived at the address
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_years'].'
									</td>
								</tr>
								<tr>
									<td style="border-top: solid 1px #000000;height:20;" colspan="3">
										ADDRESS INFO-PRESENT
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										21.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Address.1
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_per_address'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										22.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										State
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_per_state'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										23.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										District
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['district_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										24.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										City
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_per_city'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										25.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Postcode
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_per_postcode'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										26.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Residential Status
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['residential_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										27.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										No.of yrs lived at the address
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['user_years'].'
									</td>
								</tr>
								<tr>
									<td style="border-top: solid 1px #000000;height:20;" colspan="3">
										WORK & INCOME DETAILS
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										28.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Nature of Job
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['nature_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										29.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Companys Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_company_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										30.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Current Work period 
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_current_period'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										31.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Previous Work Period
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_previous_period'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										32.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Position
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_position'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										33.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Total Experience
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_total_experience'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										34.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Net Salary(INR)
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_net_income'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										35.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Allowances(INR)
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_allowances'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										36.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Monthly Loan Amount(INR)
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_monthly_loan_amount'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										37.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Borrower Company Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_borrower_company_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										38.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Other Incomes(INR)
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_other_incomes'].'
									</td>
								</tr>
							</table>
						</td>
					</tr>
			</table>
		</page>';
	$content .= '<page>
				<table cellspacing="0" style="border: solid 1px #000000;border-bottom:0px; width:744;font-family: "Segoe UI", Tahoma, sans-serif;font-size:75%; ">
					<tr>
						<td>
							<table cellspacing="0" cellpadding="0" style="width:725;font-size:8pt;border-bottom: solid 1px #000000;text-align:center;">
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										41.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Monthly Expenses(INR)
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_monthly_expenses'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										42.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Expenses on other dependants(INR)
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_expenses_on_other_dependants'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										43.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Net Income(INR)
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['work_net_income'].'
									</td>
								</tr>
								<tr>
									<td style="border-top: solid 1px #000000;height:20;" colspan="3">
										BANK DETAILS
									</td>
								</tr>								
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										44.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Account Number
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['bank_account_no'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										45.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Account Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['bank_account_name'].'
									</td>
								</tr>
								
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										46.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Bank Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['bank_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										47.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Branch Name
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['bank_branch_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										48.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										IFSC Code
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['bank_ifsc'].'
									</td>
								</tr>
								<tr>
									<td style="border-top: solid 1px #000000;height:20;" colspan="3">
										DOCUMENTS SUBMITTED
									</td>
								</tr>
								
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										49.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Photo
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$photo_proof.'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										50.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Type of Address proof
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['address_proof_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										51.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Address Proof
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
									'.$address_proof.'	
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										52.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										Type of ID Proof
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$row['id_proof_name'].'
									</td>
								</tr>
								<tr>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:40;height:30;">
										53.
									</td>
									<td style="border-right: solid 1px #000000;border-top: solid 1px #000000;width:260;">
										ID Proof
									</td>
									<td style="border-top: solid 1px #000000;width:432;">
										'.$id_proof.'
									</td>
								</tr>

							</table>							
						</td>
					</tr>
				</table>
				</page>';
		$html2pdf->writeHTML($content);
		$html2pdf->Output();
	}
	catch(HTML2PDF_exception $e) {
		echo $e;
		exit;
	}
?>