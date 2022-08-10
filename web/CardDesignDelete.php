
<?php

$id=$_REQUEST['id'];

	include "Connection.php";

	$q="DELETE from card_info where Card_id='$id'";
	$c=mysqli_query($con,$q);
	?>
<script>
	window.location="CardDesign.php";
</script>