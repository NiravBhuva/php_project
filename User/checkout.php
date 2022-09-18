		
		
<?php
	include "Header.php";
	include "Connection.php";
	if (isset($_POST['btnPlaceOrder'])){
		?>
		<script>
			window.location="Payment.php?num=<?php echo $_POST['contactNo'];?>&uName=<?php echo $_POST['name']?>";
		</script>
		<?php
	}
?>		
<!-- about -->
<?php 
$c = array();
if(isset($_SESSION['cart'])){
	$c = $_SESSION['cart'];
}

$flag = array();
$sum=0;
$counter=0;

for ($i = 0; $i < count($c); $i++) {
	$r = $c[$i];
	if($r["user_id"] == $_SESSION['User_id']){
		$flag[] = true;
	}else{
		$flag[] = false;
	}
}

if(in_array(true ,$flag )){
	?>	
			<div class="privacy about">
			<h3>My<span>Shopping</span></h3>
			<br><br>
			
	      <div class="checkout-table">
				<table class="timetable_sub">
					<thead>
						<tr>
							<!-- <th>Card</th> -->
							<th>Card</th>
							<th>Logo</th>
							<th>Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Company Name</th>
							<th>Address</th>
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>			
						
	<?php 

}else{
	echo "<br><br><br><br><h3><center>Cart <span>Empty</center></span></h3>";
}

for ($i = 0; $i < count($c); $i++) {
	$r = $c[$i];
	if($r['user_id'] == $_SESSION['User_id']){

		$quantity=$r['quantity'];
		$sum1=$sum;
		$counter=$r['price'];
		$Total=$r['price']*$r['quantity'];
		
	
		$id=$r['id'];
		$query="SELECT * FROM card_info where Card_id='$id'";
		$cn=mysqli_query($con,$query);
		$rrr=mysqli_fetch_array($cn);
	
		?>	
						<tr class="rem1">
							<?php echo $rrr['image'];?> 
							<td class="invert-image"><img src="../web/upload/<?php echo $rrr['Image'];?>" class="invert-image"/></td>
							<td class="invert-image"><img src="../User/upload/<?php echo $r['image'];?>" class="invert-image"/></td>
							<td class="invert"><?php echo $r['name'];?></td>	 
							<td class="invert"><?php echo $r['contact']; if($r['contact_optional'] != null){echo ",\n"; echo $r['contact_optional'];} ?></td>
							<td class="invert"><?php echo $r['email'];?></td>
							<td class="invert"><?php echo $r['company'];?></td>
							<td class="invert"><?php echo $r['address'];?></td>
							<td class="invert"><?php echo $r['price'];?></td>
							<?php $counter=$counter;?>
							<?php $sum=$sum+$counter;?>
							<td class="invert"><a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this record'); 
							"href="checkoutdelete.php?cartId=<?php echo $i+1;?>&cardId=<?php echo $r['id']?>" onclick="return checkdelete()"><i style="font-size:20px; color:red" class="fa fa-trash-o" aria-hidden="true"></i></a>
						
						</tr>
						
		<?php 


	}

		
}

?>	

<?php 

if(in_array(true ,$flag )){
	?>


</tbody></table>
			<div align='right'>
					<div style="border-style:inset;width: 140px;;background-color:#E3E4FA;color:#000080;text-align:center;margin-top:30px;padding-top:5px;padding-bottom:5px;margin-left:0px;">
						
						<strong>NetAmount: <?php echo $sum;?></strong>
					
					</div>
			</div>
				
<div class="checkout-left">	
	<br><br>
		<div class="col-md-12 address_form_agile">
					  <h4>Fill the Details</h4>
				<form action="#" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Full name: </label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name" required>
												</div>
												
												<div class="controls">
													<label class="control-label">Contact No: </label>
													<input class="form-control" type="text" name="contactNo" placeholder="Contact Number" pattern="[7-9]{1}[0-9]{9}" title="Phone number" oninvalid="this.setCustomValidity('Please enter valid number!')" oninput="this.setCustomValidity('')" required>
												</div>
											</div>
											<button class="submit check_out" name="btnPlaceOrder">Place Order</button>

											
										</div>
										</div>
									</section>
								</form>
					</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<?php
	
}

?> 
<!-- //about -->
</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<?php

include "Footer.php";
?>
