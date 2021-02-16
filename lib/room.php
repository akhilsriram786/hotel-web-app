<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_room")
	{
		save_room();
		exit;
	}
	if($_REQUEST[act]=="delete_room")
	{
		delete_room();
		exit;
	}
	
	###Code for save room#####
	function save_room()
	{
		global $con;
		$R=$_REQUEST;
		$image_name = $_FILES[room_image][name];
		$location = $_FILES[room_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		$facility_id = implode(",",$R['room_facility_id']);
		if($R[room_id])
		{
			$statement = "UPDATE `room` SET";
			$cond = "WHERE `room_id` = '$R[room_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `room` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		
		$SQL=   $statement." 
				`room_category_id` = '$R[room_category_id]', 
				`room_title` = '$R[room_title]',
				`room_facility_id` = '$facility_id', 
				`room_name` = '$R[room_name]',
				`room_no_of_beds` = '$R[room_no_of_beds]',				
				`room_max_adult` = '$R[room_max_adult]',
				`room_max_child` = '$R[room_max_child]',
				`room_fare` = '$R[room_fare]',
				`room_image` = '$image_name',
				`room_description` = '$R[room_description]'". 
				 $cond;
		$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../room-report.php?msg=$msg");
	}
#########Function for delete room##########3
function delete_room()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM room WHERE room_id = $_REQUEST[room_id]";
	 mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../room-report.php?msg=Deleted Successfully.");
}
?>