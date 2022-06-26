<?php
session_start();
if(!isset($_SESSION['user']))
	{
	
		?>
		<script>
			alert('You have to login first');
			window.location="login.php";
		</script><?php
	}
	include "Header.php";
?>
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		<div class="container">
			<h3>Card Design</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					
		<?php
$id=$_REQUEST['id'];
include 'Connection.php';

$query="SELECT * FROM card_info where Category='$id'";
$c=mysqli_query($con,$query);
while($r=mysqli_fetch_array($c))
{
	?>		
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<!-- <div class="agile_top_brand_left_grid_pos">
								<img src="../web/upload/offer.png" alt=" " class="img-responsive" />
							</div> -->
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<img src="../web/upload/<?php echo $r['Image'];?>" data-imagezoom="true" height="300" width="500"  class="img-responsive"/> 
											<p><?php echo $r['Name'];?></p>
											<h4>Rs. <?php echo $r['Price'];?></h4>
										</div>
										<div class="snipcart-details">
											<a href="single.php?id=<?php echo $r['Card_id'];?>"><input type="submit" name="submit" value="Buy Now" class="button" /></a>
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
				<?php
}
?>
					<div class="clearfix"> </div>
				</div>
		</div>
	</div>
	</div>
<?php
	include "Footer.php";
?>