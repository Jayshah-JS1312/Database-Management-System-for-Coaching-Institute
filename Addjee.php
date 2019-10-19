<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

	$cnt = "SELECT COUNT(*) FROM student WHERE Standard = 12";
	$s_id = "SELECT Student_ID FROM student WHERE Standard = 12";
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
	<form method='POST' action='Addjee.php'>
		Enter Date
		<input type='date' name='leave_date'>
		<br>
		<br>
		<h1>Enter Marks</h1>
		Enter Marks:
		<br>
		<br>
";

	echo  "Student-ID";
	echo "<span style='display:inline-block;  width : 110px;'></span>";
	echo "Jee Score";
	echo "<form id='inputField' role='form'>";
	echo "<br>";
	for($i = 0; $i < (int)$row["COUNT(*)"];$i++)
	{
		$sid = $row1["Student_ID"];
		$row1 = $myresult1->fetch_assoc();
		$name0 = "field".$i."0";
		$name1 = "field".$i."1";
		echo "<input type='text' name='$name0' size='20' placeholder= '$sid' value='$sid'>";
		echo "<input type='text' name='$name1' size='10' placeholder=Jee Score>";
		echo "<br>";
	}
	echo "
		<button type='submit' name='posubmit' class='btn btn success' value='Submit'>
			Enter
		</button>
		
</form>
</body>
</html>";

if(isset($_POST['posubmit']))
{
	$cnt = "SELECT COUNT(*) FROM student WHERE Standard = 12";
	$myresult  = mysqli_query($conn,$cnt);
	$row = $myresult->fetch_assoc();
	$date = $_POST["leave_date"];
	for($t = 0;$t < (int)$row["COUNT(*)"];$t++)
	{
		$student = $_POST["field".$t."0"];
		$Jee_Score = $_POST["field".$t."1"];
		$myquery = "CALL p_Upgrade12toPast('$student','$Jee_Score','$date')";
		$output = mysqli_query($conn,$myquery);
	}
}

?>