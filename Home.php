<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="homestyle.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="https://kit.fontawesome.com/8f5f1cbf46.js" crossorigin="anonymous"></script>
		<title>Home | CMS</title>
		<link rel="icon" type="image/x-icon" href="kuptmlogo.png">
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
				if (!empty($_POST['Name_Contact']))
				{
					$n = mysqli_real_escape_string($connect, trim ($_POST['Name_Contact']));
				}
				else
				{
					$n = FALSE;
					echo '<script>alert("You forgot to enter your Name")</script>';
				}
				
				//check for a Email
				if (!empty($_POST['Email_Contact']))
				{
					$e = mysqli_real_escape_string($connect, trim ($_POST['Email_Contact']));
				}
				else
				{
					$e = FALSE;
					echo '<script>alert("You forgot to enter your Email")</script>';
				}
				
				//check for a Subject
				if (!empty($_POST['Subject_Contact']))
				{
					$s = mysqli_real_escape_string($connect, trim ($_POST['Subject_Contact']));
				}
				else
				{
					$s = FALSE;
					echo '<script>alert("You forgot to enter your Subject")</script>';
				}
				
				//check for a Message
				if (!empty($_POST['Message']))
				{
					$m = mysqli_real_escape_string($connect, trim ($_POST['Message']));
				}
				else
				{
					$m = FALSE;
					echo '<script>alert("You forgot to enter your Message")</script>';
				}
				
				if ($n && $e && $s && $m)
				{
					//register the user in the database
					//make the query:
					$q = "Insert INTO contactus (Contact_ID, Name_Contact, Email_Contact, Subject_Contact, Message) VALUES (' ', '$n', '$e', '$s', '$m')";
					//run the query
					$result = @mysqli_query ($connect, $q);
					//if it runs
					if ($result)
					{
						header("location: Home.php");
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
					echo '<script>alert("Please try again")</script>';
				}
				mysqli_close($connect);
			} //End of the main submit conditional
		?>
		<div id="header">
			<div class="logout">
				<div class="logoutdropdown">
					<button class="logoutbtn">
						<i class="arrow down"></i>
						<p class="login">&nbsp;&nbsp;Hello Khalis&nbsp;&nbsp;</p>
						<img src="iconprofile.png" alt ="" class="loginicon">
					</button>
					<div class="logoutcontent">
						<a href="Login.php">Logout</a>
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
			<h1>KOLEJ UNIVERSITI <br> POLY-TECH MARA</h1>
			<p class = "paragraph">A Community of Passionate Educators and Learners</p>
		</div>
		
		<div id="container2">
			<h1>WHAT'S THE SCOOP?</h1>
			<p class="paragraph2">The Most Up-to-Date News</p>
			<img src="sit.gif" alt="" class="sit">
			<div class="row">
				<div class="column">
					<div class="card">
						<img src="news1.png" alt="News1" style="width: 100%">
						<div class="context">
							<p>STUDENT BREAKS 2020 <br> RECORD</p><br>
							<p>September 26, 2022</p>
							<p><button class="button" onclick="document.location='https://www.kuptm.edu.my/index.php/current-student/news-announcements'">Read More</button></p>
						</div>
					</div>
				</div>
				
				<div class="column">
					<div class="card">
						<img src="news2.png" alt="News2" style="width: 100%">
						<div class="context">
							<p>LOCAL COLLEGE WINGS HIGH <br> PRAISE</p><br>
							<p>September 20, 2022</p>
							<p><button class="button" onclick="document.location='https://www.kuptm.edu.my/index.php/current-student/news-announcements'">Read More</button></p>
						</div>
					</div>
				</div>
				
				<div class="column">
					<div class="card">
						<img src="news3.png" alt="News3" style="width: 100%">
						<div class="context">
							<p>THIS YEARS TOP <br> KUPTM STUDENTS</p><br>
							<p>September 14, 2022</p>
							<p><button class="button" onclick="document.location='https://www.kuptm.edu.my/index.php/current-student/news-announcements'">Read More</button></p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<div id="container3">
			<div class="about">
				<h1><b>ABOUT OUR COLLEGE</b></h1>
			</div>
			<div class="aboutit">
				<img src="college.gif" alt="" class="college">
				<p class="title">Committed to Excellence</p><br>
				<p class="history">
					Kolej Universiti Poly-Tech MARA (KUPTM) Kuala Lumpur is a higher education institution located in the capital <br>
					city of Malaysia. We provide a warm and caring environment with quality education and recognized academic <br>
					standing. We are committed to cultivate excellence in a conducive teaching and learning environment and <br>
					provide an ideal place for your next step on your path of lifelong learning. We're extremely proud of our students <br>
					and staff, who are always eager to learn, create and grow together. Give us a call to find out more about how we <br>
					can help you prepare for the future. <br>
				</p>
				<a class="aboutbtn" href="https://www.kuptm.edu.my/index.php/kuptm-history" target="_blank">Learn More</a>
			</div>
			<div class="tourvideo">
				<video width="1060" height="597" style="border: 1px solid black" controls autoplay muted>
					<source src="kuptmtour.mp4" type="video/mp4">
				</video><br>
			</div>
		</div>
		
		<div id="container4">
			<div class="quote">
				<img src="quoteimg.png" alt="quotemodel">
				<div class="quotetext">
					<h2><u>Quote Of The Days</u></h2>
					<h2>&quot;Poor is the pupil who does not surpass his <br> master.&quot;</h2>
					<h3><i>- Leonardo da Vinci -</i></h3>
				</div>
				<img src="reminder.gif" alt="" class="reminder">
			</div>
		</div>
		
		<div id="container5">
			<div class="contactus">
				<div class="contactusform">
					<div style="text-align: center">
						<h2>Contact Us</h2>
						<p>Having A Problem Related With Your CMS Account? Contact Us Anytime Here Without Sending Email via Gmail</p>
					</div>
					<div class="contactusrow">
						<div class="contactuscolumn">
							<img src="kuptm.jpg" alt="kuptm" class="kuptmimg">
						</div>
						<div class="contactuscolumn">
							<form action="Home.php" method="post">
								
								<label for="Name_Contact">Name</label>
								<input id="Name_Contact" type="text" name="Name_Contact" placeholder="Enter your name" maxlength="255" value="<?php if (isset($_POST['Name_Contact'])) echo $_POST['Name_Contact']; ?>">
								
								<label for="Email_Contact">Email</label>
								<input id="Email_Contact" type="text" name="Email_Contact" placeholder="Enter your email" maxlength="100" value="<?php if (isset($_POST['Email_Contact'])) echo $_POST['Email_Contact']; ?>">
								
								<label for="Subject_Contact">Subject</label>
								<input id="Subject_Contact" type="text" name="Subject_Contact" placeholder="Type the subject" maxlength="255" value="<?php if (isset($_POST['Subject_Contact'])) echo $_POST['Subject_Contact']; ?>">
								
								<label for="Message">Message</label>
								<textarea id="Message" name="Message" placeholder="Type your message here..." maxlength="255" style="height:170px; resize: none;" value="<?php if (isset($_POST['Message'])) echo $_POST['Message']; ?>"></textarea>
								
								<input onclick="myFunction()" type="submit" name ="submit" value="Submit">
								
								<script>
									function myFunction() {
  										alert("Thank You For Contacting Us, We Will Response As Fast As We Can");
									}
								</script>
							</form>
						</div>
					</div>
				</div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.9685889634214!2d101.73733797084009!3d3.127901764270386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc374119aeec81%3A0xa023551a33256eb1!2sKolej%20Universiti%20Poly-Tech%20MARA%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1664049990180!5m2!1sen!2smy" width="1600" height="400" style="border:2px solid black;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
		
		<div id="footer">
			<a href="https://www.facebook.com/kuptmkl.official" target="_blank"><i class="fa-brands fa-square-facebook" style="font-size:36px;"></i></a>
			<a href="https://www.instagram.com/kuptmkl_official/" target="_blank"><i class="fa-brands fa-square-instagram" style="font-size:36px;"></i></a>
			<a href="https://www.youtube.com/channel/UCN1sNU5pB8cFdmYi_ekXzew" target="_blank"><i class="fa-brands fa-square-youtube" style="font-size:36px;"></i></a>
			<p>&copy; 2022 by Khalis Firdaus (FCOM Student). Proudly created with Adobe Dreamweaver</p>
		</div>
		
	</body>
</html>