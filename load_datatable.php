<?php
	include('includes/header_links.php');
	include('default_variables.php');
	$usergroup_id = $_POST['roleid'];
	$url_prefix = $_POST['url_prefix'];
	$fetch_user=$functionObj->fetch_user('','','',$usergroup_id,'','');
?>
<table id="order-listing" class="table" >
	<thead>
	  <tr>
		<th>#</th>
		<th>Actions</th>						  
		<th style="text-align:center;">Status</th>
		<th style="text-align:center;">Role</th>						  
		<th>Registration ID <?php echo $url_do; ?></th>
		<th>Name</th>
		<th>Father Name</th>
		<th>Date of Birth</th>
		<th>Marital Status</th>
		<th>No.of.Dependants</th>
		<th>Nature of Job</th>
		<th>Company Name</th>
		<th>Position</th>
		<?php if($url_prefix == "EMP"){ ?>	
		<th>Total Experiences</th>
		<?php } ?>
		<th>Net Salary</th>
		<th>Net Income</th>
		<?php if($url_prefix == "GNR"){ ?>
		<th>Guaranteed at TTF</th>
		<th>Guaranteed outside TTF</th>
		<?php } ?>
		<th>Mobile Number</th>
		<th>Aadhar Number</th>
		<th>City</th>
		<th>Created By</th>
		<th>Created Date</th>
		<th>Last Updated By</th>
		<th>Last Updated Date</th>
	  </tr>
	</thead>
	<tfoot>
		<th>#</th>
		<th>Actions</th>						  
		<th style="text-align:center;">Status</th>
		<th style="text-align:center;">Role</th>
		<th>Registration ID</th>
		<th>Name</th>
		<th>Father Name</th>
		<th>Date of Birth</th>
		<th>Marital Status</th>
		<th>No.of.Dependants</th>
		<th>Nature of Job</th>
		<th>Company Name</th>
		<th>Position</th>
		<?php if($url_prefix == "EMP"){ ?>	
		<th>Total Experiences</th>
		<?php } ?>
		<th>Net Salary</th>
		<th>Net Income</th>
		<?php if($url_prefix == "GNR"){ ?>
		<th>Guaranteed at TTF</th>
		<th>Guaranteed outside TTF</th>
		<?php } ?>
		<th>Mobile Number</th>
		<th>Aadhar Number</th>
		<th>City</th>
		<th>Created By</th>
		<th>Created Date</th>
		<th>Last Updated By</th>
		<th>Last Updated Date</th>
	</tr>
	</tfoot>
	<tbody>
		<?php
			$cnt = 1;
			if(mysql_num_rows($fetch_user) > 0){
			while($row = mysql_fetch_array($fetch_user)) { 
				$id = $row['user_id'];
				$fetch_createdby = $functionObj->fetch_user($row['created_by']);
				$cbrow = mysql_fetch_array($fetch_createdby); 
				$fetch_updatedby = $functionObj->fetch_user($row['updated_by']);
				$ubrow = mysql_fetch_array($fetch_updatedby);
		?>
		<tr>
			<td><?php echo htmlentities($cnt);?></td>
			<?php include('includes/action_row.php'); ?>
			<?php include('includes/status.php'); ?>
			<td><?php echo $row['usergroup_name'];?></td>
			<td><?php echo $row['user_registration_id'];?></td>
			<td><?php echo $row['user_name'];?></td>
			<td><?php echo $row['user_father'];?></td>
			<td><?php echo $row['user_dob'];?></td>											
			<td><?php echo $row['marital_name'];?></td>
			<td><?php echo $row['user_no_of_dependant'];?></td>
			<td><?php echo $row['nature_name'];?></td>
			<td><?php echo $row['work_company_name'];?></td>											
			<td><?php echo $row['work_position'];?></td>
	        <?php if($url_prefix == "EMP"){ ?>
			<td><?php echo $row['work_total_experience'];?></td>
	        <?php } ?>						
			<td><?php echo $row['work_netsalary'];?></td>											
			<td><?php echo $row['work_net_income'];?></td>
	        <?php if($url_prefix == "GNR"){ ?>
			<td><?php echo $row['loans_ttf'];?></td>											
			<td><?php echo $row['loans_ottf'];?></td>
	        <?php } ?>			
			<td><?php echo $row['user_mobile'];?></td>											
			<td><?php echo $row['user_aadhar'];?></td>											
			<td><?php echo $row['city_name'];?></td>											
			<td><?php echo $cbrow['user_name'];?></td>
			<td><?php echo $row['created_dt'];?></td>
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
<?php include('includes/footer_links.php') ?>