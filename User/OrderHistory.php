<?php
	include "Header.php";
	include "connection.php";
	$userId = $_SESSION['User_id'];

	$q="select * from order_master where User_id='$userId'";
	$c=mysqli_query($con,$q);
	$rows=mysqli_num_rows($c);
?>
<?php 
if($rows>=1){
	?>
	<div class="privacy about">
	<h3>Order<span>History</span></h3><br><br>
	<table class="timetable_sub">
	<thead>
	<th>Order_id</th>
	<th>Username</th>
	<th>Name</th>
	<th>Quantity</th>
	<th>Amount</th>
	<th>Order Date</th>
	<th>Delivery Address</th>
	</thead>
	<tbody>
	<?php
	while($r=mysqli_fetch_array($c))
	{
		?>
			<tr class="rem1">
			<td class="invert"><?php echo $r['Order_id']; ?></td>
			<td class="invert"><?php echo $r['Username']; ?></td>
			<td class="invert"><?php echo $r['Name']; ?></td>
			<td class="invert"><?php echo $r['Quantity']; ?></td>
			<td class="invert"><?php echo $r['Oamount']; ?></td>
			<td class="invert"><?php echo $r['Order_date']; ?></td>
			<td class="invert"><?php echo $r['Daddress']; ?></td>
			</tr>
		<?php
	}
	?>
	</tbody>
	</table>
	
	<?php
}else{
	echo "<br><br><br><br><h3><center>No <span>Orders</center></span></h3>";
}
?>

<br>
<div class="clearfix"></div>
</div>
</div>



<?php
	include"Footer.php";
?>