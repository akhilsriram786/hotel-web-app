<?php 
	include_once("includes/header.php"); 
	$R = $_REQUEST;
	$SQL = "SELECT * FROM book WHERE book_id = '$_REQUEST[book_id]'";
	$rs =  mysqli_query($con,$SQL) or die(mysqli_error($con));
	$data = mysqli_fetch_assoc($rs);
?> 
<section id="subintro">
   <div class="jumbotron subhead" id="overview">
      <div class="container">
         <div class="row">
            <div class="span12">
               <div class="centered">
                  <h3>Selected Room Details</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="maincontent">
   <div class="container">
      <fieldset>
      <legend>Make Payment</legend>
      <div>
         <div style="width:50%; float:left">
            <form action="booking-confirmation.php"  class="form-horizontal">
               <div class="control-group">
                  <label class="control-label" for="inputEmail">Card Number</label> 
                  <div class="controls"><input name="ddda" type="text" class="bar" required/>
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label" for="inputEmail">Name on Card</label> 
                  <div class="controls"><input name="asdfdddds" type="text" class="bar" required/>
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label" for="inputEmail">Card Type</label> 
                  <div class="controls">
                     <select name = "credit_card_type" required>
                        <option value="">Please Select</option>
                        <option>MasterCard</option>
                        <option>Visa Card</option>
                        <option>Discover</option>
                        <option>Maestro</option>
                        <option>American Expresss</option>
                     </select>
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label" for="inputEmail">Expiry Date</label> 
                  <div class="controls">
                     <select style="float:left; width:127px;">
                        <option>Month</option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                     </select>
                     <select name = "exp_year" required style="float:left; width:105px; margin-left:9px;">
                        <option>Year</option>
                        <?php for($i=2016; $i<=2030; $i++) { ?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label" for="inputEmail">CVV Number</label> 
                  <div class="controls"><input name="in" type="password" class="bar" required/>
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label" for="inputEmail">Total Amount</label> 
                  <div class="controls"><input name="in" type="text" class="bar" required value="<?=$data['book_total_amount']?>/-" readonly/>
                  </div>
               </div>
               <div class="clear"></div>
               <div class="control-group clear">
                  <div class="controls">
                     <input type="hidden" name="book_id" value="<?=$R[book_id]?>">
                     <button type="submit" class="btn btn-primary">Make Payment</button> 
                     <button type="reset" class="btn btn-primary">Reset Form</button>
                  </div>
               </div>
            </form>
         </div>
         <div class="col2">
            <div class="contactfinder">
               <img src="./images/payment2.jpg" alt="" style="width:250px;margin-top:20px;"/>
            </div>
         </div>
      </div>
   </div>
</section>
<?php include_once("includes/footer.php"); ?> 