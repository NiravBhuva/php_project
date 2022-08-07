		
		
<?php
	include "Header.php";
	include "Connection.php";
	if (isset($_POST['btnPlaceOrder'])){
		$c = $_SESSION['cart'];
		$c_new = array();
		echo count($c);
		$Quant = 0;
		$NetAm = 0;
		for ($i = 0; $i < count($c); $i++) {
			$r = $c[$i];
				if($r['user_id'] == $_SESSION['User_id']){
					$Quant = $Quant + $r['quantity'];
					$NetAm = $NetAm + ($r['price']*$r['quantity']);
				}
		}

		$Name=$_POST['name'];
		$Quantity=$Quant;
		$address=$_POST['addtxt'];
		$NetAmount=$NetAm;
		$username=$_SESSION['Name'];	
		$dt=date("d-m-Y");
		
		$qq = "INSERT INTO `order_master` (`Order_id`, `Username`, `Name`, `Quantity`, `Oamount`, `Order_date`, `Daddress`) VALUES (NULL, '$username','$Name','$Quantity','$NetAmount','$dt','$address');";
		
		$qry=mysqli_query($con,$qq);
		if($qry){
			$order_master_id = $con->insert_id;
			
			for ($i = 0; $i < count($c); $i++) {
				$r = $c[$i];
				if($r['user_id'] == $_SESSION['User_id']){
					$card_id=$r['id'];
					$logo=$r['image'];
					$name=$r['name']; 
					$contact=$r['contact'];
					$sec_num=$r['contact_optional'];
					$email=$r['email'];
					$company=$r['company'];
					$address=$r['address'];
					$Quantity=$r['quantity'];
					$price=$r['price'];
					$total=$Quantity * $price;
					$q1 = "";
					if($r['contact_optional'] != null){
						$q1 = "INSERT INTO `order_item_detail` (`id`, `Card_id`, `Order_id`, `Name`, `Company`, `Logo`, `Email`, `Contact`, `SecondaryNumber`, `Quantity`, `Price`, `Total`, `Address`) VALUES (NULL, '$card_id','$order_master_id','$name','$company','$logo','$email','$contact','$sec_num','$Quantity','$price','$total','$address');";
					}else{
						$q1 = "INSERT INTO `order_item_detail` (`id`, `Card_id`, `Order_id`, `Name`, `Company`, `Logo`, `Email`, `Contact`, `SecondaryNumber`, `Quantity`, `Price`, `Total`, `Address`) VALUES (NULL, '$card_id','$order_master_id','$name','$company','$logo','$email','$contact',NULL,'$Quantity','$price','$total','$address');";
					}
					mysqli_query($con,$q1);
				}else{
					$c_new[] = $r;
				}
			}
			$_SESSION['cart'] = $c_new;
		?>
		<script>1		
			alert('Your order had been placed successfully');
			window.location="index.php";
		</script>
		<?php
			
		}else{
		?>
			<script>
				alert('Something Went Wrong');
			</script>
		<?php
		}
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
							<th>Quantity</th>		
							<th>Price</th>
							<th>Total</th>
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
							<!-- <td class="invert"><?php echo $i+1;?></td> -->
							<?php echo $rrr['image'];?> 
							<td class="invert-image"><img src="../web/upload/<?php echo $rrr['Image'];?>" class="invert-image"/></td>
							<td class="invert-image"><img src="../User/upload/<?php echo $r['image'];?>" class="invert-image"/></td>
							<td class="invert"><?php echo $r['name'];?></td>	 
							<td class="invert"><?php echo $r['contact']; if($r['contact_optional'] != null){echo ",\n"; echo $r['contact_optional'];} ?></td>
							<td class="invert"><?php echo $r['email'];?></td>
							<td class="invert"><?php echo $r['company'];?></td>
							<td class="invert"><?php echo $r['address'];?></td>
							<td class="invert"><?php echo $r['quantity'];?></td>
							<td class="invert"><?php echo $r['price'];?></td>
							<td class="invert"><?php echo $Total;?></td>
							<?php $counter=$counter;?>
							<?php $sum=$sum+$Total;?>
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
													<label class="control-label">Address: </label>
												 <input class="form-control" name="addtxt" type="text" placeholder="Address" required>
												</div>
													
											</div>
											<button class="submit check_out" name="btnPlaceOrder">Place Order</button>
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
