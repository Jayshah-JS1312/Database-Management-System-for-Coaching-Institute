<!DOCTYPE html>
<html>
<head>
	<style>
		table,th,td
		{
			border:2px solid black;
			border-width: 4px;
			border-color: green;
		}
	</style>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="jqueryui/jquery-ui.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">
</head>
<body style="background-color: rgb(200,200,200);">
	<h1 class="ch1">Allen Career Coaching Institute</h1>
	<br>
	<br>
	<h2 class="hm">Admin Page</h2>
	<br>
	<br>
	<form action="Admincontrol.php" method="POST">
		<div class="sub1">
			<h2>Faculty Information</h2>
			<button type = "submit" name = "fsubmit" class = "btn btn success">View Faculty Details</button>
			<button type = "submit" name = "lsubmit" class = "btn btn success" onclick="window.open('Addfaculty.php')"/>Add Faculty Details</button>	
			<button type="submit" name = "dsubmit" class = "btn btn success" onclick="window.open('Deletefaculty.php')">Delete Faculty</button>
			<button type="submit" name="facsubmit" class="btn btn success">View Faculty Subjects</button>
			<button type = "submit" name="insubmit" class="btn btn success" onclick="window.open('Incomeyearandstandardwise.php')">Get Total Income Year and StandardWise</button>
			<button type="submit" name="gxsubmit" class="btn btn success" onclick="window.open('UpdateFaculty.php')">Update Faculty Details</button>
		</div>
	
	<div class="sub2">
		<h2 style="color: rgb(233,200,195);">Result & Attendance</h2>
		<button type="submit" name="msubmit" class="btn btn success" onclick="window.open('Addresult.php')">Add result </button>
		<button type="submit" name="asubmit" class ="btn btn success" onclick="window.open('Addattendance.php')">Add attendance</button>	
	</div>
	
	<div class="sub3">
		<h2 style="color:rgb(200,233,190); ">Student Details</h2>
		<button type="submit" name="isubmit" class="btn btn success" onclick="window.open('Viewstudent.php')">View Student Details</button>
		<button type="submit" name="dxsubmit" class="btn btn success" onclick="window.open('Deletestudent.php')">Delete Student</button>
		<button type="submit" name="dxsubmit" class="btn btn success" onclick="window.open('UpdateStudent.php')">Update Student Details</button>
		<button type="submit" name="upsubmit" class="btn btn success" onclick="window.open('Addjee.php')">Upgrade Std-12 student Details
		</button>
		<button type="submit" name="dwsubmit" class="btn btn success">Upgrade Std-11 student Details
		</button>	
	</div>
	
	</form>

<br/><br/><hr/>
	<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
	if (isset($_POST['fsubmit']))
	{
		$select_faculty_query = "SELECT * FROM faculty";
		$generator = mysqli_query($conn,$select_faculty_query);
		if($generator->num_rows > 0)
		{
			echo "<table><tr><th>Faculty ID</th><th>Faculty First Name</th> <th>Faculty Last Name</th> <th>Contact Number</th><th>Email</th><th>Address</th><th>Subject Code</th><th>Date of Join</th></tr>";
			while ($row = $generator->fetch_assoc()) 
			{
				echo "<tr><td>".$row["Faculty_ID"]."</td><td>".$row["Faculty_fname"]."</td><td>".$row["Faculty_lname"]."</td><td>".$row["Faculty_Mobile_No"]."</td><td>".$row["Faculty_Email"]."</td><td>".$row["Faculty_Address"]."</td><td>".$row["Faculty_subject_code"]."</td><td>".$row["Date_of_join"]."</td></tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "No Faculty";
		}
	}
	if(isset($_POST['facsubmit']))
	{
		$query = "CALL facdisplay()";
		$generator1 = mysqli_query($conn,$query);
		if($generator1->num_rows>0)
		{
			echo "<table><tr><th>Faculty First Name</th><th>Faculty Last Name</th><th>Subject Name</th></tr>";
			while($row1 = $generator1->fetch_assoc())
			{
				echo "<tr><td>".$row1["Faculty_fname"]."</td><td>".$row1["Faculty_lname"]."</td><td>".$row1["Subject_Name"]."</td></tr>";
			}
			echo"</table>";
		}
		else
		{
			echo "Empty";
		}
	}
	if (isset($_POST['dwsubmit'])) 
	{
		$query = "CALL p_Upgrade11to12()";
		$result = mysqli_query($conn,$query);
	}

?>
</body>
</html>