<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit Covid Record</title>
		<link rel="icon" type="image/x-icon" href="kuptmlogo.png">
		<style>
			body {
				margin: 200px 770px;
				background: url(allbg.jpg) no-repeat;
				background-size: cover;
				font-size: 20px;
			}
		</style>
	</head>

	<body>
		<?php include ("Header.php");?>
		
		<h2> Edit a record </h2>
		<p style="color: red"><b>IMPORTANT: IC Number Cannot Be Edit!</b></p>
		
		<?php
		//look for a valid user id, either through GET or POST
		if ((isset ($_GET['id'])) && (is_numeric($_GET['id']))) {
			$id = $_GET['id'];
		} else if ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
			$id = $_POST['id'];
		} else {
			echo '<p class="error">This page has been accessed in error.</p>';
			exit();
		}
		
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$error = array();
			
			if (empty($_POST['Student_IC'])) {
				$error[] = 'You forgot to enter IC Number.';
			} else {
				$id = mysqli_real_escape_string($connect, trim($_POST['Student_IC']));
			}
			
			if (empty($_POST['Status'])) {
				$error[] = 'You forgot to enter Status.';
			} else {
				$s = mysqli_real_escape_string($connect, trim($_POST['Status']));
			}
			
			if (empty($_POST['Start_Date'])) {
				$error[] = 'You forgot to enter Quarantine Start Date.';
			} else {
				$sd = mysqli_real_escape_string($connect, trim($_POST['Start_Date']));
			}
			
			if (empty($_POST['End_Date'])) {
				$error[] = 'You forgot to enter Quarantine End Date.';
			} else {
				$ed = mysqli_real_escape_string($connect, trim($_POST['End_Date']));
			}
			
			//if no problem occured
			if (empty($error)) {
				$q = "SELECT Student_IC FROM covid WHERE Status = '$s' AND Student_IC != $id";
				
				$result = @mysqli_query($connect, $q);
				
				if (mysqli_num_rows($result) == 0) {
					$q = "UPDATE covid SET Student_IC = '$id' , Status = '$s', Start_Date = '$sd', End_Date = '$ed' WHERE Student_IC='$id' LIMIT 1";
				
				$result = @mysqli_query($connect, $q);
				
				if (mysqli_affected_rows($connect) == 1) {
					header("location: Vaccine.php");
				} else {
					echo '<p class"error> The data has not be edited due to the system error. We apologize for any convenience.</p>';
					echo '<p>' . mysqli_error($connect) . '<br/> query: ' . $q . '</p>';
				}
			} else {
				echo '<p class="error">The no ic has already been registered</p>';
			}
		} else {
			echo '<p class ="error"> The following error (s) occured: <br/>';
			foreach ($error as $msg)
			{
				echo " -$msg<br/> \n";
		}
		echo '</p><p>Please try again.</p>';
	}
	}
		$q = "SELECT Student_IC, Status, Start_Date, End_Date FROM covid WHERE Student_IC=$id";
		$result = @mysqli_query ($connect, $q);
		
		if (mysqli_num_rows($result) == 1) {
			//get patient information
			$row = mysqli_fetch_array ($result, MYSQLI_NUM);
			//create the form
			echo '<form action ="Edit.php" method="post">
			<p><label class = "label" for="Student_IC"> IC Number: </label>
			<input id = "Student_IC" type ="text" name="Student_IC" size="30" maxlength="30" value="'.$row[0].'"></p>
			
			<p><br><label class = "label" for="Status"> Status: </label>
			<select id = "Status" name="Status" value="'.$row[1].'">
				<option value="" disabled selected>Please Select One</option>
				<option value="POSITIVE">POSITIVE</option>
			</select></p>
				
			<p><br><label class = "label" for="Start_Date"> Quarantine Start Date: </label>
			<input id = "Start_Date" type ="date" name="Start_Date" size="30" maxlength="30" value="'.$row[2].'"></p>
				
			<p><br><label class = "label" for="End_Date"> Quarantine End Date: </label> 
			<input id = "End_Date" type="date" name="End_Date" size="30" maxlength="30" value="' .$row[3].'"></p>
			
			<br><p><input onclick="myFunction()" id ="submit" type="submit" name="submit" value="Edit"></p>
			<br><input type="hidden" name="id" value="'.$id.'"/>
			
			</form>';
		} else {
			echo '<p class="error"> This page has been accessed in error.</p>';
		}
		
		mysqli_close ($connect);
		?>
		<script>
			function myFunction() {
  				alert("The data has been edited");
			}
		</script>
	</body>
</html>