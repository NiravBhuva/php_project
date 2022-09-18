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
	<th>Billing Name</th>
	<th>Amount</th>
	<th>Order Date</th>
	<th>Contact No</th>
	<th>Order Status</th>
	<th>Cancel Order</th>
	</thead>
	<tbody>
	<?php
	while($r=mysqli_fetch_array($c))
	{
		?>
			<tr class="rem1">
			<td class="invert"><?php echo $r['Order_id']; ?></td>
			<td class="invert"><?php echo $r['Name']; ?></td>
			<td class="invert"><?php echo $r['Oamount']; ?></td>
			<td class="invert"><?php echo $r['Order_date']; ?></td>
			<td class="invert"><?php echo $r['Contact_no']; ?></td>
			<td class="invert"><?php echo $r['Order_status']; ?></td>
			<?php 
				if($r['Order_status'] != "DELIVERED"){
					?>
						<td>
							<a class="dropdown-item" onclick="return confirm('Are you sure you want to cancel this order'); 
							"href="CancelOrder.php?id=<?php echo $r['Order_id'];?>" onclick="return checkdelete()"><i style="font-size:20px; color:red" class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					<?php
				}
			?>
			
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