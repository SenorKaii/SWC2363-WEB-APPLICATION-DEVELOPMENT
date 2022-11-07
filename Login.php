<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="loginstyle.css">
		<title>Login | CMS</title>
		<link rel="icon" type="image/x-icon" href="kuptmlogo.png">
	</head>

	<body>
		<?php
			//call file to connect server CMS
			include ("Header.php");
		?>
		
		<?php
			//Thise section processes submissions from the login form
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				if (!empty($_POST['Student_ID']))
				{
					$un = mysqli_real_escape_string($connect, $_POST['Student_ID']);
				}
				else
				{
					$un = FALSE;
					echo '<script>alert("You forgot to enter your Student ID")</script>';
				}
				
				//validate the password
				if (!empty($_POST['Password']))
				{
					$p = mysqli_real_escape_string($connect, $_POST['Password']);
				}
				else
				{
					$p = FALSE; 
					echo '<script>alert("You forgot to enter your Password")</script>';
				}
				
				//if no problems
				if ($un && $p)
				{
					//Retrieve the id, firstname, lastname, for the username and password combination
					$q = "SELECT Student_ID, Password FROM login WHERE (Student_ID = '$un' AND Password = '$p')";
					
					//run the query and assign it to the variabe $result
					$result = mysqli_query($connect, $q);
					
					//count the number of rows that match the username/password combination
					//if one database row (record) matches the input:
					if (@mysqli_num_rows ($result) == 1)
					{
						//start the session, fetch the record and insert the three values in an array
						session_start();
						$_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
						
						header("location: Home.php");
						
						//cancel the rest of the script
						exit();
						
						mysqli_free_result($result);
						mysqli_close($connect);
						//no match was made
					}
					else
					{
						echo '<script>alert("The username and password entered do not match our records")</script>';
					}
				}
				//if there was a problem
				else
				{
					echo '<script>alert("Please try again")</script>';
				}
				mysqli_close($connect);
			}//end of submit conditional	
		?>
		<div class="box">
			<img src="kuptmlogo.png" alt="" class="box-img">
			<h2>CAMPUS MANAGEMENT SYSTEM</h2>
			<h4>KOLEJ UNIVERSITI POLY-TECH MARA</h4>
		
			<p><a href="creator.html" target="_blank">The Creator Of CMS</a></p>
		
			<form action = "Login.php" method = "post">
				<div class="container">

					<!-- Label And Ask user to input their username which is student id -->
					<label for="Student_ID"><b>Username</b></label>
					<input id="Student_ID" type="text" placeholder="Enter Student ID" name="Student_ID" maxlength="12" value="<?php if (isset($_POST['Student_ID'])) echo $_POST['Student_ID'];?>">

					<!-- Label And Ask user to input their password which is ic number -->
					<label for="Password"><b>Password</b></label>
					<input id="Password" type="password" placeholder="Enter Password" name="Password" maxlength="12" value="<?php if (isset($_POST['Password'])) echo $_POST['Password'];?>">

					<!-- Button for login and access to another page-->
					<button type="submit" name ="submit">Login</button><br>

					<label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
				</div>
			</form>
		</div>
	</body>
</html>