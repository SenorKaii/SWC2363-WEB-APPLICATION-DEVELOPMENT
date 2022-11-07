<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SQL CONNECTIONS</title>
	</head>

	<body>
		<?php
			// Create Connection
			$connect = mysqli_connect("localhost", "root", "", "cms");
		
			// Check Connection
			if (!$connect)
			{
				die('Connection failed: ' . mysqli_connect_error());
			}
		?>
	</body>
</html>