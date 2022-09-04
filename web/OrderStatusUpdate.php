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
	
if(isset($_POST['submit']))
{
	$orderStatus=$_POST['OrderStatus'];

	$qq="UPDATE order_master SET Order_status='$orderStatus' WHERE Order_id='$id'";
	$cc=mysqli_query($con,$qq);
	if($cc){
		?>
		    <script> alert("Order Status Successfully Upadated"); </script>
		    <script> window.location ='OrderHistory.php';</script>
		<?php
	}else
	?>
	    <script> alert("Something Goes Wrong"); </script>
	    <script> window.location ='OrderHistory.php';</script> 
	<?php
}


	 	
	?>
			

<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Update Order Status</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Status :</h4>
						</div>
						<div class="form-body">
							<form action="#" method="POST" enctype="multipart/form-data" >

							<div class="form-group"> <label for="exampleInputEmail1">Status:-</label>
							    <select name="OrderStatus" required>
                                    <option value="DELIVERED"><?php echo "DELIVERED";?></option>
                                    <option value="PENDING"><?php echo "PENDING";?></option>
							    </select><br>	
                            </div>					
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