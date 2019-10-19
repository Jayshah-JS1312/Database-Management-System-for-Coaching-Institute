<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
	
	$cnt = "SELECT COUNT(*) FROM student";
	$s_id = "SELECT Student_ID FROM student";
	$myresult  = mysqli_query($conn,$cnt);
	$myresult1 = mysqli_query($conn,$s_id);
	$row = $myresult->fetch_assoc();
	$row1 = $myresult1->fetch_assoc();

	echo "<!DOCTYPE html>
<html>
<head>
	    <meta charset='utf-8'>
		<meta name='viewport' content='width=device-width,initial-scale=1'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
	    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
</head>
<body>
	<h1>Enter Date</h1>
	<form method='POST' action='Addresult.php'>
		Enter Date
		<input type='date' name='exam_date'>
		<br>
		<br>
		<h1>Enter Marks</h1>
		Enter Marks:
		<br>
		<br>
";

	echo  "Student_ID";
	echo "<span style='display:inline-block;  width : 110px;'></span>";
	echo "Physics";
	echo "<span style='display:inline-block;  width : 60px;'></span>";
	echo "Chemistry";
	echo "<span style='display:inline-block;  width : 40px;'></span>";
	echo "Maths";
	echo "<form id='inputField' role='form'>";
	echo "<br>";
	for($i = 0; $i < (int)$row["COUNT(*)"];$i++)
	{
		$sid = $row1["Student_ID"];
		$row1 = $myresult1->fetch_assoc();
		$name0 = "field".$i."0";
		$name1 = "field".$i."1";
		$name2 = "field".$i."2";
		$name3 = "field".$i."3";
		echo "<input type='text' name='$name0' size='20' placeholder= '$sid' value='$sid'>";
		echo "<input type='text' name='$name1' size='10' placeholder=Physics>";
		echo "<input type='text' name='$name2' size='10' placeholder=Chemistry>";
		echo "<input type='text' name='$name3' size='10' placeholder=Maths>";
		echo "<br>";
	}
	echo "
		<button type='submit' name='esubmit' class='btn btn success' value='Submit'>
			Enter
		</button>
		
</form>
</body>
</html>";
if(isset($_POST['esubmit']))
{
	$cnt = "SELECT COUNT(*) FROM student";
	$myresult  = mysqli_query($conn,$cnt);
	$row = $myresult->fetch_assoc();
	$date = $_POST["exam_date"];
	for($t = 0;$t < (int)$row["COUNT(*)"];$t++)
	{
		$student = $_POST["field".$t."0"];
		$Physics = $_POST["field".$t."1"];
		$Chemistry = $_POST["field".$t."2"];
		$Maths = $_POST["field".$t."3"];
		$myquery = "INSERT INTO result(Exam_Date,Student_ID,Maths,Physics,Chemistry) VALUES('$date','$student','$Maths','$Physics','$Chemistry')";
		$output = mysqli_query($conn,$myquery);
	}
}
?>


