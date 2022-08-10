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
$id=$_REQUEST['id'];
include "Connection.php";
	$q="SELECT * from card_info where Card_id='$id'";
	$c=mysqli_query($con,$q);
		while($r=mysqli_fetch_array($c))
			{
			$Category=$r['Category'];
	 		$Name=$r['Name'];
			$Image=$r['Image'];
			$Price=$r['Price'];
			$Industry=$r['Industry'];
			}			
	
if(isset($_POST['submit']))
{
	$Category=$_POST['Category'];
	$name=$_POST['Name'];
	$Price=$_POST['Price'];
	$Industry=$_POST['Industry'];
	if($_FILES['Image']['name']=="")
	{
		$image=$Image;
	}
	else
	{
		$image=$_FILES['Image']['name'];
	}

	$qq="UPDATE card_info SET Category='$Category',Name='$name',Industry='$Industry',Image='$image',Price='$Price' where Card_id='$id'";
	$cc=mysqli_query($con,$qq);
	if($cc)
	{
		move_uploaded_file($_FILES['Image']['tmp_name'],"../web/upload/".$image);
		?>
		<script> alert("Successfully Upadated"); </script>
		
		 <script> window.location ='CardDesign.php';</script> 
		
		<?php
	}
	else
		?>
	<script> alert("Something Goes Wrong"); </script>
		
		 <script> window.location ='CardDesignEdit.php';</script> 
	<?php
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

								
							<div class="form-group"> <label for="exampleInputEmail1">Card_name</label>
							<input type="text" name="Name" class="form-control" id="exampleInputEmail1" value="<?php echo $Name;?>" required> </div>

							<!-- <img src="../web/upload/<?php echo $Image;?>" height=60 width=60/> -->
							<div class="form-group"> <label for="exampleInputFile">Image</label>
							<input type="file" name="Image" id="exampleInputFile" value="<?php echo $Image;?>">  </div>
							<div class="form-group"> <label for="exampleInputEmail1">Price</label>
							<input type="number" name="Price" class="form-control" id="exampleInputEmail1" value="<?php echo $Price;?>" required> </div> 
							
							<div class="form-group"> <label for="exampleInputEmail1">Industry:-</label>
							 <select name="Industry" required>

							 	
									<?php 
											include "Connection.php";	
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
							
							<div class="form-group"> <label for="exampleInputEmail1">Enter Material:-</label>
							 <select name="Category" required>
							 	
											<?php 
											include "Connection.php";	
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