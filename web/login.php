
<?php
session_start();
	include "Header.php";
	
	
	if(isset($_POST['submit']))
{
	$un=$_POST['username'];
	$psw=$_POST['password'];
	
	include "connection.php";
	
			$q="Select * from admin_info where Username='$un' AND Password='$psw'";
			$c=mysqli_query($con,$q);
			$r=mysqli_num_rows($c);
	if($r>=1)
	{
		$_SESSION['user']=$un;
		while($row=mysqli_fetch_array($c))
		{
			$_SESSION['id']=$row['id'];
		}
		?>
			<script>
			alert('Login Succesfully');
			window.location="index.php";
		</script>
		<?php
	}
	else
	{
		?> 
		<script>
			alert('Invalid Username And Passowrd');
			window.location="login.php";
		</script>
		
		<?php
	}
		
}
	?>
	
	
	<div id="page-wrapper">
		<div class="main-page login-page ">
		
			<h2 class="title1">Login</h2>

			
				<div class="widget-shadow">
					<div class="login-body">
						<form action="#" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="      Username" required><br>
							<input type="password" class="form-control" name="password"  placeholder="Password" required>
						</div>
							<input type="submit" name="submit" value="Login">
						</form>
					</div>
				</div>
		</div>
	</div>
<?php
	include "Footer.php";
?>

