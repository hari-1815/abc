<?php 
	include('includes/header_links.php');
	include('default_variables.php');
	$usergroup_id = $_POST['roleid'];
	$fetch_user=$functionObj->fetch_user('','','',$usergroup_id,'','');
?>
<table id="order-listing" class="table" >
	<thead>
		<tr>
		    <th>S.NO</th>
		    <th>Actions</th>						  			
		    <th>No.Weeks</th>						  			
		    <th>Date</th>
		    <th>Name</th>
		    <th>Loan Amount</th>
		    <th>Received Amount</th>
		    <th>Balance Amount</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
		    <th>S.NO</th>
		    <th>Actions</th>						  			
		    <th>No.Weeks</th>						  			
		    <th>Date</th>
		    <th>Name</th>
		    <th>Loan Amount</th>
		    <th>Received Amount</th>
		    <th>Balance Amount</th>
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
			<td><input type="number"></td>
			<td><input type="Date"</td>
			<td><?php echo $row['user_name'];?></td>
			<td><?php echo $row['user_loan_amount'];?></td>
			<td></td>
			<td></td>
		</tr>
		<?php $cnt++; } } else {?>
		<tr>
			<td colspan="6">No Records Found.</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php include('includes/footer_links.php') ?>
