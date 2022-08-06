		
		
<?php
	include "Header.php";
	include "Connection.php";
	if (isset($_POST['btnPlaceOrder'])){
		$Name=$_POST['name'];
		$Quantity=$_POST['Quantity'];
		$address=$_POST['addtxt'];
		$NetAmount=$_POST['oamount'];
		$username='Yash';	
		$dt=date("d-m-Y");
		
		$qq="Insert into order_master values('','$username','$Name','$Quantity','$NetAmount','$dt','$address')";
		$c=mysqli_query($con,$qq);
		if($c)
		{
			$order_master_id = $con->insert_id;
			
			$q="SELECT * FROM cart_info";
			$cc=mysqli_query($con,$q);
			while($r=mysqli_fetch_array($cc))
			{		 
						
						$card_id=$r['Card_id'];
						$logo=$r['Logo'];
						$name=$r['Name']; 
						$contact=$r['Contact'];
						$email=$r['Email'];
						$company=$r['Company'];
						$address=$r['Address'];
						$Quantity=$r['Quantity'];
						$price=$r['Price'];
						$total=$Quantity * $price;
						$q1="INSERT into order_item_detail values ('','$card_id','$order_master_id','$name','$company','$logo','$email','$contact','$Quantity','$price','$total','$address')";
						mysqli_query($con,$q1);
								
			}
			$q2="delete from cart_info where Name='$un'";
			mysqli_query($con,$q2);
		?>
		<script>1		
			alert('Your order had been placed successfully');
			window.location="index.php";
		</script>
		<?php
			
		}
		else
		{
			?>
		<script>
			alert('Something Goes Wrong');
			
		</script>
		<?php
			
		}
		
		
	}
?>		
<!-- about -->
<?php 
$c = $_SESSION['cart'];
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
							<td class="invert"><?php echo $r['contact'];?></td>
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
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
												</div>
												
												<div class="controls">
													<label class="control-label">Address: </label>
												 <input class="form-control" name="addtxt" type="text" placeholder="Address">
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
