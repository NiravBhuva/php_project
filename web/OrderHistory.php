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
								  <th>User</th>
								  <th>Billing Name</th>
								  <th>Amount</th>
								  <th>Order Date</th>
								  <th>Contact No</th>
								  <th>Order Status</th>
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
								<?php 
									$user = $r['User_id'];
									$query="SELECT * FROM user_info where User_id='$user'";
									$cc=mysqli_query($con,$query);
									$rr=mysqli_fetch_array($cc);
									$user = $rr['Name'];
								?>
								<td><?php echo ucwords($user); ?></td>
								<td><?php echo ucwords($r['Name']); ?></td>
								<td><?php echo $r['Oamount']; ?></td>
								<td><?php echo $r['Order_date']; ?></td>
								<td><?php echo $r['Contact_no']; ?></td>
								<td><?php echo $r['Order_status']; ?></td>
								<td>
									<a href="OrderStatusUpdate.php?id=<?php echo $r['Order_id'];?>">  <i style="font-size:20px; color:green" class="fa fa-pencil-square-o" aria-hidden="true"></i></a></a>
								</td>
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