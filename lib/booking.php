<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_book")
	{
		save_book();
		exit;
	}
	if($_REQUEST[act]=="delete_book")
	{
		delete_book();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save book#####
	function save_book()
	{
		global $con;
		$R=$_REQUEST;
		
		/// Get the room details ///////
		$SQL = "SELECT * FROM room WHERE room_id = '$R[book_room_id]'";
		$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data = mysqli_fetch_assoc($rs);
		
		/// Date and amount calculation //////
		$dStart = new DateTime($R[book_from_date]);
	    $dEnd  = new DateTime($R[book_to_date]);
	    $dDiff = $dStart->diff($dEnd);
		$totalDays = $dDiff->days;
		$totalAmount = $totalDays * $R[book_no_rooms] * $data['room_fare'];
		
	    if($dDiff->format('%R') == "-")
		{
			die("From date should me smaller than current date.");
		}
		if($R[book_id])
		{
			$statement = "UPDATE `book` SET";
			$cond = "WHERE `book_id` = '$R[book_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `book` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`book_user_id` = '".$_SESSION['user_details']['user_id']."', 
				`book_date` = now(), 
				`book_room_id` = '$R[book_room_id]', 
				`book_from_date` = '$R[book_from_date]', 
				`book_to_date` = '$R[book_to_date]', 
				`book_no_rooms` = '$R[book_no_rooms]', 
				`book_no_persons` = '$R[book_no_persons]', 
				`book_no_childs` = '$R[book_no_childs]', 
				`book_name` = '$R[book_name]', 
				`book_mobile` = '$R[book_mobile]', 
				`book_email` = '$R[book_email]', 
				`book_total_amount` = '$totalAmount', 
				`book_status` = '0'".
				 $cond;
		$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
		if($R[book_id] == "") {
			$book_id = mysqli_insert_id($con);
		}
		header("Location:../make_payment.php?book_id=".$book_id);
	}
#########Function for delete book##########3
function delete_book()
{
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM book WHERE book_id = $_REQUEST[book_id]";
	 mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../book-report.php?msg=Deleted Successfully.");
}
##############Function for reporting ##################3
function get_report()
{
	global $con;
	$fname = 'myCSV.csv';
	$fp = fopen($fname,'w');
	$column_name = '"ID","book_name","book_add1","book_add2","book_state","book_email","book_city","book_mobile","book_gender","book_dob","book_nl_id","book_image"'."\n\r";
	fwrite($fp,$column_name);	
		
	$SQL="SELECT * FROM book,city WHERE book_city = city_id";
	$rs= mysqli_query($con,$SQL);
	while($data=mysqli_fetch_assoc($rs))
	{
		$csvdata=implode(",",$data)."\n\r";
		fwrite($fp,$csvdata);		
	}
	fclose($fp);
	header('Content-type: application/csv');
	header("Content-Disposition: inline; filename=".$fname);
	readfile($fname);
}
?>