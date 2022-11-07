<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="academicstyle.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="https://kit.fontawesome.com/8f5f1cbf46.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Academic | CMS</title>
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
				if (!empty($_POST['FirstName']))
				{
					$n = mysqli_real_escape_string($connect, trim ($_POST['FirstName']));
				}
				else
				{
					$n = FALSE;
					echo '<script>alert("You forgot to enter your First Name")</script>';
				}
				
				//check for a Email
				if (!empty($_POST['LastName']))
				{
					$l = mysqli_real_escape_string($connect, trim ($_POST['LastName']));
				}
				else
				{
					$l = FALSE;
					echo '<script>alert("You forgot to enter your Last Name")</script>';
				}
				
				//check for a Subject
				if (!empty($_POST['Email_Feedback']))
				{
					$e = mysqli_real_escape_string($connect, trim ($_POST['Email_Feedback']));
				}
				else
				{
					$e = FALSE;
					echo '<script>alert("You forgot to enter your Email")</script>';
				}
				
				//check for a Message
				if (!empty($_POST['Feedback']))
				{
					$f = mysqli_real_escape_string($connect, trim ($_POST['Feedback']));
				}
				else
				{
					$f = FALSE;
					echo '<script>alert("You forgot to enter your Feedback")</script>';
				}
				
				if ($n && $l && $e && $f)
				{
					//register the user in the database
					//make the query:
					$q = "Insert INTO feedback (Feedback_ID, FirstName, LastName, Email_Feedback, Feedback) VALUES (' ', '$n', '$l', '$e', '$f')";
					//run the query
					$result = @mysqli_query ($connect, $q);
					//if it runs
					if ($result)
					{
						header("location: Academic.php");
						
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
			<h1>ACADEMICS</h1>
		</div>
		
		<div id="container2">
			<p class="title">Embrace Challenge. Support One Another.</p><br>
			<p class="paragraph">
				Ever since 2000, CAMPUS MANAGEMENT SYSTEM has been providing students with a rich and diverse learning <br>
				environment. Our unparalleled teaching methods help to launch students into the successful future they have <br>
				always dreamed of. We encourage both staff and students alike to grow, learn and create more with each day. <br><br>
				
				We believe that an effective education doesn't just come from memorizing or exercising; actively participating in <br>
				the learning process entails analyzing information, discussing, and collaborating in order to comprehend and <br>
				retain. All our courses are designed to encourage deep mental processing and student engagement with the <br>
				class material.
			</p>
			<img src="scroll.gif" alt="" class="scroll">
			<img src="sarjana.gif" alt="" class="sarjana">
		</div>
		
		<div id="container3">
			<h1>MEET TEACHERS FOR CC101 SEMESTER 4</h1>
			<p class="paragraph1">Here to Help Students Get To Know Their Lecturers</p>
			<p class="paragraph2">Search Your Subject Code For More Details</p>
			<form class="example" action = "Record.php" method = "post" style="margin:auto;max-width:300px">
				<input id="Subject_Code" type="text" placeholder="Search.." name="Subject_Code" maxlength = "10" value = "<?php if (isset($_POST['Subject_Code'])) echo $_POST ['Subject_Code']; ?>">
  				<button type="submit" name = "submit"><i class="fa fa-search"></i></button>
			</form>
			<!-- <a class="contactbtn" href="fcom.pdf" target="_blank">Google Meet</a> -->
			<div class="teacher1">
				<img src="nurisurina.png" alt="Nuri" class="nuri">
				<div class="text1">
					<p>
						<b>NURI SURINA BINTI ABDUL HALIM</b> <br>
						Master in Business Administration (MBA), UUM <br><br>
						Email : <a href = "mailto: nuri@kuptm.edu.my">nuri@kuptm.edu.my</a> <br>
					</p>
				</div>
			</div>
			<div class="teacher2">
				<img src="rukhiyah.png" alt="Rukhiyah" class="rukhiyah">
				<div class="text2">
					<p>
						<b>RUKHIYAH BINTI ADNAN</b> <br>
						Master in Computer Networking, UiTM <br><br>
						Email : <a href = "mailto: rukhiyah@kuptm.edu.my">rukhiyah@kuptm.edu.my</a> <br>
					</p>
				</div>
			</div>
			<div class="teacher3">
				<img src="akmal.png" alt="Akmal" class="akmal">
				<div class="text3">
					<p>
						<b>MOHD AKMAL BIN MOHD AZMER</b> <br>
						Master <br><br>
						Email : <a href = "mailto: mohd_akmal@kuptm.edu.my">mohd_akmal@kuptm.edu.my</a> <br>
					</p>
				</div>
			</div>
			<img src="teacher.gif" alt="" class="teacher">
		</div>
		
		<div id="container4">
			<div class="student">
				<img src="student1.jpg" alt="studentprofile" class="studentimg">
				<div class="studentinfo">
					<h1 class="studenttitle">STUDENT INFO</h1>
					<p class="aboutstudent">
						<b>Course Name:</b> DIPLOMA IN COMPUTER SCIENCE <br>
						<b>Registration Date:</b> 2021-07-23 <br>
						<b>Session:</b> 1121 <br>
						<b>Sem Registration Date:</b> 2021-11-26 <br>
						<b>Semester:</b> 2 <br>
						<b>Active:</b> Y <br>
						<b>Course Status:</b> FT <br>
						<b>Advisor:</b> WAN NOR ASNIDA BTE WAN JUSOH <br>
						<b>Date of Birth:</b> 2002-09-26 <br>
						<b>Place of Birth:</b> KUALA LUMPUR <br>
						<b>Status:</b> SINGLE <br>
						<b>Citizen:</b> Y <br>
						<b>Nationality:</b> MALAYSIAN <br>
						<b>Email KPTM:</b> KL2107009300@STUDENT.KUPTM.EDU.MY <br>
					</p>
				</div>
			</div>
			<img src="pinned.gif" alt="" class="pin">
		</div>
		
		<div id="container5">
			<h1>PRE SUBJECT REGISTRATION</h1>
			<table align="center">
				<tr>
					<th>NO KP/ID</th>
					<td>: XXXXXXXXXXXX / AM2107009300</td>
				</tr>
				<tr>
					<th>Jantina</th>
					<td>: LELAKI</td>
				</tr>
				<tr>
					<th>Semester</th>
					<td>: 4</td>
				</tr>
				<tr>
					<th>Nama Student</th>
					<td>: MUHAMMAD KHALIS FIRDAUS BIN SHAHARANI</td>
				</tr>
				<tr>
					<th>Kursus</th>
					<td>: CC101 - DIPLOMA IN COMPUTER SCIENCE</td>
				</tr>
				<tr>
					<th>Program</th>
					<td>: COV - COVENTRY</td>
				</tr>
				<tr>
					<th>Session</th>
					<td>: 0722</td>
				</tr>
			</table><br><br><br>
			<div class="sessionoption">
				<label for="session">Session 1:</label>
				<select>
					<option value="" disabled selected>Please Select One</option>
					<option value="0112">0112</option>
					<option value="0113">0113</option>
					<option value="0114">0114</option>
					<option value="0115">0115</option>
					<option value="0116">0116</option>
					<option value="0117">0117</option>
					<option value="0118">0118</option>
					<option value="0119">0119</option>
					<option value="0120">0120</option>
					<option value="0421">0421</option>
					<option value="0422">0422</option>
					<option value="0509">0509</option>
					<option value="0517">0517</option>
					<option value="0518">0518</option>
					<option value="0519">0519</option>
					<option value="0707">0707</option>
					<option value="0708">0708</option>
					<option value="0710">0710</option>
					<option value="0711">0711</option>
				</select>
				<input type="submit" value="Submit">
			</div>
			<p>Sorry, no service for pre-registration subject enrollment, Please active Academic Calender in Administration Modul</p>
			<table align="center" class="preregister">
				<tr>
					<th>NO</th>
					<th>COURSE CODE</th>
					<th>SUBJECT CODE</th>
					<th>STUDENT ID</th>
					<th>SUBJECT NAME</th>
					<th>CREDIT HOURS</th>
					<th>RATE</th>
					<th>CONTACT HOURS</th>
					<th>SEMESTER</th>
					<th>ADD</th>
				</tr>
				<tr>
					<td colspan="10"><br></td>
				</tr>
			</table>
		</div>
		
		<div id="container6">
			<h1>STUDENT INSTRUCTOR EVALUATION</h1>
			<p>Your response will be <b>STRICTLY CONFIDENTIAL</b></p>
			<table align="center" class="sie">
				<tr>
					<th>BIL</th>
					<th>SUBJECT CODE</th>
					<th>SUBJECT NAME</th>
					<th>SECTION NO</th>
					<th>LECTURER</th>
					<th>SESSION</th>
					<th></th>
				</tr>
				<tr>
					<td>1</td>
					<td>NWC1023</td>
					<td>NETWORKING ESSENTIALS</td>
					<td>02</td>
					<td>NURSHAFINAS BTE ROSLAN</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>2</td>
					<td>NWC3053</td>
					<td>COMPUTER NETWORK SECURITY</td>
					<td>03</td>
					<td>RUKHIYAH BT ADNAN</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>3</td>
					<td>SWC2353</td>
					<td>WEB DESIGN</td>
					<td>03</td>
					<td>NURI SURINA BTE ABDUL HALIM</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>4</td>
					<td>SWC2363</td>
					<td>WEB APPLICATION DEVELOPMENT</td>
					<td>03</td>
					<td>NOORNAJWA BINTI MD AMIN</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>5</td>
					<td>SWC2373</td>
					<td>EMERGING TECHNOLOGIES</td>
					<td>02</td>
					<td>MOHD AKMAL BIN MOHD AZMER</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>6</td>
					<td>SWC3393</td>
					<td>SYSTEM ANALYSIS AND DESIGN (SAD)</td>
					<td>03</td>
					<td>WAN NOR ASNIDA BTE WAN JUSOH</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
			</table>
		</div>
		
		<div id="container7">
			<h1>COURSE EVALUATION SURVEY</h1>
			<table align="center" class="ces">
				<tr>
					<th>BIL</th>
					<th>SUBJECT CODE</th>
					<th>SUBJECT NAME</th>
					<th>SECTION NO</th>
					<th>LECTURER</th>
					<th>SESSION</th>
					<th></th>
				</tr>
				<tr>
					<td>1</td>
					<td>NWC1023</td>
					<td>NETWORKING ESSENTIALS</td>
					<td>02</td>
					<td>NURSHAFINAS BTE ROSLAN</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>2</td>
					<td>NWC3053</td>
					<td>COMPUTER NETWORK SECURITY</td>
					<td>03</td>
					<td>RUKHIYAH BT ADNAN</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>3</td>
					<td>SWC2353</td>
					<td>WEB DESIGN</td>
					<td>03</td>
					<td>NURI SURINA BTE ABDUL HALIM</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>4</td>
					<td>SWC2363</td>
					<td>WEB APPLICATION DEVELOPMENT</td>
					<td>03</td>
					<td>NOORNAJWA BINTI MD AMIN</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>5</td>
					<td>SWC2373</td>
					<td>EMERGING TECHNOLOGIES</td>
					<td>02</td>
					<td>MOHD AKMAL BIN MOHD AZMER</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>6</td>
					<td>SWC3393</td>
					<td>SYSTEM ANALYSIS AND DESIGN (SAD)</td>
					<td>03</td>
					<td>WAN NOR ASNIDA BTE WAN JUSOH</td>
					<td>0722</td>
					<td>Y</td>
				</tr>
			</table>
		</div>
		
		<div id="container8">
			<h1>SUBJECT SLIP</h1>
			<p>Please check carefully the subjects listed below. If you have any Enqueries, please rectify with Record's Office. Thank you</p>
			<table align="center" class="subjectslip">
				<tr>
					<th colspan="9">SUBJECT SLIP</th>
				</tr>
				<tr>
					<th>STUDENT ID</th>
					<th>SUBJECT CODE</th>
					<th>SUBJECT NAME</th>
					<th>CREDIT HOURS</th>
					<th>SESSION</th>
					<th>SECTION NO</th>
					<th>CONTACT HOURS</th>
					<th>TAKEN</th>
					<th>VERIFY</th>
				</tr>
				<tr>
					<td>AM2107009300</td>
					<td>NWC1023</td>
					<td>NETWORKING ESSENTIALS</td>
					<td>3</td>
					<td>0722</td>
					<td>02</td>
					<td>4</td>
					<td>1</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>AM2107009300</td>
					<td>NWC3053</td>
					<td>COMPUTER NETWORK SECURITY</td>
					<td>3</td>
					<td>0722</td>
					<td>03</td>
					<td>3</td>
					<td>1</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>AM2107009300</td>
					<td>SWC2353</td>
					<td>WEB DESIGN</td>
					<td>3</td>
					<td>0722</td>
					<td>03</td>
					<td>4</td>
					<td>1</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>AM2107009300</td>
					<td>SWC2363</td>
					<td>WEB APPLICATION DEVELOPMENT</td>
					<td>3</td>
					<td>0722</td>
					<td>03</td>
					<td>4</td>
					<td>1</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>AM2107009300</td>
					<td>SWC2373</td>
					<td>EMERGING TECHNOLOGIES</td>
					<td>3</td>
					<td>0722</td>
					<td>02</td>
					<td>3</td>
					<td>1</td>
					<td>Y</td>
				</tr>
				<tr>
					<td>AM2107009300</td>
					<td>SWC3393</td>
					<td>SYSTEM ANALYSIS AND DESIGN (SAD)</td>
					<td>3</td>
					<td>0722</td>
					<td>03</td>
					<td>3</td>
					<td>1</td>
					<td>Y</td>
				</tr>
			</table>
		</div>
		
		<div id="container9">
			<img src="banner.gif" alt="" class="banner1">
			<img src="banner2.gif" alt="" class="banner2">
			<h1>EXAMINATION SLIP</h1>
			<table align="center" class="examresult">
				<tr>
					<th colspan="2">STUDENT PROFILE</th>
				</tr>
				<tr>
					<td>NO KP/ID</td>
					<td>: XXXXXXXXXXXX / AM2107009300</td>
				</tr>
				<tr>
					<td>Jantina</td>
					<td>: LELAKI</td>
				</tr>
				<tr>
					<td>Semester</td>
					<td>: 4</td>
				</tr>
				<tr>
					<td>Nama Student</td>
					<td>: MUHAMMAD KHALIS FIRDAUS BIN SHAHARANI</td>
				</tr>
				<tr>
					<td>Kursus</td>
					<td>: CC101 - DIPLOMA IN COMPUTER SCIENCE</td>
				</tr>
				<tr>
					<td>Program</td>
					<td>: COV - COVENTRY</td>
				</tr>
				<tr>
					<td>Session</td>
					<td>: 0722</td>
				</tr>
			</table><br>
			<p>Looking For Examination Sliq? Click The Print Icon</p><br>
			<a href="examinationsliq.pdf" target="_blank" class="printimg"><img src="printicon.png" alt="Print Icon" ></a>
			<p class="exam">Print Examination Sliq: </p><br><br><br><br><br>
			
			
			<table align="center" class="examsliq">
				<tr>
					<th colspan="8">EXAMINATION SLIQ</th>
				</tr>
				<tr>
					<th>NO</th>
					<th>STUDENT ID</th>
					<th>SUBJECT CODE</th>
					<th>SUBJECT NAME</th>
					<th>CREDIT HOURS</th>
					<th>SESSION</th>
					<th>SECTION NO</th>
					<th>CONTACT HOURS</th>
				</tr>
				<tr>
					<td>1</td>
					<td>AM2107009300</td>
					<td>NWC1023</td>
					<td>NETWORKING ESSENTIALS</td>
					<td>3</td>
					<td>0722</td>
					<td>02</td>
					<td>4</td>
				</tr>
				<tr>
					<td>2</td>
					<td>AM2107009300</td>
					<td>NWC3053</td>
					<td>COMPUTER NETWORK SECURITY</td>
					<td>3</td>
					<td>0722</td>
					<td>03</td>
					<td>3</td>
				</tr>
				<tr>
					<td>3</td>
					<td>AM2107009300</td>
					<td>SWC2353</td>
					<td>WEB DESIGN</td>
					<td>3</td>
					<td>0722</td>
					<td>03</td>
					<td>4</td>
				</tr>
				<tr>
					<td>4</td>
					<td>AM2107009300</td>
					<td>SWC2363</td>
					<td>WEB APPLICATION DEVELOPMENT</td>
					<td>3</td>
					<td>0722</td>
					<td>03</td>
					<td>4</td>
				</tr>
				<tr>
					<td>5</td>
					<td>AM2107009300</td>
					<td>SWC2373</td>
					<td>EMERGING TECHNOLOGIES</td>
					<td>3</td>
					<td>0722</td>
					<td>02</td>
					<td>3</td>
				</tr>
				<tr>
					<td>6</td>
					<td>AM2107009300</td>
					<td>SWC3393</td>
					<td>SYSTEM ANALYSIS AND DESIGN (SAD)</td>
					<td>3</td>
					<td>0722</td>
					<td>03</td>
					<td>3</td>
				</tr>
				<tr>
					<th colspan="8"><a class="excel" href="examsliq.xlsx" target="_blank">Export To Excel</a></th>
				</tr>
			</table>
		</div>
		
		<div id="container10">
			<h1>RESULT SLIP</h1>
			<p>Print Your Examination Result Sliq By Click The Print Icon. <b>IMPORTANT : Please print the result after the date announce</b></p><br>
			<a href="" target="_blank" class="printimg2"><img src="printicon.png" alt="Print Icon" ></a>
			<p class="result">Print Examination Result: </p>
		</div><br><br><br><br><br>
		
		<div id="container11">
			<img src="feedback.png" alt="feedbackbanner" class="feedbackimg">
			<div class="feedback">
				<h1>GIVE US YOUR FEEDBACK</h1>
				<form action="Academic.php" method="post">
					<div class="firstname_group">
						<input id="FirstName" type="input" class="firstname_field" placeholder="First Name" name="FirstName" maxlength="255" value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>"/>
						<label for="FirstName" class="firstname_label">Enter Your First Name</label>
					</div>
					<div class="lastname_group">
						<input id="LastName" type="input" class="lastname_field" placeholder="Last Name" name="LastName" maxlength="255" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>"/>
						<label for="LastName" class="lastname_label">Enter Your Last Name</label>
					</div>
					<div class="email_group">
						<input id="Email_Feedback" type="input" class="email_field" placeholder="Email" name="Email_Feedback" maxlength="100" value="<?php if (isset($_POST['Email_Feedback'])) echo $_POST['Email_Feedback']; ?>"/>
						<label for="Email_Feedback" class="email_label">Enter Your Email *</label>
					</div>
					<div class="feedback_group">
						<textarea id="Feedback" class="feedback_field" placeholder="Feedback" name="Feedback" style="height:170px; resize: none;" maxlength="255" value="<?php if (isset($_POST['Feedback'])) echo $_POST['Feedback']; ?>"></textarea>
						<label for="Feedback" class="feedback_label">Give Us Feedback On How We Can Improve Our Website</label>
					</div>
					<input onclick="myFunction()" type="submit" name ="submit" class="feedbacksubmit" value="Send">
					
					<script>
						function myFunction() {
  							alert("Thank You For Giving Us A Feedback!");
						}
					</script>
				</form>
			</div>
			<img src="lovefeedback.gif" alt="" class="lovefeedback">
		</div><br><br><br>
		
		<div id="footer">
			<a href="https://www.facebook.com/kuptmkl.official" target="_blank"><i class="fa-brands fa-square-facebook" style="font-size:36px;"></i></a>
			<a href="https://www.instagram.com/kuptmkl_official/" target="_blank"><i class="fa-brands fa-square-instagram" style="font-size:36px;"></i></a>
			<a href="https://www.youtube.com/channel/UCN1sNU5pB8cFdmYi_ekXzew" target="_blank"><i class="fa-brands fa-square-youtube" style="font-size:36px;"></i></a>
			<p>&copy; 2022 by Khalis Firdaus (FCOM Student). Proudly created with Adobe Dreamweaver</p>
		</div>
	</body>
</html>