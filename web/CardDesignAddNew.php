<?php
session_start();
include "Connection.php";
if(!isset($_SESSION['user']))
	{
	
		?>
		<script>
			alert('You have to login first');
			window.location="login.php";
		</script>
		<?php
	}
	include "Header.php";

	if(isset($_POST['submit']))
	{
		$Category=$_POST['category'];
		$Industry=$_POST['industry'];
		$name=$_POST['name'];
		$filename=$_FILES['image']['name'];
		$price=$_POST['price'];
		
		
		

		include "Connection.php";	
		$q = "INSERT INTO `card_info` (`Card_id`, `Category`, `Industry`, `Name`, `Image`, `Price`) VALUES (NULL,'$Category','$Industry','$name','$filename','$price')";
		$c=mysqli_query($con,$q);
		if ($c)
	 	{ 
	 		move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$filename);
	 	echo "<script> window.location ='CardDesign.php';</script>"; 
	 	} 
 	 	
	  	else
	    {	    	
			
				echo "<script>alert('Some Error Occured, Please try again...')</script>"; 
 		} 
	}
		
	
	
?>

<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Add New Card Design</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Card Detail :</h4>
						</div>
						<div class="form-body">
							<form action="#" method="POST" enctype="multipart/form-data" >

								<div class="form-group"> <label for="exampleInputEmail1">Enter Material:-</label>
							 <select name="category" required>
							 	<option value="">Select</option>
								<?php 
								
											$q="select * from Cat_info";
											$c=mysqli_query($con,$q);
											while($r=mysqli_fetch_array($c))
											{
												?>
												<option value="<?php echo $r['Cat_id'];?>"><?php echo $r['Cat_name'];?></option>
												<?php
											}
											
											?>
							</select><br>	</div>

										<div class="form-group"> <label for="exampleInputEmail1">Industry:-</label>
							 <select name="industry" required>
							 	<option value="">Select</option>
								<?php
											$q="select * from industry_info";
											$c=mysqli_query($con,$q);
											while($r=mysqli_fetch_array($c))
											{
												?>
												<option value="<?php echo $r['Industry_id'];?>"><?php echo $r['Industry_name'];?></option>
												<?php
											}
											
											?>
								
							</select><br>	</div>
							
							<div class="form-group"> <label for="exampleInputEmail1">Card Name</label>
							<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Card Name" required> </div>

								<div class="form-group"> <label for="exampleInputFile">Card Image</label>
							<input type="file" name="image" id="exampleInputFile" required></div>
							<div class="form-group"> <label for="exampleInputEmail1">Price</label>
							<input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Amount" required> </div> 
							
							
							
							
							
							
							<button type="submit" name="submit" class="btn btn-default">Submit
							 </button> </form> 
						</div>
					</div>
				
								
							</div>
						</div>
					</div>
			

	
<?php
include"Footer.php";
?>