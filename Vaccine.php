<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="vaccinestyle.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Chelsea Market" rel="stylesheet">
		<script src="https://kit.fontawesome.com/8f5f1cbf46.js" crossorigin="anonymous"></script>
		<title>Vaccine | CMS</title>
		<link rel="icon" type="image/x-icon" href="kuptmlogo.png">
	</head>

	<body>
		<div id="header">
			<div class="logout">
				<div class="logoutdropdown">
					<button class="logoutbtn">
						<i class="arrow down"></i>
						<p class="login">&nbsp;&nbsp;Hello Khalis&nbsp;&nbsp;</p>
						<img src="iconprofile.png" alt ="" class="loginicon">
					</button>
					<div class="logoutcontent">
						<a href="login.html">Logout</a>
					</div>
				</div>
			</div>
			
			<hr class="blackline">
			
			<div class = "secondheader">
				<img src="headerlogo.png" alt ="" class="logo">
				<div class = "rightheader">
					<p class ="headerfont">&nbsp;<b>CAMPUS MANAGEMENT SYSTEM</b><br></p>
					<p class ="tinyfont">&nbsp;CMS @ KUPTM</p>
				</div>
	
				<div class = "navigation">
					<button onclick="document.location='Home.php'" class="btn">Home</button>
					<button onclick="document.location='Academic.php'" class="btn">Academic</button>
					<button onclick="document.location='Vaccine.php'" class="btn">Vaccine</button>
					<div class="dropdown">
						<button class="btn">More</button>
						<div class="dropdown-content">
							<a href="lounge.html">Student Lounge</a>
							<a href="#">KO-Q</a>
							<a href="#">Finance</a>
							<a href="timetable.html">Time Table</a>
							<a href="#">Student</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="container1">
			<div class="covidvaccineimg">
			
			</div>
			<div class="covidvaccinebox">
				<div class="covidvaccine">
					<h1>COVID-19 <br> Vaccines</h1>
					<p>
						Now that COVID-19 vaccines have reached <br>
						billions of people worldwide, the evidence <br>
						is overwhelming that no matter which one <br>
						you take, the vaccines offer life-saving <br>
						protection against a disease that has killed <br>
						millions. The pandemic is far from over, <br>
						and they are our best bet of staying safe.
					</p><br><br>
					<a class="covidvaccinebtn" href="https://www.cdc.gov/coronavirus/2019-ncov/vaccines/different-vaccines/how-they-work.html" target="_blank">READ MORE</a>
				</div>
			</div>
		</div>
		
		<div id="container2">
			<h1>STUDENT VACCINE INFORMATION</h1>
			<table align="center" class="studentinfo">
				<tr>
					<th>IC Number</th>
					<td>: XXXXXXXXXXXX</td>
				</tr>
				<tr>
					<th>ID Number</th>
					<td>: AM2107009300</td>
				</tr>
				<tr>
					<th>Student Name</th>
					<td>: MUHAMMAD KHALIS FIRDAUS BIN SHAHARANI</td>
				</tr>
				<tr>
					<th>Programme</th>
					<td>: CC101 - DIPLOMA IN COMPUTER SCIENCE</td>
				</tr>
			</table><br><br>
			<img src="vaccineimg.gif" alt="" class="vaccinegif">
			<table align="center" class="vaccineinfo">
				<tr>
					<th colspan="2">VACCINE INFORMATION</th>
				</tr>
				<tr>
					<th>Vaccine Type</th>
					<td>: Pfizer</td>
				</tr>
				<tr>
					<th>Location</th>
					<td>: KLINIK KESIHATAN SUNGAI BULOH</td>
				</tr>
				<tr>
					<th>First Dose</th>
					<td>: 2 SEPTEMBER 2021</td>
				</tr>
				<tr>
					<th>Second Dose</th>
					<td>: 28 SEPTEMBER 2021</td>
				</tr>
			</table>
		</div>
		
		<div id="youtube">
			<h1>INTRODUCTION TO CORONA VIRUS DISEASE (COVID-19)</h1>
			<iframe width="1200" height="600" frameborder="0" src="https://www.youtube.com/embed/5DGwOJXSxqg?autoplay=1&mute=1"></iframe>
		</div>
		
		<div id="container3">
			<h1>STUDENT COVID-19 INFORMATION</h1>
			<p>IMPORTANT: Only Register Once If You Are Positive To Covid-19</p>
			<img src="virus.gif" alt="" class="virus">
			<?php include ("Header.php");?>

			<?php
				//make the query
				$q = "SELECT Student_IC, Status, Start_Date, End_Date FROM covid ORDER BY Student_IC";

				//run the query
				$result = @mysqli_query ($connect, $q);

				//if it ran without a problem, display the records
				if($result){
					//table heading
					echo '<table align="center" class="covidinfo">
					<tr>
						<th colspan="6">COVID-19 INFORMATION</th>
					</tr>
					<tr>
						<th>IC Number</th>  
						<th>Status</th>
						<th>Quarantine Start Date</th>
						<th>Quarantine End Date</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>';

					//Fetch and print all the records
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						echo '<tr>
						<td>'.$row['Student_IC']. '</td>
						<td>'.$row['Status']. '</td>
						<td>'.$row['Start_Date']. '</td>
						<td>'.$row['End_Date']. '</td>
						<td><a href = "Edit.php? id='.$row['Student_IC'].'">Edit</a></td>
						<td><a href = "Delete.php? id='.$row['Student_IC'].'" target="_blank">Delete</a></td>
						</tr>';
					}

				//close the table
				echo '</table><br>';
				echo '
				<div class="covidbtn">
					<a href="Register.php" class="covidregister">Register</a>
				</div>';

				//free  up the resources
				mysqli_free_result ($result);

				} 
				//if failed to run
				else 
				{
					//error message
					echo '<p class = "error"> The current patient could not be retrieved. 
					We apologized for any inconvenience.</p>';

					//debuggin message
					echo '<p>' .mysqli_error($connect). '<br><br/>Query: '.$q.' </p>';
				}//end of it ($result)

				//close the database connection
				//mqsqli_close($connect);
			?>
		</div>
		
		<div id="footer">
			<a href="https://www.facebook.com/kuptmkl.official" target="_blank"><i class="fa-brands fa-square-facebook" style="font-size:36px;"></i></a>
			<a href="https://www.instagram.com/kuptmkl_official/" target="_blank"><i class="fa-brands fa-square-instagram" style="font-size:36px;"></i></a>
			<a href="https://www.youtube.com/channel/UCN1sNU5pB8cFdmYi_ekXzew" target="_blank"><i class="fa-brands fa-square-youtube" style="font-size:36px;"></i></a>
			<p>&copy; 2022 by Khalis Firdaus (FCOM Student). Proudly created with Adobe Dreamweaver</p>
		</div>
	</body>
</html>