<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[category_id])
	{
		$SQL="SELECT * FROM `category` WHERE category_id = $_REQUEST[category_id]";
		$rs= mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
<section id="subintro">
	<div class="jumbotron subhead" id="overview">
		<div class="container">
			<div class="row">
			<div class="span12">
				<div class="centered">
					<h3>Room Category Entry Form</h3>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<section id="maincontent">
   <div class="container">
   		<fieldset>
            <legend>Room Category Entry Form</legend>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/category.php" enctype="multipart/form-data" method="post" name="frm_type" class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="inputEmail">Category Title</label> 
						<div class="controls">
							<input name="category_name" id="category_name" type="text" class="bar" required value="<?=$data[category_name]?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Category Description</label> 
						<div class="controls"><textarea name="category_description" cols="" rows="6" required><?=$data[category_description]?></textarea>
						</div>
					</div>
					<div class="clear"></div>
					<div class="control-group clear">
						<div class="controls">
							<button type="submit" class="btn btn-primary">Save Room</button> 
							<button type="reset" class="btn btn-primary">Reset Form</button>
						</div>
					</div>
					<input type="hidden" name="act" value="save_category">
					<input type="hidden" name="category_id" value="<?=$data[category_id]?>">
					</form>
					</fieldset>
	</div>
</section>
<?php include_once("includes/footer.php"); ?> 