<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[room_id])
	{
		$SQL="SELECT * FROM `room` WHERE room_id = $_REQUEST[room_id]";
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
					<h3>Room Entry Form</h3>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<section id="maincontent">
   <div class="container">
   		<fieldset>
            <legend>Room Entry Form</legend>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/room.php" enctype="multipart/form-data" method="post" name="frm_room" class="form-horizontal my-forms">
				<div class="control-group">
						<label class="control-label" for="inputEmail">Select Room Type</label> 
						<div class="controls">
							<select name="room_category_id" class="bar" required/>
								<?php echo get_new_optionlist("category","category_id","category_name",$data[room_category_id]); ?>
							</select>
							</div>
					</div>					
					<div class="control-group">
						<label class="control-label" for="inputEmail">Room Title</label> 
						<div class="controls">
							<input name="room_title" id="room_title" type="text" class="bar" required value="<?=$data[room_title]?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Room Name</label> 
						<div class="controls">
							<input name="room_name" id="room_name" type="text" class="bar" required value="<?=$data[room_name]?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Room No. Beds</label> 
						<div class="controls"><input name="room_no_of_beds" id="room_no_of_beds" type="text" class="bar" required value="<?=$data[room_no_of_beds]?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Max Adults</label> 
						<div class="controls"><input name="room_max_adult" id="room_max_adult" type="text" class="bar" required value="<?=$data[room_max_adult]?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Max Childs</label> 
						<div class="controls"><input name="room_max_child" id="room_max_child" type="text" class="bar" required value="<?=$data[room_max_child]?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Room Fare</label> 
						<div class="controls">
					<input name="room_fare" id="room_fare" type="text" class="bar" required value="<?=$data[room_fare]?>"/>
					</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Room Image</label> 
						<div class="controls"><input name="room_image" type="file" class="bar"/>
						</div>
					</div>					
					<div class="control-group">
						<label class="control-label" for="inputEmail">Room Description</label> 
						<div class="controls"><textarea name="room_description" cols="" rows="6" required><?=$data[room_description]?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Select Room Facility</label> 
						<div class="controls" style="height:150px; overflow:scroll; width:250px;">
							<?php echo get_checkbox("room_facility_id","facility","facility_id","facility_name",$data[room_facility_id]); ?>
						</div>
					</div>
					<div class="clear"></div>
					<div class="control-group clear">
						<div class="controls">
							<button type="submit" class="btn btn-primary">Save Room</button> 
							<button type="reset" class="btn btn-primary">Reset Form</button>
						</div>
					</div>
					<input type="hidden" name="act" value="save_room">
					<input type="hidden" name="avail_image" value="<?=$data[room_image]?>">
					<input type="hidden" name="room_id" value="<?=$data[room_id]?>">
					</form>
					</fieldset>
	</div>
</section>
<?php include_once("includes/footer.php"); ?> 