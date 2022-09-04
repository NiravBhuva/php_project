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
?>	
	<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Order History</h3>
					<div class="panel-body widget-shadow">
						<h4>Orders Table</h4>
						<table class="table">
							<thead>
								<tr>
								  <th>Order Id</th>
								  <th>User Name</th>
								  <th>Name</th>
								   <th>Quantity</th>
								  <th>Amount</th>
								  <th>Order Date</th>
								  <th>Delivery Address</th>
								 </tr>
							</thead>
<?php
	include "connection.php";
	$q="SELECT * from order_master";
	$c= mysqli_query($con,$q);
	while($r=mysqli_fetch_array($c))
	{
?>

							<tbody>
								<tr>
								  <td><?php echo $r['Order_id']; ?></td>
								  <td>User</td>
								  <!-- <td><?php echo $r['Username']; ?></td> -->
								  <td><?php echo $r['Name']; ?></td>
								  <td><?php echo $r['Quantity']; ?></td>
								  <td><?php echo $r['Oamount']; ?></td>
								  <td><?php echo $r['Order_date']; ?></td>
								  <td><?php echo $r['Daddress']; ?></td>
								 </tr>
<?php
	}						
?>

								
								</tbody>
						</table>
					</div>
					
<?php
include "Footer.php";
?>