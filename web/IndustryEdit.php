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
if(isset($_POST['btnok']))
{
	$Industry_Name=$_POST['Industry_name'];
	
}

include "Header.php";
$id=$_REQUEST['id'];
include "Connection.php";

	$q="SELECT * from industry_info where Industry_id='$id'";
	$c=mysqli_query($con,$q);
		while($r=mysqli_fetch_array($c))
			{
	 		$Industry_Name=$r['Industry_name'];

			}
	if(isset($_POST['submit']))
	{
	$name=$_POST['Industry_name'];
	

	$qq="UPDATE industry_info SET Industry_Name='$name' where Industry_id='$id'";
	$cc=mysqli_query($con,$qq);
	if($cc)
	{
		?>
		<script> alert("Successfully Upadated"); </script>
		
		 <script> window.location ='Industry.php';</script> 
		
		
		
		
	
		<?php
	}
	else
		?>
	<script> alert("Something Goes Wrong"); </script>
		
		 <script> window.location ='IndustryEdit.php';</script> 

	<?php
	}
?>
	
	 	
	

	<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Edit Industry Record</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Card Detail :</h4>
						</div>
						<div class="form-body">
							<form action="#" method="POST">
							<div class="form-group"> <label for="exampleInputEmail1">Industry Name</label>
								<input type="text" name="Industry_name" class="form-control" id="exampleInputEmail1" value="<?php echo $Industry_Name?>" required> </div> 
							
							<button type="submit" name="submit" class="btn btn-default"><a href="category.php"></a> Update </button> </form> 
						</div>
					</div>			
							</div>
						</div>
					</div>
			

	


<?php
include"Footer.php";
?>