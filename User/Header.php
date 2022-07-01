<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>E-Card Creation</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="E-Card Creation Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->


<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->


<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->


<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!-- //js -->


<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>



<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="index.php"><i class="fa fa-map-marker"></i>SPS-ATKOT</a>
		</div>
		<div class="w3l_search"></div>

		<!-- <div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div> -->

		<?php 
		if(isset($_SESSION['user'])){
		?>
			<div class="product_list_header">  
			<a href="checkout.php">
            <input type="submit" name="submit" value="View your cart" class="button" /></a>
        	</div>

			<div class="w3l_header_right1">
			<h2><a href="logout.php">Logout</a></h2>
			</div>
		<?php
		}
		?>
		<div class="clearfix"> </div>
	</div>
	
	
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->


	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>E-Card</span> Creation</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="index.php">Events</a><i>/</i></li>
					<li><a href="Services.php">Services</a><i>/</i></li>
					<li><a href="about.php">About Us</a><i>/</i></li>
					<li><a href="ContactUs.php">Contact Us</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i> +91-7878438604</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="ecard@gmail.com">ecard@gmail.com</a></li>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-history"></i><a href="OrderHistory.php">Order History</a>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<?php
				include "connection.php";
				$query="SELECT * FROM industry_info";
				$c=mysqli_query($con,$query);
				while($r=mysqli_fetch_array($c))
				{
				  	?>		
					<li><a class="color4" href="ViewIndustry.php?id=<?php echo $r['Industry_id'];?>"><?php echo $r['Industry_name'];?></a><span>|</span></li>
					<?php
				}
				?>
			</ul>
			
		</div>
		
	</div>
	
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
		<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   
			   <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
			   <?php
				include "connection.php";
				$query="SELECT * FROM industry_info";
				$c=mysqli_query($con,$query);
				while($r=mysqli_fetch_array($c))
				{
				  ?>	
					<ul class="nav navbar-nav nav_1">
						<li><a class="color4" href="ViewIndustry.php?id=<?php echo $r['Industry_id'];?>"><?php echo $r['Industry_name'];?></a></li></ul>
				<?php
				}
				?>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>	
	</div>
		<div class="w3l_banner_nav_right">
