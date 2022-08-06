<?php
session_start();
include "Header.php";
	
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$psw=$_POST['password'];
	
			include "Connection.php";
			
			$q="Select * from user_info where Email='$email' AND Password='$psw'";
			$c=mysqli_query($con,$q);
			$r=mysqli_num_rows($c);
	if($r>=1)
	{
		$_SESSION['user']=$email;
		$row=mysqli_fetch_array($c);
		$_SESSION['User_id']=$row['User_id'];
		$_SESSION['Name']=$row['Name'];
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
}}?>

<!-- login -->
		<div class="w3_login">
			<h3>Login</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><a href="index.php" ><i class="fa fa-times fa-close"></i></a></div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form action="#" method="post">
					  <input type="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" required>
					  <input type="password" name="password" placeholder="Password" required>
					  <input type="submit" name="submit" value="Login">
					  <tr><br><br>
       
        <a href="Register.php" ><center>Register Now......</center></a> 
        
        </tr>
					</form>
				  </div>
				  
				  </div>
				</div>
			</div>
			
</div>
<?php
	include "Footer.php";
?>