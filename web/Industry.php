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
	include "Header.php"
?>

<div class="main grid">
<div class="social grid">
<div class="grid-info">

	<!-- main content start-->
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, true); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Industry Table</h3>
					
					<div class="panel-body widget-shadow">
						<h4>Industry Record:</h4>
						
<a href="IndustryAddNew.php" 
style="float:right">Add New Industry</a>
						
							

<table class="table">
							<thead>
								<tr>
								  
								  <th>Industry_id</th>
								  <th>Industry_Name</th>
									<th>Action</th>
								  
								</tr>
							</thead>
<?php
include "Connection.php";
$query="SELECT * FROM industry_info";
$c=mysqli_query($con,$query);
while($r=mysqli_fetch_array($c))
{

	?>
	<tr>
		<td><?php echo $r['Industry_id'];?></td>
		<td><?php echo $r['Industry_name'];?></td>
		<td>
	<a href="IndustryEdit.php?id=<?php echo $r['Industry_id'];?>">  <i style="font-size:20px; color:green" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this record'); 
			"href="IndustryDelete.php?id=<?php echo $r['Industry_id'];?>" onclick="return checkdelete()"><i style="font-size:20px; color:red" class="fa fa-trash-o" aria-hidden="true"></i></a>
		</td>
	</tr>
	<?php
}
?>
</table>
							
<?php
include "Footer.php";
?>