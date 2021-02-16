<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM room, category where room_category_id = category_id";
	$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?> 
<section id="subintro">
<div class="jumbotron subhead" id="overview">
	<div class="container">
		<div class="row">
		<div class="span12">
			<div class="centered">
				<h3>Our Luxaries Rooms</h3>
			</div>
		</div>
		</div>
	</div>
</div>
</section>
<section id="maincontent">
   <div class="container">
   		<fieldset>
            <legend>Our Luxaries Rooms</legend>
				<ul class="thumbnails"> 
					<?php
					$i=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					 	<li class="span4"> 
							<div class="thumbnail"> 
								<img src="<?=$SERVER_PATH.'uploads/'.$data[room_image]?>" alt=""> 
								<div style="padding-left:20px;">
								<h3><?=$data[category_name]?></h3> 
								<p>
									Room : <?=$data[room_title]?><br>
									No of beds : <?=$data[room_no_of_beds]?><br>
									Max Adults : <?=$data[room_max_adult]?><br>
									Max Child : <?=$data[room_max_child]?><br>
									Fare : <?=$data[room_fare]?><br>
								</p> 
								</div>
							</div> 
						</li>
					<?php
					}
					?>
					</ul>
		</fieldset>
	</div>
</section>	
<?php include_once("includes/footer.php"); ?> 