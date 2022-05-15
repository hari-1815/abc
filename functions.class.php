<?php 
error_reporting(0);
class functions {
	
	/* 	DB CONNECTION */

    protected $conn;

    public function __construct() {
        $this->DbConnect();
    }

    protected function DbConnect() {
		
		/* 	SERVER DB CONNECTION */
		
		//$this->conn = @mysql_connect('sg2nlmysql15plsk.secureserver.net:3306', 'ttfinancialapp', 'TTFApp@21**') OR die("Unable to connect to the database");
		
		/* 	LOCAL DB CONNECTION */
		$this->conn = @mysql_connect('localhost', 'root', '') OR die("Unable to connect to the database");
        
		mysql_select_db('nallai', $this->conn) OR die("can not select the database"); 
        return TRUE;
    }
    //used
	
	/* 	USERGROUP */
	
	public function save_usergroup($user){
		$name = $_POST['usergroup_name'];
		$qry = "INSERT INTO m_usergroup (
					`usergroup_name`,
					`status`,
					`created_by`,
					`created_dt`) 
				VALUES(
					'$name',
					'1',
					'$user',								
					now())";
		$result= mysql_query($qry);
		return $result;
	}
	//used
	
	public function fetch_usergroup($id,$status,$sel_role)
	{
		$cond ="";
		
		if(isset($status)){
			$status ="status = '1'";
		}else{
			$status ="status >= '1'";
		}
		
		if(isset($sel_role)){
			$cond ="AND usergroup_id > $sel_role";
		}
		
		if($id != ''){
			$cond="AND usergroup_id = $id ";
		}
		
		$qry="SELECT * FROM m_usergroup WHERE $status $cond";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	public function update_usergroup($id,$user) {
		$usergroup_name = $_POST["usergroup_name"];
		$qry = "UPDATE m_usergroup SET usergroup_name = '$usergroup_name', updated_by = '$user', updated_dt = now() WHERE usergroup_id='$id'";        
		$result = mysql_query($qry);
		if($result){
			$result = $this->update_access($id,$user);
		}
		return $result;
    }
	//used
	
	public function delete_usergroupByID($id){
		$qry="DELETE FROM m_usergroup WHERE usergroup_id='$id'";
		$result = mysql_query($qry);
		if($result){
			$result = $this->delete_accessByID($id);
		}
		return $result;
	}
	//used
	
	/* City */
	
	public function fetch_city($id,$did,$status)
	{
		$cond ="";
		
		if(isset($status)){
			$status ="c.status = '1'";
		}else{
			$status ="c.status >= '1'";
		}
		
		if($did != ''){
			$cond="AND c.district_id = $did ";
		}
		
		if($id != ''){
			$cond="AND c.city_id = $id ";
		}
		
		$qry="SELECT c.*,d.district_id,d.district_name FROM m_city c 
				INNER JOIN m_district d ON c.district_id = d.district_id
				WHERE $status AND c.status >= '1' $cond";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	public function fetch_pcity($id,$did,$status)
	{
		$cond ="";
		
		if(isset($status)){
			$status ="c.status = '1'";
		}else{
			$status ="c.status >= '1'";
		}
		
		if($did != ''){
			$cond="AND c.district_id = $did ";
		}
		
		if($id != ''){
			$cond="AND c.city_id = $id ";
		}
		
		$qry="SELECT c.*,d.district_id,d.district_name FROM m_city c 
				INNER JOIN m_district d ON c.district_id = d.district_id
				WHERE $status AND c.status >= '1' $cond";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	public function fetch_ccity($id,$did,$status)
	{
		$cond ="";
		
		if(isset($status)){
			$status ="c.status = '1'";
		}else{
			$status ="c.status >= '1'";
		}
		
		if($did != ''){
			$cond="AND c.district_id = $did ";
		}
		
		if($id != ''){
			$cond="AND c.city_id = $id ";
		}
		
		$qry="SELECT c.*,d.district_id,d.district_name FROM m_city c 
				INNER JOIN m_district d ON c.district_id = d.district_id
				WHERE $status AND c.status >= '1' $cond";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	/* USER */
	
	public function save_user($user){
		$user_mobile  	= $_POST['user_mobile'];
		$user_aadhar  	= $_POST['user_aadhar'];
		$user_name  	= $_POST['user_name'];
		$user_father  	= $_POST['user_father'];
		$user_mother  	= $_POST['user_mother'];
		$user_gender  	= $_POST['user_gender'];
		$user_marital_status    = $_POST['user_marital_status'];
		$user_spouse  	        = $_POST['user_spouse'];
		$user_no_of_dependant   = $_POST['user_no_of_dependant'];
		$user_per_address  	    = $_POST['user_per_address'];
		$user_place  	        = $_POST['user_place'];
		$user_per_state  	    = $_POST['user_per_state'];		
		$user_per_district  	= $_POST['user_per_district'];		
		$user_per_city  	    = $_POST['user_per_city'];
		$user_per_postcode  	= $_POST['user_per_postcode'];
		$user_residential  	    = $_POST['user_residential'];
		$user_years 	        = $_POST['user_years'];		
		$user_per_landmark  	= $_POST['user_per_landmark'];        
		$user_loan_amount  	= $_POST['user_loan_amount'];        
		$user_no_of_weeks  	= $_POST['user_no_of_weeks'];        
		$user_start_date  	= $_POST['user_start_date'];        
		$user_end_date  	= $_POST['user_end_date'];        
		$user_day  	    = $_POST['user_day'];        
		$user_session  	= $_POST['user_session'];        
		$qry = "INSERT INTO m_user (
					`user_mobile`,
					`user_aadhar`,
					`user_name`,
					`user_father`,
					`user_mother`,
					`user_gender`,
					`user_marital_status`,
					`user_spouse`,
					`user_no_of_dependant`,
					`user_per_address`,
					`user_place`,
					`user_per_state`,
					`user_per_district`,
					`user_per_city`,
					`user_per_postcode`,
					`user_residential`,
					`user_years`,
					`user_per_landmark`,
					`user_loan_amount`,
					`user_no_of_weeks`,
					`user_start_date`,
					`user_end_date`,
					`user_day`,
					`user_session`,
					`user_password`,
					`status`,
					`created_by`,
					`created_dt`)
				VALUES(
					'$user_mobile',
					'$user_aadhar',
					'$user_name',
					'$user_father',
					'$user_mother',
					'$user_gender',
					'$user_marital_status',
					'$user_spouse',
					'$user_no_of_dependant',
					'$user_per_address',
					'$user_place',
					'$user_per_state',
					'$user_per_district',
					'$user_per_city',
					'$user_per_postcode',
					'$user_residential',
					'$user_years',
					'$user_per_landmark',
					'$user_loan_amount',
					'$user_no_of_weeks',
					'$user_start_date',
					'$user_end_date',
					'$user_day',
					'$user_session',
					'$user_password',
					'1',
					'$user',
					now())";
		$result= mysql_query($qry);
		return $result;
	}
	//used
	
	public function fetch_user($id,$usergroup_name,$status,$usergroup_id,$mobile,$city)
	{
		$cond ="";
		
		if($status != ''){
			$status ="u.status = '$status'";
		}else{
			$status ="u.status >= '1'";
		}
		
		if($id != ''){
			$cond .="AND u.user_id = $id ";
		}
		
		if($mobile != ''){
			$cond .="AND u.user_mobile = $mobile";
		}
		
		if($city != ''){
			$cond .="AND u.user_per_city = $city";
		}
		
		if($usergroup_name != ''){
			$cond .="AND ug.usergroup_id = '$usergroup_name'";
		}

		if($usergroup_id != ''){
			$cond .="AND u.usergroup_id = '$usergroup_id' AND ug.status = '1'";
		}
		
		$qry= "SELECT u.*,mg.*,md.*,rs.*,ms.*,mp.*,mse.*,mda.* FROM m_user u
		        INNER JOIN m_gender mg ON u.user_gender = mg.gender_id 
				INNER JOIN m_district md ON u.user_per_district = md.district_id
				INNER JOIN m_residential_status rs ON u.user_residential = rs.residential_id				
				INNER JOIN m_marital_status ms ON u.user_marital_status = ms.marital_id				
				INNER JOIN m_place mp ON u.user_place = mp.loan_place_id				
				INNER JOIN m_day mda ON u.user_day = mda.day_id				
				INNER JOIN m_session mse ON u.user_session = mse.session_id				
				WHERE $status $cond ORDER BY u.user_id DESC";
		$result= mysql_query($qry);
		return $result;
	}
	//used
	
	public function fetch_guser($mobile,$city)
	{
		$qry= "SELECT u.*,mg.*,md.*,mn.*,ug.usergroup_name,rs.*,ms.*,ug.usergroup_prefix,idp.id_proof_name,adp.address_proof_name FROM m_user u 
		        INNER JOIN m_gender mg ON u.user_gender = mg.gender_id 
				INNER JOIN m_usergroup ug ON u.usergroup_id = ug.usergroup_id
				INNER JOIN m_district md ON u.user_per_district = md.district_id
				INNER JOIN m_city c ON u.user_per_city = c.city_id
				INNER JOIN m_nature_of_job mn ON u.work_nature_of_job = mn.nature_id
				INNER JOIN m_residential_status rs ON u.user_residential = rs.residential_id				
				INNER JOIN m_marital_status ms ON u.user_marital_status = ms.marital_id				
				INNER JOIN m_id_proof idp ON u.id_proof_id = idp.id_proof_id
				INNER JOIN m_address_proof adp ON u.address_proof_id = adp.address_proof_id				
				WHERE u.status = '2' AND u.user_mobile = '$mobile' AND u.user_per_city = '$city' AND u.usergroup_id = '2'";
		$result= mysql_query($qry);
		return $result;
	}
	//used
	
	public function fetch_loanuser($mobile)
	{
		$qry= "SELECT u.*,mg.*,md.*,mn.*,ug.usergroup_name,rs.*,ms.*,ug.usergroup_prefix,idp.id_proof_name,adp.address_proof_name FROM m_user u 
		        INNER JOIN m_gender mg ON u.user_gender = mg.gender_id 
				INNER JOIN m_usergroup ug ON u.usergroup_id = ug.usergroup_id
				INNER JOIN m_district md ON u.user_per_district = md.district_id
				INNER JOIN m_city c ON u.user_per_city = c.city_id
				INNER JOIN m_nature_of_job mn ON u.work_nature_of_job = mn.nature_id
				INNER JOIN m_residential_status rs ON u.user_residential = rs.residential_id				
				INNER JOIN m_marital_status ms ON u.user_marital_status = ms.marital_id				
				INNER JOIN m_id_proof idp ON u.id_proof_id = idp.id_proof_id
				INNER JOIN m_address_proof adp ON u.address_proof_id = adp.address_proof_id				
				WHERE u.status = '2' AND u.user_mobile = '$mobile' AND u.usergroup_id = '2'";
		$result= mysql_query($qry);
		return $result;
	}
	//used
	
	public function update_user($id,$user) {
		$user_mobile  	= $_POST['user_mobile'];
		$user_aadhar  	= $_POST['user_aadhar'];
		$user_name  	= $_POST['user_name'];
		$user_father  	= $_POST['user_father'];
		$user_mother  	= $_POST['user_mother'];
		$user_gender  	= $_POST['user_gender'];
		$user_marital_status    = $_POST['user_marital_status'];
		$user_spouse  	        = $_POST['user_spouse'];
		$user_no_of_dependant   = $_POST['user_no_of_dependant'];
		$user_per_address  	    = $_POST['user_per_address'];
		$user_place  	        = $_POST['user_place'];
		$user_per_state  	    = $_POST['user_per_state'];		
		$user_per_district  	= $_POST['user_per_district'];		
		$user_per_city  	    = $_POST['user_per_city'];
		$user_per_postcode  	= $_POST['user_per_postcode'];
		$user_residential  	    = $_POST['user_residential'];
		$user_years 	        = $_POST['user_years'];		
		$user_per_landmark  	= $_POST['user_per_landmark'];        
		$user_loan_amount  	= $_POST['user_loan_amount'];        
		$user_no_of_weeks  	= $_POST['user_no_of_weeks'];        
		$user_start_date  	= $_POST['user_start_date'];        
		$user_end_date  	= $_POST['user_end_date'];        
		$user_day  	= $_POST['user_day'];        
		$user_session  	= $_POST['user_session'];        
		$qry  = "UPDATE m_user SET 
					 user_mobile ='$user_mobile',
					 user_aadhar='$user_aadhar',
					 user_name='$user_name',
					 user_father='$user_father',
					 user_mother='$user_mother',
					 user_gender='$user_gender',
					 user_marital_status='$user_marital_status',
					 user_spouse='$user_spouse',
					 user_no_of_dependant='$user_no_of_dependant',
					 user_per_address='$user_per_address',
					 user_per_state='$user_per_state',
					 user_per_district='$user_per_district',
					 user_per_city='$user_per_city',
					 user_place='$user_place',
					 user_per_postcode='$user_per_postcode',
					 user_residential='$user_residential',
					 user_years='$user_years',
					 user_per_landmark='$user_per_landmark',
		             user_loan_amount ='$user_loan_amount',       
		             user_no_of_weeks  	= '$user_no_of_weeks';        
		             user_start_date  	= '$user_start_date';        
		             user_end_date  	= '$user_end_date';        
		             user_day  	= '$user_day';        
		             user_session  	= '$user_session';        
					 user_password='$user_password',
					 status='1',
					 updated_by = '$user', 
					 updated_dt = now() WHERE user_id='$id'";
		$result = mysql_query($qry);
		return $result;
    }
	//used
	
	public function delete_user($id){
		$qry="DELETE FROM m_user WHERE user_id='$id'";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	//Gender
	
	public function fetch_gender()
	{		
		$qry="SELECT * FROM m_gender";
		$result = mysql_query($qry);
		return $result;
	}	
	//used
	//DAY
	
	public function fetch_day()
	{		
		$qry="SELECT * FROM m_day";
		$result = mysql_query($qry);
		return $result;
	}	
	//used
	
	//Session
	
	public function fetch_session()
	{		
		$qry="SELECT * FROM m_session";
		$result = mysql_query($qry);
		return $result;
	}	
	//used

	//Place
	
	public function fetch_place()
	{		
		$qry="SELECT * FROM m_place";
		$result = mysql_query($qry);
		return $result;
	}	
	//used	

	//LOAD LOAN DATA
	
	public function load_loan_data()
	{
		$loan_day  	    = $_POST['loan_day'];
		$loan_session  	= $_POST['loan_session'];
		$loan_place  	= $_POST['loan_place'];     
		$qry="SELECT * FROM m_user where user_day = $loan_day and user_place = $loan_place and user_session = $loan_session";
		$result = mysql_query($qry);
		return $result;
	}	
	//used
	
	//Check Feasibility
	
	public function check_amountfeasibility($id)
	{	
		$qry="SELECT work_net_income FROM m_user where user_id=$id";
		$result = mysql_query($qry);
		return $result;
	}

	//District
	
	public function fetch_district($id)
	{		
		$qry="SELECT * FROM m_district WHERE district_id = $id ";
		$result = mysql_query($qry);
		return $result;
	}
	//used

	
	public function fetch_pdistrict()
	{		
		$qry="SELECT * FROM m_district";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	public function fetch_cdistrict()
	{		
		$qry="SELECT * FROM m_district";
		$result = mysql_query($qry);
		return $result;
	}
	//used

    //Nature Of Job
	public function fetch_nature()
	{		
		$qry="SELECT * FROM m_nature_of_job";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	

    //Resedential Status
	public function fetch_residential()
	{		
		$qry="SELECT * FROM m_residential_status";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
    //INTEREST TYPE
	public function fetch_interesttype()
	{		
		$qry="SELECT * FROM m_interesttype";
		$result = mysql_query($qry);
		return $result;
	}
	//used

    //Marital Status
	public function fetch_marital()
	{		
		$qry="SELECT * FROM m_marital_status";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
    /* Group */
	
	public function save_group($user){
		$group_name = $_POST['group_name'];
		$group_district = $_POST['hdn_district'];
		$group_city = $_POST['hdn_city'];		
		$leader_mobile = $_POST['hdn_leader'];		
		$member1_mobile = $_POST['hdn_member1'];		
		$member2_mobile = $_POST['hdn_member2'];		
		$members = array($leader_mobile, $member1_mobile, $member2_mobile);
		$cnt = 1;
		foreach ($members as $user_id) {
			if($cnt == '1'){
				$leader = "1";
			}else{
				$leader = "0";
			}
			$qry = "INSERT INTO m_group(
						`group_name`,
						`user_id`,
						`group_district`,
						`group_city`,
						`leader`,
						`status`,
						`created_by`, 
						`created_dt`) 
					VALUES(
						'$group_name',
						'$user_id',				
						'$group_district',
						'$group_city',
						'$leader',
						'1',
						'$user',
						now())";
			$result= mysql_query($qry);
			$cnt++;
		}
		return $result;
	}
	//used
	
	public function save_member($user){
		$group_name = $_POST['group_name'];
		$group_district = $_POST['user_per_district'];
		$group_city = $_POST['user_per_city'];		
		$user_id = $_POST['hdn_member1'];		
		$leader = "0";
		if($user_id != '' ){
			$qry = "INSERT INTO m_group(
						`group_name`,
						`user_id`,
						`group_district`,
						`group_city`,
						`leader`,
						`status`,
						`created_by`, 
						`created_dt`) 
					VALUES(
						'$group_name',
						'$user_id',				
						'$group_district',
						'$group_city',
						'$leader',
						'1',
						'$user',
						now())";
			$result= mysql_query($qry);
		}
		return $result;
	}
	//used

	public function fetch_group($id,$status)
	{
		$cond ="";
		
		if(isset($status)){
			$status ="g.status = '1'";
		}else{
			$status ="g.status >= '1'";
		}
		
		if($id != ''){
			$cond="AND g.group_id = $id ";
		}
		
		$qry="SELECT g.*,md.*,c.*,g.created_dt as date FROM m_group g 
			  INNER JOIN m_district md ON g.group_district = md.district_id
			  INNER JOIN m_city c ON g.group_city = c.city_id
			  WHERE $status $cond GROUP BY g.group_name";
		$result = mysql_query($qry);
		return $result;
	}
	//used

public function fetch_groupmember($id,$status,$name)
	{
		$cond ="";
		
		if(isset($status)){
			$status ="g.status = '1'";
		}else{
			$status ="g.status >= '1'";
		}
		
		if($id != ''){
			$cond="AND g.group_id = $id ";
		}
		
		if($name != ''){
			$cond="AND g.group_name = '$name' ";
		}
		
		$qry="SELECT g.*,md.*,c.*,g.created_dt as date FROM m_group g 
			  INNER JOIN m_district md ON g.group_district = md.district_id
			  INNER JOIN m_city c ON g.group_city = c.city_id
			  WHERE $status $cond";
		$result = mysql_query($qry);
		return $result;
	}
	//used	
	
	/* Check Aadhar */
	public function check_aadhar($aadhar)
	{
		$qry="SELECT * FROM m_user WHERE user_aadhar = '$aadhar'";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	/* Check PAN */
	public function check_pan($pan)
	{
		$qry="SELECT * FROM m_user WHERE user_pan = '$pan'";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	/* ADDRESS PROOF */
	public function fetch_address_proof($id,$status)
	{
		$cond ="";
		
		if(isset($status)){
			$status ="status = '1'";
		}else{
			$status ="status >= '1'";
		}
		
		if($id != ''){
			$cond="AND address_proof_id = $id ";
		}
		
		$qry="SELECT * FROM m_address_proof WHERE $status $cond";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	/* ID PROOF */
	public function fetch_id_proof($id,$status)
	{
		$cond ="";
		
		if(isset($status)){
			$status ="status = '1'";
		}else{
			$status ="status >= '1'";
		}
		
		if($id != ''){
			$cond="AND id_proof_id = $id ";
		}
		
		$qry="SELECT * FROM m_id_proof WHERE $status $cond";
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	
	/* DASHBOARD */
	
	public function dashboard_count() {
		$qry = "SELECT (SELECT count(*) FROM m_state s WHERE s.status='1') AS state,
				(SELECT count(*) FROM m_city c WHERE c.status='1') AS city,
				(SELECT count(*) FROM m_hospital h WHERE h.status='1') AS hospital,
				(SELECT count(*) FROM m_speciality sp WHERE sp.status='1') AS speciality,
				(SELECT count(*) FROM m_doctor d WHERE d.status='1') AS doctor";
		$result = mysql_query($qry);
		return $result;
    }
	//used
	
	/* ON/OFF STATUS */
	
	public function update_status($icol,$id,$ival,$itable,$user)
	{
		$qry = "UPDATE $itable SET status = $ival, updated_by = '$user', updated_dt = now() WHERE $icol ='$id'";        
		$result = mysql_query($qry);
		return $result;
	}
	//used
	
	public function generate_regid() {
		$qry = "SELECT * FROM m_user ORDER BY user_id DESC LIMIT 1";        
		$result = mysql_query($qry);
		$row = mysql_fetch_array($result);
		$username = "TTF".sprintf('%04u',($row['user_id']+1));
		return $username;
    }
	
	public function generate_groupid() {
		$qry = "SELECT * FROM m_group GROUP BY group_name ORDER BY group_name DESC LIMIT 1";        
		$result = mysql_query($qry);
		$row = mysql_fetch_array($result);
		$newstring = substr($row['group_name'], -4);
		$username = "TTFGRP".sprintf('%04u',($newstring+1));
		return $username;
    }
	
	/* USER CREDENTIALS */
	
	public function generate_userpassword() {
		$prefix = "On!5T@";
		$password = uniqid($prefix);
		return $password;
    }
	
	//used
	
	public function change_password($id) {
		$user_password = $_POST["password"];
		$qry = "UPDATE m_user SET user_password = '$user_password', updated_by = '$user', updated_dt = now() WHERE user_id='$id'";        
		$result = mysql_query($qry);
		return $result;
    }
	//used
	
	public function check_login()
	{
		$cond = "";
		$user_username = $_POST['user_username'];
		$user_password = $_POST['user_password'];
		$qry= "SELECT * FROM m_user u 
			   WHERE u.user_mobile='$user_username' AND u.user_password='$user_password'";
		$result= mysql_query($qry);
		return $result;
	}
	//used	
}
$functionObj = new functions();
?>