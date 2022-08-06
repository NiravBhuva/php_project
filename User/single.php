<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['user'])){
	?>
	<script>
		alert('You have to login first');
		window.location="login.php";
	</script>
	<?php
}	

include "Header.php";
include "Connection.php";

$id=$_REQUEST['id'];
$query="SELECT * FROM card_info where Card_id='$id'";
$c=mysqli_query($con,$query);
while($r=mysqli_fetch_array($c)){
	if(isset($_POST['submit'])){

		// print_r($_FILES['image']['name']);
		//print_r(dirname($_FILES["image"]["tmp_name"]));
		
		$id=$_REQUEST['id'];
		$Name=$_POST['name'];
		$Company=$_POST['company'];
		$filename=$_FILES['image'];
		$Email=$_POST['email'];
		$Contact=$_POST['contact'];
		$Address=$_POST['address'];
		$quantity=$_POST['quantity'];
		$Price=$_POST['price'];
		$Total=$_POST['amount'];
		$NetAmount=$_POST['netamount'];

		$filename = $_FILES["image"]["name"];
    	$tempname = $_FILES["image"]["tmp_name"];  
        $folder = "upload/".$filename;   

		// if (move_uploaded_file($tempname, $folder)) {

		// 	echo $_FILES['image']['name'];
        //     echo "Image uploaded successfully";

        // }else{

        //     echo "Failed to upload image";

    	// }

		// echo count($_SESSION['cart']);
		// unset($_SESSION['cart']);
		// echo count($_SESSION['cart']);

		$cart_object = array(
			"id" => $_REQUEST['id'],
			"user_id" => $_SESSION['User_id'],
			"name" => $_POST['name'],
			"company" => $_POST['company'],
			"image" => $filename,
			"email" => $_POST['email'],
			"contact" => $_POST['contact'],
			"address" => $_POST['address'],
			"quantity" => $_POST['quantity'],
			"price" => $_POST['price'],
			"amount" => $_POST['amount'],
			"netamount" => $_POST['netamount'],
		);


		if(isset($_SESSION['cart'])){
			$ary = $_SESSION['cart'];
			$ary[] = $cart_object;
			$_SESSION['cart'] = $ary;
			move_uploaded_file($tempname, $folder);
		}else{
			$cart = array();

			$cart[] = $cart_object;
			$_SESSION['cart'] = $cart;
			move_uploaded_file($tempname, $folder);
		}

		echo "<script> window.location ='checkout.php';</script>";





		// $q= "INSERT INTO `cart_info` (`Cart_id`, `Card_id`, `Name`, `Company`, `Logo`, `Email`, `Contact`, `Address`, `Quantity`, `Price`, `Total`, `NetAmount`) VALUES (NULL,'$id','$Name','$Company','$filename','$Email','$Contact','$Address','$quantity','$Price','$Total','$NetAmount')";
		//$q= "INSERT INTO cart_info values('','$id','$Name','$Company','$filename','$Email','$Contact','$Address','$quantity','$Price','$Total','$NetAmount')";
		//$qq= "INSERT INTO order_item_detail values('','$id','$Name','$Company','$filename','$Email','$Contact','$Address','$quantity','$Price','$Total',''$NetAmount')";
		
		// $c=mysqli_query($con,$q);

		// $image=$_FILES["image"]["name"];
   		// 	$imageName = $_FILES["image"]["name"];
   			
		// 	if (move_uploaded_file($image, __DIR__.$imageName)) {
		// 		echo "Uploaded";
		// 	} else {
		// 	   echo "File not uploaded";
		// 	}
		
		// if ($c){ 
			
		// 	// copy($_FILES['image']['tmp_name'],"../User/upload".$filename);
	 	// 	// // move_uploaded_file($_FILES['image']['tmp_name'],"".$filename);
	 	// 	// echo "<script> window.location ='checkout.php';</script>"; 
	 	// }else{	    	
		// 	echo "<script>alert('Some Error Occured, Please try again...')</script>"; 
 		// } 
	}
?>


<div class="agileinfo_single">
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="../web/upload/<?php echo $r['Image'];?>" data-imagezoom="true" height="150" width="260" /> 
				</div>
				<div class="col-md-8 agileinfo_single_right">
					
					<div class="w3agile_description">
						<h1><?php echo $r['Name'];?></h1>
						<h4>RS.  <?php echo $r['Price'];?></h4>
					</div>
					
					<div class="snipcart-item block">
						  <div class="form-body">
							<form action="#" method="POST" enctype="multipart/form-data" >

						
							<div class="form-group"> <label for="exampleInputEmail1">Name</label>
							<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" > </div>

							<div class="form-group"> <label for="exampleInputEmail1">Company</label>
							<input type="text" name="company" class="form-control" id="exampleInputEmail1" placeholder="Company name" > </div>

							<div class="form-group"> <label for="exampleInputFile">Logo</label>
							<input type="file" name="image" id="exampleInputFile" required>  </div>


							<div class="form-group"> <label for="exampleInputEmail1">Email</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" > </div>
							
							<div class="form-group"> <label for="exampleInputEmail1">Contact no.</label>
							<input type="text" name="contact" class="form-control" id="exampleInputEmail1" placeholder="Contact" pattern="[7-9]{1}[0-9]{9}" oninvalid="this.setCustomValidity('Please enter valid number!')" oninput="this.setCustomValidity('')" > </div>
				
							<div class="form-group"> <label for="exampleInputEmail1">Address</label>
							<input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" > </div>
							
							<div class="form-group"> <label for="exampleInputEmail1">Quantity</label>
							<input type="number" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Quantity" > </div>
							
							<?php
							$id=$_REQUEST['id'];
							$query="SELECT * FROM card_info where Card_id='$id'";
							$c=mysqli_query($con,$query);
							while($r=mysqli_fetch_array($c)){
								?>
							 		<input type="hidden" name="price" value="<?php echo $r['Price'];?>">
								<?php
							}

							$id=$_REQUEST['id'];
							$query="SELECT * FROM card_info where Card_id='$id'";
							$c=mysqli_query($con,$query);
							while($r=mysqli_fetch_array($c)){
								?>
							 		<input type="hidden" name="amount" value="<?php echo $r['Price'];?>">
								<?php
							}
							
							$id=$_REQUEST['id'];
							$query="SELECT * FROM card_info where Card_id='$id'";
							$c=mysqli_query($con,$query);
							while($r=mysqli_fetch_array($c)){
								?>
							 		<input type="hidden" name="discount" value="<?php echo $r['Price'];?>">
								<?php
							}
							
							$id=$_REQUEST['id'];
							$query="SELECT * FROM card_info where Card_id='$id'";
							$c=mysqli_query($con,$query);
							while($r=mysqli_fetch_array($c)){
								?>
							 		<input type="hidden" name="netamount" value="<?php echo $r['Price'];?>">
								<?php
							}
							?>
							<input type="submit" name="submit" value="Add to cart"  />
							</form>
						</div>
					</div>
				</div>
<?php
}
?>
	<div class="clearfix"> </div>
	</div>
	</div>
	<div class="clearfix"></div>
</div>

<!-- //banner -->
<?php
	include "Footer.php";
?>



<!-- <div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="raisin rolls" />
													<input type="hidden" name="amount" value="6.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div> -->