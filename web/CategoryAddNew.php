<?php
session_start();
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
		
		$name=$_POST['nametxt'];
		$filename=$_FILES['image']['name'];
		$price=$_POST['price'];

		include "Connection.php";
		$q = "INSERT INTO `cat_info` (`Cat_id`, `Cat_name`, `Cat_img`) VALUES (NULL,'$name','$filename');";
		$c=mysqli_query($con,$q);
		if ($c)
	 	{ 
	 		move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$filename);
	 	echo "<script> window.location ='category.php';</script>"; 
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
					<h3 class="title1">Add New Category</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Card Detail :</h4>
						</div>
						<div class="form-body">
							<form action="#" method="POST" enctype="multipart/form-data" >

						
							<div class="form-group"> <label for="exampleInputEmail1">Category Name</label>
							<input type="text" name="nametxt" class="form-control" id="exampleInputEmail1" placeholder="Category Name" required> </div> 
							
							<div class="form-group"> <label for="exampleInputFile">Image</label>
							<input type="file" name="image" id="exampleInputFile" required>  </div>
							<!-- <div class="form-group"> <label for="exampleInputEmail1">Price</label>
							<input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Amount"> </div>  -->
							<button type="submit" name="submit" class="btn btn-default"><a href="category.php"></a> Insert </button> </form> 
						</div>
					</div>
				
								
							</div>
						</div>
					</div>
			

	
<?php
include"Footer.php";
?>