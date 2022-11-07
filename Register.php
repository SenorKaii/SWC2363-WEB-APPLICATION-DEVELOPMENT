<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Covid</title>
		<link rel="icon" type="image/x-icon" href="kuptmlogo.png">
		<style>
			body {
				margin: 300px 770px;
				background: url("allbg.jpg") no-repeat;
				background-size: cover;
				font-size: 20px;
			}
		</style>
	</head>

	<body>
		<?php
			//call file to connect to server
			include ("Header.php");
		?>
		
		<?php
			//This query inserts a record in the database
			//has form been submitted?
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				if (!empty($_POST['Student_IC']))
				{
					$ic = mysqli_real_escape_string($connect, trim ($_POST['Student_IC']));
				}
				else
				{
					$ic = FALSE;
					echo '<script>alert("You forgot to enter your IC Number")</script>';
				}
				
				if (!empty($_POST['Status']))
				{
					$s = mysqli_real_escape_string($connect, trim ($_POST['Status']));
				}
				else
				{
					$s = FALSE;
					echo '<script>alert("You forgot to select your Status")</script>';
				}
				
				if (!empty($_POST['Start_Date']))
				{
					$sd = mysqli_real_escape_string($connect, trim ($_POST['Start_Date']));
				}
				else
				{
					$sd = FALSE;
					echo '<script>alert("You forgot to choose your Quarantine Start Date")</script>';
				}
				
				if (!empty($_POST['End_Date']))
				{
					$ed = mysqli_real_escape_string($connect, trim ($_POST['End_Date']));
				}
				else
				{
					$ed = FALSE;
					echo '<script>alert("You forgot to choose your Quarantine End Date")</script>';
				}
				
				if ($ic && $s && $sd && $ed)
				{
					//register the user in the database
					//make the query:
					$q = "Insert INTO covid (Student_IC, Status, Start_Date, End_Date) VALUES ('$ic', '$s', '$sd', '$ed')";
					//run the query
					$result = @mysqli_query ($connect, $q);
					//if it runs
					if ($result)
					{
						header("location: Vaccine.php");
						
						//close the database connection.
						mysqli_close($connect);
						exit();
					}
					//if it didn't run
					else
					{
						//message
						echo '<script>alert("System Error")</script>';

						//debuggin message
						echo '<p>' .mysqli_error($connect).'<br><br>Query: '.$q. '</p>';
					} // end of it (result)
				}
				//if there was a problem
				else
				{
					echo '<script>alert("Registration Failed, Please try again")</script>';
				}
				mysqli_close($connect);
			} //End of the main submit conditional
		?>
		
		<h2> Register Covid </h2>
		<h4> * required field </h4>
		<form action="Register.php" method="post">
			<p>
				<label class="label" for="Student_IC"> IC Number: *</label>
				<input id="Student_IC" type="text" name="Student_IC" size="30" maxlength="150" value="<?php if (isset($_POST['Student_IC'])) echo $_POST['Student_IC']; ?>" />
			</p>
			
			<p>
				<label class="label" for="Status"> Status: *</label>
				<select id="Status" name="Status" value="<?php if (isset($_POST['Status'])) echo $_POST['Status']; ?>">
					<option value="" disabled selected>Please Select One</option>
					<option value="POSITIVE">POSITIVE</option>
				</select>
			</p>
			
			<p>
				<label class="label" for="Start_Date"> Quarantine Start Date: *</label>
				<input id="Start_Date" type="date" name="Start_Date" size="12" maxlength="12" value="<?php if (isset($_POST['Start_Date'])) echo $_POST['Start_Date']; ?>" />
			</p>
			
			<p>
				<label class="label" for="End_Date"> Quarantine End Date: *</label>
				<input id="End_Date" type="date" name="End_Date" size="12" maxlength="12" value="<?php if (isset($_POST['End_Date'])) echo $_POST['End_Date']; ?>" />
			</p>
			
			<p>
				<input onclick="myFunction()" id="submit" type="submit" name="submit" value="Register"/>
				&nbsp;&nbsp;
				<input id="reset" type="reset" name="reset" value="Clear All"/>
			</p>
			
			<script>
				function myFunction() {
  					alert("Thank You For Register");
				}
			</script>
		</form>
	</body>
</html>