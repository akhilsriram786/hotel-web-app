<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[car_id])
	{
		$SQL="SELECT * FROM car WHERE car_id = $_REQUEST[car_id]";
		$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
	<section id="subintro">
   <div class="jumbotron subhead" id="overview">
      <div class="container">
         <div class="row">
            <div class="span12">
               <div class="centered">
                  <h3>Login to Your Account</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="maincontent">
   <div class="container">
      <fieldset>
         <legend>Login to Your Account</legend>
         <?php if($_REQUEST['msg']) { ?>
         <div class="alert alert-danger"><?=$_REQUEST['msg']?></div>
         <?php } ?>
         <form action="lib/login.php" method="post" name="frm_car" class="form-horizontal">
            <div class="control-group">
               <label class="control-label" for="inputEmail">Username</label> 
               <div class="controls"><input name="user_user" type="text" class="bar" required />
               </div>
            </div>
            <div class="control-group">
               <label class="control-label" for="inputEmail">Password</label> 
               <div class="controls"><input name="user_password" type="password" class="bar" required />
               </div>
            </div>
            <div class="controls">
               <a href='user.php' style="color:#790101; font-weight:bold;">Click here for register</a>
            </div>
            <div class="clear"></div>
            <div class="control-group clear">
               <div class="controls">
                  <button type="submit" class="btn btn-primary">Login to Account</button> 
                  <button type="reset" class="btn btn-primary">Reset Form</button>
               </div>
            </div>
            <input type="hidden" name="act" value="check_login">
         </form>
      </fieldset>
   </div>
</section>
<?php include_once("includes/footer.php"); ?> 