<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_facility")
	{
		save_facility();
		exit;
	}
	if($_REQUEST[act]=="delete_facility")
	{
		delete_facility();
		exit;
	}
	if($_REQUEST[act]=="update_facility_status")
	{
		update_facility_status();
		exit;
	}
	
	###Code for save facility#####
	function save_facility()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[facility_id])
		{
			$statement = "UPDATE `facility` SET";
			$cond = "WHERE `facility_id` = '$R[facility_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `facility` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`facility_name` = '$R[facility_name]', 
				`facility_description` = '$R[facility_description]'". 
				 $cond;
		$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../facility-report.php?msg=$msg");
	}
#########Function for delete facility##########3
function delete_facility()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM facility WHERE facility_id = $_REQUEST[facility_id]";
	 mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../facility-report.php?msg=Deleted Successfully.");
}
?>