
<?php
$id=$_REQUEST['id'];

	include "Connection.php";

	$q="DELETE from industry_info where Industry_id='$id'";
	$c=mysqli_query($con,$q);
	?>
<script>
	window.location="Industry.php";
</script>