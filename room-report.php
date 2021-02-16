<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `room`,`category` WHERE room_category_id = category_id";
	$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_room(room_id)
{
	if(confirm("Do you want to delete the room?"))
	{
		this.document.frm_room.room_id.value=room_id;
		this.document.frm_room.act.value="delete_room";
		this.document.frm_room.submit();
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
                  <h3>Room Report</h3>
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
			<form name="frm_room" action="lib/room.php" method="post">
				<div class="static">
					<table style="width:100%" id="mydatatable">
					  <thead>
					  <tr class="tablehead bold">
						<td scope="col">Image</td>
						<td scope="col">Room Number</td>
						<td scope="col">Room Type</td>
						<td scope="col">Beds</td>
						<td scope="col">Max Adults</td>
						<td scope="col">Max Childs</td>	
						<td scope="col">Fare</td>							
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
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[room_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[room_name]?></td>
						<td><?=$data[category_name]?></td>
						<td><?=$data[room_no_of_beds]?></td>
						<td><?=$data[room_max_adult]?></td>
						<td><?=$data[room_max_child]?></td>
						<td><?=$data[room_fare]?></td>
						<td style="text-align:center">
							<a href="room.php?room_id=<?php echo $data[room_id] ?>" class="btn btn-success">Edit</a> | <a href="Javascript:delete_room(<?=$data[room_id]?>)" class="btn btn-danger">Delete</a> </td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="room_id" />
				</form>
   </div>
</section>
<?php include_once("includes/footer.php"); ?> 