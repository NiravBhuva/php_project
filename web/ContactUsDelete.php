
<?php
$id=$_REQUEST['id'];

	include "Connection.php";

	$q="DELETE from contact_us where Contact_id='$id'";
	$c=mysqli_query($con,$q);
?>
	
<script>
	window.location="ContactUs.php";
</script>