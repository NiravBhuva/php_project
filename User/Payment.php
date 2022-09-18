<?php 
include "Header.php";
include "Connection.php";
    // if (isset($_POST['pppp'])){
    //     echo $_REQUEST['&name'];
    // }
	if (isset($_POST['makePayment'])){
		$c = $_SESSION['cart'];
		$c_new = array();
		//echo count($c);
		// $Quant = 0;
		$NetAm = 0;
		for ($i = 0; $i < count($c); $i++) {
			$r = $c[$i];
				if($r['user_id'] == $_SESSION['User_id']){
					$NetAm = $NetAm + $r['price'];
				}
		}

		$Name=$_REQUEST['uName'];
		$contactNo=$_REQUEST['num'];
		$NetAmount=$NetAm;
		//$username=$_SESSION['Name'];	
		$dt=date("d-m-Y");
		$userId = $_SESSION['User_id'];
		
		$qq = "INSERT INTO `order_master` (`Order_id`, `User_id`, `Name`, `Oamount`, `Order_status`, `Order_date`, `Contact_no`) VALUES (NULL,'$userId','$Name','$NetAmount','PENDING','$dt','$contactNo');";
		
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
					// $Quantity=$r['quantity'];
					$price=$r['price'];
					// $total=$Quantity * $price;
					$q1 = "";
					if($r['contact_optional'] != null){
						$q1 = "INSERT INTO `order_item_detail` (`id`, `Card_id`, `Order_id`, `Name`, `Company`, `Logo`, `Email`, `Contact`, `SecondaryNumber`, `Price`, `Address`) VALUES (NULL, '$card_id','$order_master_id','$name','$company','$logo','$email','$contact','$sec_num','$price','$address');";
					}else{
						$q1 = "INSERT INTO `order_item_detail` (`id`, `Card_id`, `Order_id`, `Name`, `Company`, `Logo`, `Email`, `Contact`, `SecondaryNumber`, `Price`, `Address`) VALUES (NULL, '$card_id','$order_master_id','$name','$company','$logo','$email','$contact',NULL,'$price','$address');";
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

<!-- payment -->
		<div class="privacy about">
			<h3>Pay<span>ment</span></h3>
			
	         <div class="checkout-right">
				<!--Horizontal Tab-->
        <div id="parentHorizontalTab">
            <div class="resp-tabs-container hor_1">
                <div>
                    <form action="#" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="credit-card-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Name on Card</label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith" required>
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Card Number</label>
															<input class="number credit-card-number form-control" type="text" name="number"
																		  inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number"
																		  placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;" required>
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">CVV</label>
															<input class="security-code form-control"Â·
																		  inputmode="numeric"
																		  type="text" name="security-code"
																		  placeholder="&#149;&#149;&#149;" required>
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Expiration Date</label>
													<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY" required>
												</div>
											</div>
											<button name="makePayment" class="submit"><span>Make a payment </span></button>
										</div>
									</section>
								</form>

                </div>
                
            </div>
        </div>
		</div>

		</div>
        </div>
		<div class="clearfix"></div>
	</div>
<!-- //payment -->


<?php 
include "Footer.php";
?>

</script>
<!-- credit-card -->
		<script type="text/javascript" src="js/creditly.js"></script>
        <link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

		<script type="text/javascript">
			$(function() {
			  var creditly = Creditly.initialize(
				  '.creditly-wrapper .expiration-month-and-year',
				  '.creditly-wrapper .credit-card-number',
				  '.creditly-wrapper .security-code',
				  '.creditly-wrapper .card-type');

			  $(".creditly-card-form .submit").click(function(e) {
				//e.preventDefault();
				var output = creditly.validate();
				if (output) {
				  // Your validated credit card output
				//   console.log(output);
                //   e.stopPropagation();
                  $(this).unbind('submit').submit();
                  $(this).unbind('makePayment').submit();
				}
			  });
			});
		</script>
	<!-- //credit-card -->