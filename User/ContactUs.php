<?php
session_start();
if(!isset($_SESSION['user'])){
	?>
	<script>
		alert('You have to login first');
		window.location="login.php";
	</script>
	<?php
}

include "Header.php";

if(isset($_POST['submit'])){
	$Username=$_POST['name'];
	$Contact=$_POST['contact'];
	$Email=$_POST['email'];
	$Subject=$_POST['subject'];
	$Contact_Date=date("d-m-Y");
	$Message=$_POST['message'];
	
	include "Connection.php";	
	$q= "INSERT into contact_us values(Null,'$Username','$Contact','$Email','$Subject','$Contact_Date','$Message')";
	$c=mysqli_query($con,$q);
	if($c){   
		echo "<script> window.location ='index.php';</script>";  
	}else{           
	 	echo "<script>alert('Some Error Occured, Please try again...')</script>";  
	}
}
?>

<div class="mail">
	<h3>Contact Us</h3>
	<div class="agileinfo_mail_grids">
		<div class="col-md-4 agileinfo_mail_grid_left">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i></li>
				<li>address<span>SPS-ATKOT</span></li>
			</ul>
			<ul>
				<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
				<li>email<span><a href="mailto:ecard@gmail.com">ecard@gmail.com</a></span></li>
			</ul>
			<ul>
				<li><i class="fa fa-phone" aria-hidden="true"></i></li>
				<li>call to us<span> +91-7878438604</span></li>
			</ul>
		</div>
		<div class="col-md-8 agileinfo_mail_grid_right">
			<form action="#" method="post">
				<div class="col-md-6 wthree_contact_left_grid">
					<input type="text" name="name" placeholder="Name" required>
					<input type="email" name="email" placeholder="Email" required>
				</div>
				<div class="col-md-6 wthree_contact_left_grid">
					<input type="text" name="contact" placeholder="Contact Number" pattern="[7-9]{1}[0-9]{9}" title="Phone number" oninvalid="this.setCustomValidity('Please enter valid number!')" oninput="this.setCustomValidity('')" required>
					<input type="text" name="subject" placeholder="Subject" required>
				</div>
				<div class="clearfix"> </div>
				<textarea name="message" placeholder="Message..." required></textarea>
				<input type="submit" name="submit" value="Submit">
				<input type="reset" value="Clear">
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //mail -->
</div>
	<div class="clearfix"></div>
</div>
<!-- //banner -->

<?php
	include "Footer.php";
?>