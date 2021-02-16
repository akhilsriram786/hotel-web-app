<?php 
	ob_start();
	include_once("includes/header.php"); 

	if($_SESSION['login'] == 0 || $_SESSION['login']  == null || !isset($_SESSION['login'])) {
		header("Location:login.php?msg=Login first to book your room !!!");
	} 
	$R = $_REQUEST;
	if(isset($R['book_from_date'])) {
		$SQL="SELECT * FROM room,category where room_category_id = category_id";
		$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
	}
	global $SERVER_PATH;
?> 
<script>
  jQuery(function() {
    jQuery( "#book_from_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
       yearRange: "-0:+1",
       dateFormat: 'yy-mm-dd'
    });
	jQuery( "#book_to_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
       yearRange: "-0:+1",
       dateFormat: 'yy-mm-dd'
    });
  });
</script>
<style>
.room-title {
	font-weight:bold;
	text-decoration:underline;
	margin-bottom:10px;
}
p {
	margin:0 0 10px;
}
</style>
<section id="subintro">
<div class="jumbotron subhead" id="overview">
	<div class="container">
		<div class="row">
		<div class="span12">
			<div class="centered">
				<h3>Search Room</h3>
			</div>
		</div>
		</div>
	</div>
</div>
</section>
<section id="maincontent">
   <div class="container">
   		<fieldset>
            <legend>Search Room</legend>
				<form action="book_room.php" enctype="multipart/form-data" method="post" name="frm_room" class="form-horizontal my-forms">
					<div class="control-group">
						<label class="control-label" for="inputEmail">From Date</label> 
						<div class="controls">
							<input name="book_from_date" id="book_from_date" type="text" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">To Date</label> 
						<div class="controls"><input name="book_to_date" id="book_to_date" type="text" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">No Of Persons</label> 
						<div class="controls"><input name="book_no_persons" id="drop_off" type="text" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">No. Of Clids</label> 
						<div class="controls"><input name="book_no_childs" id="drop_off" type="text" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">No Of Rooms</label> 
						<div class="controls"><input name="book_no_rooms" id="drop_off" type="text" required/>
						</div>
					</div>
					<div class="clear"></div>
					<div class="control-group clear">
						<div class="controls">
							<button type="submit" class="btn btn-primary">Search Room</button> 
							<button type="reset" class="btn btn-primary">Reset Form</button>
						</div>
					</div>
					<input type="hidden" name="act" value="save_room">
					<input type="hidden" name="room_id" value="<?=$data[room_id]?>">
				</form>
				</fieldset>
			<?php if($_REQUEST['book_from_date']) { ?>
				<fieldset>
            <legend>Select Your Room</legend>
				<?php
					while($data = mysqli_fetch_assoc($rs))
					{
				?>
					<table style="width:70%; border-bottom:1px solid #CCCCCC">
						<tr>
							<td><img src="<?=$SERVER_PATH.'uploads/'.$data[room_image]?>" alt="" style="width:92px; height:78px"/></td>
							<td>
								<div class="conts">
									<a href="#" class="room-title"><?=$data[room_title]?></a>
									<p>Room Type : <?=$data[category_name]?></p>
									<p class="bold">Max Adults : <?=$data[room_max_adult]?></p>
									<p class="bold">Max Childs : <?=$data[room_max_child]?></p>
								</div>
							</td>
							<td>
							<div style="float:right; padding:20px 57px 20px 100px; border-left:1px solid #cccccc">
								<a href="booking_details.php?room_id=<?=$data[room_id]?>&book_from_date=<?=$_REQUEST['book_from_date'];?>&book_to_date=<?=$_REQUEST['book_to_date'];?>&book_no_rooms=<?=$_REQUEST['book_no_rooms'];?>&book_no_persons=<?=$_REQUEST['book_no_persons'];?>&book_no_childs=<?=$_REQUEST['book_no_childs'];?>" class="btn btn-success">Book The Room Now</a>
							</div>
							</td>
						</tr>
					</table>
					<?php } ?>
				<div class="clear"></div>
			</div>
			<?php } ?>
	</div>
</section>
<?php include_once("includes/footer.php"); ?> 