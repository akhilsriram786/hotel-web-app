<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM image, room WHERE image_room_id = room_id";
	$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?>
<script>
function delete_image(image_id)
{
	if(confirm("Do you want to delete the image?"))
	{
		this.document.frm_image.image_id.value=image_id;
		this.document.frm_image.act.value="delete_image";
		this.document.frm_image.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Room Image Reports</h4>
			<form name="frm_image" action="lib/image.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Image</td>
						<td scope="col">Room No.</td>
						<td scope="col">Title</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[image_name]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[room_name]?></td>
						<td><?=$data[image_title]?></td>
						<td style="text-align:center"><a href="image.php?image_id=<?php echo $data[image_id] ?>">Edit</a> | <a href="Javascript:delete_image(<?=$data[image_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="image_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 