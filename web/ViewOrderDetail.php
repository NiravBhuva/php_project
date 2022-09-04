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
				<div  class="col-md-13 ">
					<h3 class="title1">View Order Details</h3>
					<div class="panel-body widget-shadow">
						<h4 style="font-size:22px;">View Order Table:</h4><br>
						<table class="table">
							<thead>
								<tr>
						
								   <th>Order Id</th>
								  <th>Card Id</th>
								  <th>Name</th>
								  <th>Company</th>
								  <th>Logo</th>
								  <th>Email</th>
								  <th>Contact</th>
								  <th>Additional Number</th>
								  <th>Address</th>
								  <th>Quantity</th>
								  <th>Price</th>
								  <th>Total</th> 
								</tr>
							</thead>
<?php
	include "connection.php";
	$q="select * from order_item_detail";
	$c=mysqli_query($con,$q);
	while($r=mysqli_fetch_array($c))
	{
?>
							<tbody>
								<tr>
								  <td><?php echo $r['Order_id']; ?></td>
								  <td><?php echo $r['Card_id']; ?></td>
								  <td><?php echo $r['Name']; ?></td>
								  <td><?php echo $r['Company']; ?></td>
								  <td><?php echo $r['Logo']; ?></td>
								  <td><?php echo $r['Email']; ?></td>
								  <td><?php echo $r['Contact']; ?></td>
								  <td><?php echo $r['SecondaryNumber'] ?? "N/A";?></td>
								  <td><?php echo $r['Address']; ?></td>
								  <td><?php echo $r['Quantity']; ?></td>
								  <td><?php echo $r['Price']; ?></td>
								  <td><?php echo $r['Total']; ?></td>
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