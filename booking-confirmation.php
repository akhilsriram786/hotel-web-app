<?php 
	include_once("includes/header.php"); 
	
	/// Update the booking status /////
	$SQL = "UPDATE book SET book_status = 1 WHERE book_id = '$_REQUEST[book_id]'";
	$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
	
	/// Get the booking details /////
	$SQL = "SELECT * FROM book,room,category WHERE room_category_id = category_id AND book_room_id = room_id AND book_id = '$_REQUEST[book_id]'";
	$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
	$data = mysqli_fetch_assoc($rs);	
?> 
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
				<h3>Hotel Booking Receipt (Your booking was successfull !!!)</h3>
			</div>
		</div>
		</div>
	</div>
</div>
</section>
<section id="maincontent">
   <div class="container">
   		<fieldset>
            <legend>Hotel Booking Receipt (Your booking was successfull !!!)</legend>
				<table style="border:1px solid; width:60%">
							<tr>
								<th style="width:50%">Booking Refrence ID</th>
								<td>10000<?=$data[book_id]?></td>
							</tr>
							<tr>
								<th>Booking Date</th>
								<td><?=$data[book_date]?></td>
							</tr>
							<tr>
								<th>Name</th>
								<td><?=$data[book_name]?></td>
							</tr>
							<tr>
								<th>Mobile</th>
								<td><?=$data[book_mobile]?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?=$data[book_email]?></td>
							</tr>
							<tr>
								<th>From Date</th>
								<td><?=$data[book_from_date]?></td>
							</tr>
							<tr>
								<th>To Date</th>
								<td><?=$data[book_to_date]?></td>
							</tr>
							<tr>
								<th>Number of Rooms</th>
								<td><?=$data[book_no_rooms]?> Rooms</td>
							</tr>
							<tr>
								<th>Total Number of Adults</th>
								<td><?=$data[book_no_persons]?> Adults</td>
							</tr>
							<tr>
								<th>Total Number of Childs</th>
								<td><?=$data[book_no_childs]?> Children</td>
							</tr>
							<tr>
								<th>Total Amount Paid</th>
								<td><?=$data[book_total_amount]?>/-</td>
							</tr>
						</table>
						<div class="control-group clear" style="margin-top:20px;">
							<div class="controls">
								<button type="button" class="btn btn-primary">Print</button> 
							</div>
						</div>
						</div>
</section>
<?php include_once("includes/footer.php"); ?> 