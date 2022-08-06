<?php
session_start();
if(!isset($_SESSION['user']))
	{
		?>
		<!-- <script>
			alert('You have to login first');
			window.location="login.php";
		</script> -->
		<?php
	
	}
	include "Header.php";
?>		
			
<div class="w3l_banner_nav_right_banner3_btml">

<?php 
include "Connection.php";	
$query="SELECT * FROM cat_info";
$c=mysqli_query($con,$query);
while($r=mysqli_fetch_array($c)){
?>
	<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
		<div class="view view-tenth">
		<img src="../web/upload/<?php echo $r['Cat_img'];?>"  height=250 width=350 />
			<div class="mask">
			<h4><a class="cardh4" href="card.php?id=<?php echo $r['Cat_id'];?>">Shop Now</a></h4>
			</div>
		</div>
		<h4><?php echo $r['Cat_name'];?></h4>
	</div>
<?php
}
?>

<div class="clearfix"> </div>
	</div>
</div>
			

<!-- //banner -->
<?php
	include "Footer.php";
?>
