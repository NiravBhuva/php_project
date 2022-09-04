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
					<h3 class="title1">Users</h3>
					<div class="panel-body widget-shadow">
						<h4>Users Table:</h4>
						<table class="table">
							<thead>
								<tr>
								  <th>User Id</th>
								  <th>Name</th>
								  <th>User name</th>
								  <th>Password</th>
								  <th>Contact</th>
								  <th>Email</th>
								  <th>Gender</th>
								  <th>Date of Birth</th>
								  <th>Address </th>
								   <th>City</th>
								 </tr>
							</thead>
							<tbody>
<?php
	include "connection.php";
	$q="SELECT * from user_info";
	$c=mysqli_query($con,$q);
	while($r=mysqli_fetch_array($c))
	{
?>	
	<tr>
	<th scope="row"><?php echo $r['User_id']; ?></th>
	<td><?php echo $r['Name']; ?></td>
	<td><?php echo $r['Username']; ?></td>
	<td><?php echo $r['Password']; ?></td>
	<td><?php echo $r['Contact']; ?></td>
	<td><?php echo $r['Email']; ?></td>
	<td><?php echo $r['Gender']; ?></td>
	<td><?php echo $r['DOB']; ?></td>
	<td><?php echo $r['Address']; ?></td>
	<td><?php echo $r['City']; ?></td>
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