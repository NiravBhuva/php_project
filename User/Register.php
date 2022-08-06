		
		
<?php
	include "Header.php";

	
	
	if(isset($_POST['submit']))
	{
		$Name=$_POST['name'];
		$Username=$_POST['username'];
		$Password=$_POST['password'];
		$Contact=$_POST['contact'];
		$Email=$_POST['email'];
		$Gender=$_POST['gender'];
		$dat=$_POST['date'];
		$mon=$_POST['month'];
		$year=$_POST['year'];
		$Address=$_POST['address'];
		$City=$_POST['city'];
		$DOB=$dat."-".$mon."-".$year;
		
		include "Connection.php";

		$q="Select * from user_info where Email='$Email'";
		$c=mysqli_query($con,$q);
		$r=mysqli_num_rows($c);
		if($r>=1){
			echo "<script>alert('User already exists')</script>";
		}else{
			$q="INSERT INTO `user_info` (`User_id`, `Name`, `Username`, `Password`, `Contact`, `Email`, `Gender`, `DOB`, `Address`, `City`) VALUES (NULL,'$Name','$Username','$Password','$Contact','$Email','$Gender','$DOB','$Address','$City')";
			$c=mysqli_query($con,$q);
			if($c){ 
	 			echo "<script> window.location ='login.php';</script>"; 
	 		}else{	    	
				echo "<script>alert('Some Error Occured, Please try again...')</script>"; 
 			} 
		}
	}
		
	
	
?>

		<div class="w3_login">
			<h3>Register</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><a href="login.php"  color="white"><i class="fa fa-times fa-close"></i></a></div>
				
				  
				  <div class="form">
					<h2>Create an account</h2>
					<form action="#" method="post">
					<para>Name:-</para>
					  <input type="text" name="name" placeholder="Name" required>
					  <para>Username:-</para>
					  <input type="text" name="username" placeholder="Username" required>
					  <para>Password:-</para>
					  <input type="password" name="password" placeholder="Password" required>

					  <para>Contact:-</para>
					  <input type="text" name="contact" placeholder="Phone Number" pattern="[7-9]{1}[0-9]{9}" title="Phone number" oninvalid="this.setCustomValidity('Please enter valid number!')" oninput="this.setCustomValidity('')" required>
					  <!-- <input type="text" name="contact" placeholder="Phone Number" pattern="[7-9]{1}[0-9]{9}" title="Phone number" required> -->
					  <!-- <input type="text" name="contact" placeholder="Phone Number" minlength="9" maxlength="10" pattern="[7-9]{1}[0-9]{9}" oninvalid="setCustomValidity('Please enter valid number!')" required> -->
					  <para>Email:-</para>
					  <input type="email" name="email" placeholder="Email Address" required>
					  <para>Gender:-</para>
						<input type="radio" name="gender"  value="male" required/>Male
						<input type="radio" name="gender" value="female" required/>Female	
						<td id="gen" class="id"><br><br>
				
				<para>D.O.B:-</para>
				 <script language="javascript" type="text/javascript">
                            document.write('<select name="date"  class="selectdate">');

                            document.write('<option value="DD">DD</option>');

                            var date = 1;

                            for (date = 1; date <= 31; date++) {

                                document.write('<option value="' + date + '">' + date + '</option>');

                            }

                            document.write('</select>&nbsp;');
                                   
                        </script>

                        <select class="selectdate" name="month" required>
                            <option value="MMM">MM</option>
                            <option value="1">Jan</option>
                            <option value="2">Feb</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">Aug</option>
                            <option value="9">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>&nbsp;



                        <script language="javascript" type="text/javascript">
                            document.write('<select  name="year" class="selectdate">')

                            document.write('<option value="YYYY">YYYY</option>')

                            var year = 1950;

                            for (year = 1950; year <= 2004; year++) {

                                document.write('<option value="' + year + '">' + year + '</option>');

                            }

                            document.write('</select>')
                        </script>

					</td>
					<td class="id" id="dat">
					</td>
				</tr>
                <tr>
                <td height="10"></td>
                </tr>
					 <br><br>
					 <para>Address:-</para>
					  <input type="text" name="address" placeholder="Address" required>
					  <para>City:-</para>
					  <input type="text" name="city" placeholder="City" required>
					  <input type="submit" name="submit" value="Register">
					</form>
				  </div>
				  </div>
			</div>
			
		</div>

		
</div>
<?php
	include "Footer.php";
?>