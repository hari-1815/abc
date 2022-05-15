<?php 
	include('default_variables.php');
	$fetch_group=$functionObj->fetch_group('','1');	
	if(isset($_REQUEST['did'])){
		$delete=$functionObj->delete_user($_REQUEST['did']); 
		if(!$delete){
			$error = "error";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/stellar-admin/jquery/template/demo_1/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Apr 2021 18:26:00 GMT -->
<head>
    <?php include('includes/header_links.php');?>
</head>
<body>
    <div class="container-scroller">
		<?php include('includes/topmenubar.php'); ?>
		<div class="container-fluid page-body-wrapper">
			<?php include('includes/leftmenubar.php');?>        
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="page-header">
						<h3 class="page-title"> Manage Group </h3>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							  <li class="breadcrumb-item active" aria-current="page">Manage Group</li>
							</ol>
						</nav>
					</div>
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Your Result(s)</h4>
							<div class="row">
								<div class="col-12">
									<div class="table-responsive">
										<table id="order-listing" class="table" >
											<thead>
												<tr>
													<th>#</th>
													<th>Actions</th>						  
													<th>Group Name</th>
													<th>District</th>
													<th>City</th>
													<th>Created By</th>
													<th>Created Date</th>
													<th>Last Updated By</th>
													<th>Last Updated Date</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Actions</th>						  
													<th>Group Name</th>
													<th>District</th>
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
													if(mysql_num_rows($fetch_group) > 0){
													while($row = mysql_fetch_array($fetch_group)) { 
														$id = $row['group_id'];
														$fetch_createdby = $functionObj->fetch_user($row['created_by'],'','','','','');
														$cbrow = mysql_fetch_array($fetch_createdby); 
														$fetch_updatedby = $functionObj->fetch_user($row['updated_by'],'','','','','');
														$ubrow = mysql_fetch_array($fetch_updatedby);
												?>
												<tr>
													<td><?php echo htmlentities($cnt);?></td>
													<td>
														<a title="Edit"  href="add_groupmember.php?do=group&mode=manage&id=<?php echo $id; ?>"><i class="icon-pencil menu-icon"></i></a>
													</td>
													<td><?php echo $row['group_name'];?></td>
													<td><?php echo $row['district_name'];?></td>
													<td><?php echo $row['city_name'];?></td>
													<td><?php echo $cbrow['user_name'];?></td>
													<td><?php echo $row['date'];?></td>
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
    <?php include('includes/footer_links.php') ?>
</body>
<!-- Mirrored from www.bootstrapdash.com/demo/stellar-admin/jquery/template/demo_1/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Apr 2021 18:26:01 GMT -->
</html>