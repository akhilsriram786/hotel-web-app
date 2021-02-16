<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_category")
	{
		save_category();
		exit;
	}
	if($_REQUEST[act]=="delete_category")
	{
		delete_category();
		exit;
	}
	if($_REQUEST[act]=="update_category_status")
	{
		update_category_status();
		exit;
	}
	
	###Code for save category#####
	function save_category()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[category_id])
		{
			$statement = "UPDATE `category` SET";
			$cond = "WHERE `category_id` = '$R[category_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `category` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`category_name` = '$R[category_name]', 
				`category_description` = '$R[category_description]'". 
				 $cond;
		$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../category-report.php?msg=$msg");
	}
#########Function for delete category##########3
function delete_category()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM category WHERE category_id = $_REQUEST[category_id]";
	 mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../category-report.php?msg=Deleted Successfully.");
}
?>