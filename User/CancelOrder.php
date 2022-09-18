
<?php

$id=$_REQUEST['id'];

	include "Connection.php";

	$q="DELETE from order_master where Order_id='$id'";
	$c=mysqli_query($con,$q);
	$q="DELETE from order_item_detail where Order_id='$id'";
	$c=mysqli_query($con,$q);
	?>
<script>
	window.location="OrderHistory.php";
</script>