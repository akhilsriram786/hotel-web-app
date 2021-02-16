<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `facility`";
	$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_facility(facility_id)
{
	if(confirm("Do you want to delete the facility?"))
	{
		this.document.frm_facility.facility_id.value=facility_id;
		this.document.frm_facility.act.value="delete_facility";
		this.document.frm_facility.submit();
	}
}
</script>
<script>
jQuery(document).ready(function() {
	jQuery('#mydatatable').DataTable();
});
</script>

<section id="subintro">
   <div class="jumbotron subhead" id="overview">
      <div class="container">
         <div class="row">
            <div class="span12">
               <div class="centered">
                  <h3>Room Facility Report</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="maincontent">
   <div class="container">
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_facility" action="lib/facility.php" method="post">
				<div class="static">
					<table style="width:100%" id="mydatatable">
					<thead>
						<tr class="tablehead bold">
							<td scope="col">ID</td>
							<td scope="col">Name</td>
							<td scope="col">Description</td>
							<td scope="col">Action</td>
					  </tr>
						</thead>
						<tbody>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[facility_id]?></td>
						<td><?=$data[facility_name]?></td>
						<td><?=$data[facility_description]?></td>
						<td style="text-align:center">
							<a href="facility.php?facility_id=<?php echo $data[facility_id] ?>" class="btn btn-success">Edit</a> | <a href="Javascript:delete_facility(<?=$data[facility_id]?>)" class="btn btn-danger">Delete</a> </td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="facility_id" />
				</form>
   </div>
</section>
<?php include_once("includes/footer.php"); ?> 