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
					<h3 class="title1">Card Design</h3>
					<div class="panel-body widget-shadow">
						<h4>View Card Design Table:</h4>


<a href="CardDesignAddNew.php" 
style="float:right">Add New Card Design</a>
						<table class="table">
							<thead>
								<tr>
								<th>Card Id</th>
								<th>Category</th>
								<th>Industry</th>								
								<th>Card Name</th>
								  <th>Card Image</th>
								   <th>Card Price</th>
								   
								  
								  </tr>
							</thead>
<?php
include "Connection.php";
$query="SELECT * FROM card_info";
$c=mysqli_query($con,$query);
while($row=mysqli_fetch_array($c))
{

	?>
	<tbody>
	<tr>
		<td><?php echo $row['Card_id'];?></td>
		
		<td><?php echo $row['Category'];?></td>
		<td><?php echo $row['Industry'];?></td>
		
		<td><?php echo $row['Name'];?></td>
		<td><img src="upload/<?php echo $row['Image'];?>" height=60 width=120/></td>
		<td><?php echo $row['Price'];?></td>

		
		
		<td>
			<a href="CardDesignEdit.php?id=<?php echo $row['Card_id'];?>">  <i style="font-size:20px; color:green" class="fa fa-pencil-square-o" aria-hidden="true"></i></a></a>
		</td>
		<td>
		<a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this record'); 
		"href="CardDesignDelete.php?id=<?php echo $row['Card_id'];?>" onclick="return checkdelete()"><i style="font-size:20px; color:red" class="fa fa-trash-o" aria-hidden="true"></i></a>
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