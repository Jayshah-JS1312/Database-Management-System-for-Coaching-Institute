<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['wsubmit']))
{
	$final1 = $_POST['std'];
	$final2 = $_POST['code'];
	$result11 = "CALL studentview('$final1','$final2')";
	$generator2 = mysqli_query($conn,$result11);
		if($generator2->num_rows>0)
		{
			echo "<table><tr><th>First Name</th><th>Last Name</th><th>Student ID</th><th>Date of Birth</th><th>Age
			</th><th>Mobile Number</th><th>Email_ID</th><th>Address</th><th>Father Name</th><th>Mother Name</th><th>Father Mobile Number</th><th>School Name</th><th>Board</th><th>Standard</th><th>Joining Date</th><th>Gender</th><th>Batch Code</th><th>Batch Timings</th><th>Amount Paid</th></tr>";
			while($row = $generator2->fetch_assoc())
			{
				echo "<tr><td>".$row["Student_Firstname"]."</td><td>".$row["Student_Lastname"]."</td><td>".$row["Student_ID"]."</td><td>".$row["Date_of_Birth"]."</td><td>".$row["Age"]."</td><td>".$row["Mobile_Number"]."</td><td>".$row["Email_ID"]."</td><td>".$row["Address"]."</td><td>".$row["Father_name"]."</td><td>".$row["Mother_name"]."</td><td>".$row["Father_mobile_no"]."</td><td>".$row["School_name"]."</td><td>".$row["Board"]."</td><td>".$row["Standard"]."</td><td>".$row["Joining_Date"]."</td><td>".$row["Gender"]."</td><td>".$row["Batch_ID"]."</td><td>".$row["Batch_Timings"]."</td><td>".$row["Fees"]."</td></tr>";
			}
			echo"</table>";
		}
}

?>

<!DOCTYPE html>
<html>
<head>
	<style>
		table,th,td
		{
			border:2px solid black;
			border-width: 2px;
			border-color: green;
		}
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>View Student Details</h1>
<br>
<br>
<form method = "POST" action="Viewstudent.php">
Enter Standard:
<input type="text" name="std">
<br>
<br>
Enter Batch Code:
<input type="text" name="code">
<br>
<br>
<button type="submit" name="wsubmit" class="btn btn success">Enter
</button>
</form>

</body>
</html>