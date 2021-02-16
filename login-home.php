<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[car_id])
	{
		$SQL="SELECT * FROM car WHERE car_id = $_REQUEST[car_id]";
		$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
					<h4 class="heading colr">ID Card Administration Page</h4>
					<div class='msg'><?=$_REQUEST['msg']?></div>
					<ul class='login-home-listing'>
						<li><a href="citizens-report.php">Citizen Report</a></li>
						<li><a href="citizens.php">Add Citizen</a></li>
						<li><a href="village-report.php">Village Report</a></li>
						<li><a href="village.php">Add Village</a></li>
						<li><a href="user.php">User Report</a></li>
						<li><a href="user-report.php">Add User</a></li>
						<li><a href="./user.php?user_id=<?php echo $_SESSION['user_details']['user_id']; ?>">My Account</a></li>
						<li><a href="change-password.php">Change Password</a></li>
						<li><a href="/lib/login.php?act=logout">Logout</a></li>
					</ul>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 