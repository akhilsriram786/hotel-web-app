<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[room_id])
	{
		$SQL="SELECT * FROM room,category WHERE room_category_id = category_id AND room_id = $_REQUEST[room_id]";
		$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
	$R = $_REQUEST;
	$userData = $_SESSION['user_details'];
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
td{
	padding:5px;
	text-align:center;
	boder:1px solid;
	margin:1px;
	border:1px solid #101746;
}
th {
	font-weight:bold;
	color:#ffffff;
	font-size:12px;
	background-color:#94c045;
	border:1px solid #FFFFFF;
	padding:5px;
}
</style>
<section id="subintro">
<div class="jumbotron subhead" id="overview">
	<div class="container">
		<div class="row">
		<div class="span12">
			<div class="centered">
				<h3>Selected Room Details</h3>
			</div>
		</div>
		</div>
	</div>
</div>
</section>
<section id="maincontent">
   <div class="container">
   		<fieldset>
            	<legend>Book Your Room (Review Your Booking Details)</legend>
				<div class="featured_news">
					<div class="thumb" style="float:left; padding:8px"><span class="featured">&nbsp;</span><a href="#"><img src="<?=$SERVER_PATH.'uploads/'.$data[room_image]?>" alt="" style="width:149px; height:149px" /></a></div>
					<div class="cont">						
						<table style="border:1px solid; width:50%; float:left; padding:40px:">
							<tr>
								<th>Price Per Day</th>
								<td><?=$data[room_fare]?>/-</td>
							</tr>
							<tr>
								<th>Room Type</th>
								<td><?=$data[category_name]?></td>
							</tr>
							<tr>
								<th>Max Adults</th>
								<td><?=$data[room_max_adult]?></td>
							</tr>
							<tr>
								<th>Max Childs</th>
								<td><?=$data[room_max_child]?></td>
							</tr>
							<tr>
								<th>Number of Beds</th>
								<td><?=$data[room_no_of_beds]?></td>
							</tr>
						</table>
				</fieldset>
				<fieldset>
            	<legend>Book Your Room (Review Your Booking Details)</legend>
				<form action="lib/booking.php" enctype="multipart/form-data" method="post" name="frm_room" class="form-horizontal my-forms">
				<div class="control-group">
						<label class="control-label" for="inputEmail">From Date</label> 
						<div class="controls"><input name="book_from_date" id="book_from_date" type="text" class="bar" value="<?=$R['book_from_date']?>" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">To Date</label> 
						<div class="controls"><input name="book_to_date" id="book_to_date" type="text" class="bar" value="<?=$R['book_to_date']?>" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">No. Of Rooms</label> 
						<div class="controls"><input name="book_no_rooms" id="book_no_rooms" type="text" class="bar" value="<?=$R['book_no_rooms']?>" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">No. Of Person</label> 
						<div class="controls"><input name="book_no_persons" id="book_no_persons" type="text" class="bar" value="<?=$R['book_no_persons']?>" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">No. Of Child</label> 
						<div class="controls"><input name="book_no_childs" id="book_no_childs" type="text" class="bar" value="<?=$R['book_no_childs']?>" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">User Name</label> 
						<div class="controls"><input name="book_name" type="text" class="bar" value="<?=$userData['user_name']?>" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Mobile</label> 
						<div class="controls"><input name="book_mobile" type="text" class="bar" required  value="<?=$userData['user_mobile']?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Email</label> 
						<div class="controls"><input name="book_email" type="text" class="bar" required value="<?=$userData['user_email']?>"/>
						</div>
					</div>
					<div class="clear"></div>
					<div class="control-group clear">
						<div class="controls">
							<button type="submit" class="btn btn-primary">Book My Room</button> 
							<button type="reset" class="btn btn-primary">Reset Form</button>
						</div>
					</div>
					<input type="hidden" name="book_room_id" value="<?=$R[room_id]?>">
					<input type="hidden" name="act" value="save_book">
				</form>
			</div>
		</div>
		</div>
</section>
<?php include_once("includes/footer.php"); ?> 