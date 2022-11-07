<!doctype html>
<html>
	<head>
		<title>Record | CMS</title>
		<link rel="icon" type="image/x-icon" href="kuptmlogo.png">
		<style>
			body {
				margin: 0;
				padding: 0;
				background: url("allbg.jpg") no-repeat;
				background-size: cover;
			}
			
			h1 {
				color: black;
				text-align: center;
				margin-top: 300px;
				margin-bottom: -50px;
			}
			
			.record {
				width: 1600px;
				background-color: white;
				padding: 40px;
				text-align: center;
				margin: auto;
				margin-top: 5%;
				margin-bottom: 5%;
				color: black;
				font-family: 'Century Gothic',sans-serif;
			}
			
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
				text-align: left;
			}
			
			.record th {
				padding: 10px;
				font-family: 'Raleway';
				background-color: aliceblue;
			}
			
			.record td {
				padding: 50px;
			}
		</style>
	</head>

	<body>
		<?php
			include("Header.php");
		?>

		<h1> SEARCH RESULT </h1>

		<?php

		$code = $_POST ['Subject_Code'];
		$code = mysqli_real_escape_string($connect, $code);

		$q = "SELECT Subject_Code, Subject_Name, Lecturer, Achievement, Lecturer_Email, Rating FROM lecturer WHERE Subject_Code = '$code' ORDER BY Subject_Code";

		$result = @mysqli_query ($connect, $q);

		if($result)
		{
			echo '<table class="record">
			<tr><th>SUBJECT CODE</th>
			<th>SUBJECT NAME</th>
			<th>LECTURER</th>
			<th>ACHIEVEMENT</th>
			<th>EMAIL</th>
			<th>RATING</th>
			</tr>';

			//fetch and display record
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<tr>
				<td>' .$row['Subject_Code'].'</td>
				<td>' .$row['Subject_Name'].'</td>
				<td>' .$row['Lecturer'].'</td>
				<td>' .$row['Achievement'].'</td>
				<td>' .$row['Lecturer_Email'].'</td>
				<td>' .$row['Rating'].'</td>
				</tr>';
			}
			echo '</table>';
			mysqli_free_result($result);
		}
		else
		{
			echo '<p class= "error"> If no record is shown, this is because you had an incorrect or missing entry in search form.<br>Click the back button on the browser and try again.</p>';
			echo '<p>'.mysqli_error($connect).'<br></br>Query :'.$q. '</p>';
		}
		mysqli_close($connect);
		?>
	</body>
</html>
