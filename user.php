<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[user_id])
	{
		$SQL="SELECT * FROM user WHERE user_id = $_REQUEST[user_id]";
		$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
	if($_REQUEST['type'])
	{
		$data[user_level_id] = $_REQUEST['type'];
	}
	if($data['user_level_id'] == 1) $heading = "System User";
	if($data['user_level_id'] == 2) $heading = "Customer";
?> 
<script>

jQuery(function() {
	jQuery( "#user_dob" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-65:-10",
	   dateFormat: 'd MM,yy'
	});
	jQuery('#frm_user').validate({
		rules: {
			user_confirm_password: {
				equalTo: '#user_password'
			}
		}
	});
});
function validateForm(obj) {
	if(validateEmail(obj.user_email.value))
		return true;
	jQuery('#error-msg').show();
	return false;
}
</script>
<section id="subintro">
	<div class="jumbotron subhead" id="overview">
		<div class="container">
			<div class="row">
			<div class="span12">
				<div class="centered">
					<h3><?=$heading?> Registration Form</h3>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<section id="maincontent">
   <div class="container">
   		<fieldset>
            <legend><?=$heading?> Registration Form</legend>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div class="msg" style="display:none" id="error-msg">Enter valid EmailID !!!</div>
				<form action="lib/user.php" enctype="multipart/form-data" method="post" name="frm_user" onsubmit="return validateForm(this)" class="form-horizontal my-forms">
					<div class="control-group">
						<label class="control-label" for="inputEmail">User Full Name</label> 
						<div class="controls">
							<input name="user_name" type="text" class="bar" required value="<?=$data[user_name]?>"/>
						</div>
					</div>
					<?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
						<div class="control-group">
							<label class="control-label" for="inputEmail">User Role</label> 
							<div class="controls">
								<select name="user_level_id" id="user_level_id" class="bar" required/>
									<?php echo get_new_optionlist("role","role_id","role_name",$data[user_level_id]); ?>
								</select>
							</div>
						</div>
					<?php } if(!(isset($_REQUEST['user_id'])) || $_REQUEST['user_id'] == "")  { ?>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Username</label> 
							<div class="controls">
								<input name="user_username" type="text" class="bar" required value="<?=$data[user_username]?>"/>
							</div>
						</div>
					
						<div class="control-group">
							<label class="control-label" for="inputEmail">User Password</label> 
							<div class="controls">
								<input name="user_password" id="user_password" type="password" class="bar" required value="<?=$data[user_password]?>"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Confirm Password</label> 
							<div class="controls">
								<input name="user_confirm_password" id="user_confirm_password" type="password" class="bar" required value="<?=$data[user_password]?>"/>
							</div>
						</div>
					<?php } ?>
					<div class="control-group">
							<label class="control-label" for="inputEmail">User Mobile</label> 
							<div class="controls">
							<input name="user_mobile" type="text" class="bar" required value="<?=$data[user_mobile]?>"/>
							</div>
					</div>
					<div class="control-group">
							<label class="control-label" for="inputEmail">User Email ID</label> 
							<div class="controls"><input name="user_email" id="user_email" type="text" class="bar" required value="<?=$data[user_email]?>" onchange="validateEmail(this)" /></div>
					</div>
					<div class="control-group">
							<label class="control-label" for="inputEmail">Date of Birth</label> 
							<div class="controls"><input name="user_dob" id="user_dob" type="text" class="bar" required value="<?=$data[user_dob]?>"/>
							</div>
					</div>
					<div class="control-group">
							<label class="control-label" for="inputEmail">Address Line 1</label> 
							<div class="controls"><input name="user_add1" type="text" class="bar" required value="<?=$data[user_add1]?>"/>
					</div>
					</div>
					<div class="control-group">
							<label class="control-label" for="inputEmail">Address Line 2</label> 
							<div class="controls"><input name="user_add2" type="text" class="bar" required value="<?=$data[user_add2]?>"/>
							</div>
					</div>
					<div class="control-group">
							<label class="control-label" for="inputEmail">User City</label> 
							<div class="controls">
							<select name="user_city" class="bar" required/>
								<?php echo get_new_optionlist("city","city_id","city_name",$data[user_city]); ?>
							</select>
							</div>
					</div>
					<div class="control-group">
							<label class="control-label" for="inputEmail">User State</label> 
							<div class="controls">
							<select name="user_state" class="bar" required/>
								<?php echo get_new_optionlist("state","state_id","state_name",$data[user_state]); ?>
							</select>
							</div>
					</div>
					<div class="control-group">
							<label class="control-label" for="inputEmail">User Country</label> 
							<div class="controls">
							<select name="user_country" class="bar" required/>
								<?php echo get_new_optionlist("country","country_id","country_name",$data[user_country]); ?>
							</select>
							</div>
					</div>
					<div class="control-group">
							<label class="control-label" for="inputEmail">User Image</label> 
							<div class="controls">
						<input name="user_image" type="file" class="bar"/>
						</div>
					</div>
					<div class="clear"></div>
					<div class="control-group clear">
						<div class="controls"><button type="submit" class="btn btn-primary">Save User</button> </div>
					</div>
					<input type="hidden" name="act" value="save_user">
					<input type="hidden" name="avail_image" value="<?=$data[user_image]?>">
					<input type="hidden" name="user_id" value="<?=$data[user_id]?>">
					</fieldset>
				</form>
				</fieldset>
	</div>
</section>
<?php
	if($_SESSION['user_details']['user_level_id'] != 1)
	{
?>
	<script>
		jQuery( "#user_level_id" ).val(3);
		jQuery( "#user_level" ).hide();
	</script>
<?php		
	}
?>
<?php include_once("includes/footer.php"); ?> 