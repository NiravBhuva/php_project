
<?php
$id=$_REQUEST['id'];

	include "Connection.php";

	$q="DELETE from cat_info where Cat_id='$id'";
	$c=mysqli_query($con,$q);
	?>
<script>
	window.location="category.php";
</script>