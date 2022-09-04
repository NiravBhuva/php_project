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


<div class="main grid">
<div class="social grid">
<div class="grid-info">

	<!-- main content start-->
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, true); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Contact Us</h3>
					
					<div class="panel-body widget-shadow">
						<h4>Contact Us Table:</h4>

	
						<table class="table">
							<thead>
								<tr>
								  <th>Contact Id</th>
								  <th>Username</th>
								  <th>Contact No</th>
								  <th>Email</th>
								  <th>Subject</th>
								  <th>Date</th>
								  <th>Message</th>
								</tr>
							


<?php
include "Connection.php";
$query="SELECT * FROM contact_us";
$c=mysqli_query($con,$query);
while($row=mysqli_fetch_array($c))
{

	?>

<tbody>
	<tr>
		<td><?php echo $row['Contact_id'];?></td>
		<td><?php echo $row['Username'];?></td>
		<td><?php echo $row['Contact'];?></td>
		<td><?php echo $row['Email'];?></td>
		<td><?php echo $row['Subject'];?></td>
		<td><?php echo $row['Contact_Date'];?></td>
		<td><?php echo $row['Message'];?></td>
		<!-- <td><a href="ContactUsReply.php">
								  <i style="font-size:20px; color:blue" class="fa fa-reply" aria-hidden="true"></i>
								  &nbsp;&nbsp; -->
		<td>
			<a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this record');" href="ContactUsDelete.php?id=<?php echo $row['Contact_id'];?>"><i style="font-size:20px; color:red" class="fa fa-trash-o" aria-hidden="true"></i></a>
		</td>
	</tr>
</tbody>




	<?php
}
?>
</table>

					
<?php
include "Footer.php";
?>