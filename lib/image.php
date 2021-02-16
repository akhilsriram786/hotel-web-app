<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_image")
	{
		save_image();
		exit;
	}
	if($_REQUEST[act]=="delete_image")
	{
		delete_image();
		exit;
	}
	###Code for save image#####
	function save_image()
	{
		global $con;
		$R=$_REQUEST;
		/////////////////////////////////////
		$image_name = $_FILES[image_name][name];
		$location = $_FILES[image_name][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		if($R[image_id])
		{
			$statement = "UPDATE `image` SET";
			$cond = "WHERE `image_id` = '$R[image_id]'";
			$msg = "Data Updated Successfully.";
			$condQuery = "";
		}
		else
		{
			$statement = "INSERT INTO `image` SET";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`image_room_id` = '$R[image_room_id]', 
				`image_name` = '$image_name', 
				`image_title` = '$R[image_title]'". 
				 $cond;
		$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../image-report.php?msg=$msg");
	}
#########Function for delete image##########3
function delete_image()
{
	global $con;
	$SQL="SELECT * FROM image WHERE image_id = $_REQUEST[image_id]";
	$rs= mysqli_query($con,$SQL);
	$data=mysqli_fetch_assoc($rs);
	
	/////////Delete the record//////////
	$SQL="DELETE FROM image WHERE image_id = $_REQUEST[image_id]";
	 mysqli_query($con,$SQL) or die(mysqli_error($con));
	
	//////////Delete the image///////////
	if($data[image_name])
	{
		unlink("../uploads/".$data[image_name]);
	}
	header("Location:../image-report.php?msg=Deleted Successfully.");
}
?>