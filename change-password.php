<?php include_once("includes/header.php"); ?> 
<section id="subintro">
	<div class="jumbotron subhead" id="overview">
		<div class="container">
			<div class="row">
			<div class="span12">
				<div class="centered">
					<h3>Change Your Account Password</h3>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<section id="maincontent">
   <div class="container">
   		<fieldset>
            <legend>Change Your Account Password</legend>
					<div class='msg'><?=$_REQUEST['msg']?></div>
					<form action="lib/login.php" method="post" name="frm_car" class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="inputEmail">New Password</label> 
						<div class="controls"><input name="user_new_password" type="password" class="bar" required /></li>
						</div>
					</div>
						<div class="control-group">
						<label class="control-label" for="inputEmail">Confirm Password</label> 
						<div class="controls"><input name="user_confirm_password" type="password" class="bar" required /></li>
						</div>
					</div>
					<div class="control-group clear">
						<div class="controls">
							<button type="submit" class="btn btn-primary">Change Password</button> 
							<button type="reset" class="btn btn-primary">Reset Form</button>
						</div>
					</div>
						<input type="hidden" name="act" value="change_password">
						</form>
					</fieldset>
	</div>
</section>
<?php include_once("includes/footer.php"); ?> 