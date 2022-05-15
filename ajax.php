<?php
session_start();
require_once 'functions.class.php';
$mobile=$_POST["mobile"];
$aadhar=$_POST["aadhar"];
$pan=$_POST["pan"];
$id = $_POST['id'];
$ival = $_POST['ival'];
$icol = $_POST['icol'];
$itable = $_POST['itable'];
$user = $_SESSION['user_id'];
$per_district_id = $_POST['per_district_id'];
$cur_district_id = $_POST['cur_district_id'];
$grp_member = $_POST['grp_member'];
$grp_city = $_POST['grp_city'];
$loan_userid = $_POST['loan_userid'];
$monthly_due = $_POST['monthly_due'];
if($per_district_id != '') {
	$fetch_city	= $functionObj->fetch_city('',$per_district_id,'1'); 
	$result = "<label class='col-sm-3 col-form-label'>City</label>
			   <div class='col-sm-9'>
					<select class='form-control' id='user_per_city' name='user_per_city'>
						<option value=''>Select City</option>";
	while($crow = mysql_fetch_array($fetch_city)) { 
		$city_id = $crow['city_id'];
		$city_name = $crow['city_name'];
		$result .= "<option value='$city_id'>$city_name</option>";
	} 
	$result .= "</select></div>";
	echo $result;
}

if($cur_district_id != '') {
	$fetch_city	= $functionObj->fetch_city('',$cur_district_id,'1'); 
	$result = "<label class='col-sm-3 col-form-label'>City</label>
			   <div class='col-sm-9'>
					<select class='form-control' id='user_cur_city' name='user_cur_city'>
						<option value=''>Select City</option>";
	while($crow = mysql_fetch_array($fetch_city)) { 
		$city_id = $crow['city_id'];
		$city_name = $crow['city_name'];
		$result .= "<option value='$city_id'>$city_name</option>";
	} 
	$result .= "</select></div>";
	echo $result;
}

if($mobile != '') {
	$check_existance	= $functionObj->fetch_user('','','','',$mobile,''); 
	$row = mysql_fetch_array($check_existance);
	if(mysql_num_rows($check_existance) == 1){
		$user_id = $row['user_id'];
		echo json_encode(array('res'=>1,'user_id'=>$user_id));
	}
	else{
		echo json_encode(array('res'=>0));
	}
}

if($aadhar != '') {
	$check_aadhar	= $functionObj->check_aadhar($aadhar); 
	$row = mysql_fetch_array($check_aadhar);
	if(mysql_num_rows($check_aadhar) == 1){
		echo json_encode(array('res'=>1));
	}
	else{
		echo json_encode(array('res'=>0));
	}
}


if($pan != '') {
	$check_pan	= $functionObj->check_pan($pan); 
	$row = mysql_fetch_array($check_pan);
	if(mysql_num_rows($check_pan) == 1){
		echo json_encode(array('res'=>1));
	}
	else{
		echo json_encode(array('res'=>0));
	}
}

if($grp_city != '') {
	$check_existance	= $functionObj->fetch_guser($grp_member,$grp_city); 
	$row = mysql_fetch_array($check_existance);
	if(mysql_num_rows($check_existance) == 1){
		$user_id = $row['user_id'];
		echo json_encode(array('res'=>1,'user_id'=>$user_id));
	}
	else{
		echo json_encode(array('res'=>0));
	}
}

if(isset($ival)) {
	$update_status	= $functionObj->update_status($icol,$id,$ival,$itable,$user); 
	if($update_status){
		echo json_encode(array('res'=>1));
	}
	else{
		echo json_encode(array('res'=>0));
	}
}

if(isset($loan_userid)) {
	$check_amountfeasibility = $functionObj->check_amountfeasibility($loan_userid); 
	$lrow = mysql_fetch_array($check_amountfeasibility);
	$netincome = $lrow['work_net_income'];
	if($monthly_due < $netincome){
		echo "1";
	}
	else{
		echo "0";
	}
			

}
?>