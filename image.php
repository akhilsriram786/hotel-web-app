<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[image_id])
	{
		$SQL="SELECT * FROM `image` WHERE image_id = $_REQUEST[image_id]";
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
				<h4 class="heading colr">Add Room Image</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/image.php" enctype="multipart/form-data" method="post" name="frm_image">
					<ul class="forms">
						<li class="txt">Select Room</li>
						<li class="inputfield">
							<select name="image_room_id" class="bar" required/>
								<?php echo get_new_optionlist("room","room_id","room_name",$data[image_room_id]); ?>
							</select>
						</li>					
					</ul>
					<ul class="forms">
						<li class="txt">Image Title</li>
						<li class="inputfield"><input name="image_title" id="image_title" type="text" class="bar" required value="<?=$data[image_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Select Image</li>
						<li class="inputfield"><input name="image_name" id="image_name" type="file" class="bar"/></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_image">
					<input type="hidden" name="avail_image" value="<?=$data[image_name]?>">
					<input type="hidden" name="image_id" value="<?=$data[image_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 