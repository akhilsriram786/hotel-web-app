<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM user WHERE user_level_id = '$_REQUEST[type]'";
	$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
	if($_REQUEST['type'] == 1) $heading = "System User";
	if($_REQUEST['type'] == 2) $heading = "Customer";
	global $SERVER_PATH;
?>
<script>
function delete_user(user_id)
{
	if(confirm("Do you want to delete the user?"))
	{
		this.document.frm_user.user_id.value=user_id;
		this.document.frm_user.act.value="delete_user";
		this.document.frm_user.submit();
	}
}
</script>
	<script>
jQuery(document).ready(function() {
	jQuery('#mydatatable').DataTable();
});
</script>

<section id="subintro">
   <div class="jumbotron subhead" id="overview">
      <div class="container">
         <div class="row">
            <div class="span12">
               <div class="centered">
                  <h3><?=$heading?> Reports</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="maincontent">
   <div class="container">
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_user" action="lib/user.php" method="post">
				<div class="static">
					<table style="width:100%" id="mydatatable">
					 <thead>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Image</td>
						<td scope="col">Name</td>
						<td scope="col">Mobile</td>
						<td scope="col">Email</td>
						<td scope="col">Date Of Birth</td>
						<td scope="col">Action</td>
					  </tr>
						</thead>
						<tbody>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[user_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[user_name]?></td>
						<td><?=$data[user_mobile]?></td>
						<td><?=$data[user_email]?></td>
						<td><?=$data[user_dob]?></td>
						<td style="text-align:center"><a href="user.php?user_id=<?php echo $data[user_id] ?>" class="btn btn-success">Edit</a> | <a href="Javascript:delete_user(<?=$data[user_id]?>)" class="btn btn-danger">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="user_id" />
				</form>
   </div>
</section>
<?php include_once("includes/footer.php"); ?> 