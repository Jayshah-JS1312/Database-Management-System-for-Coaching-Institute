<?php
$conn = new mysqli('localhost','root','','coaching_institute');
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 
	if (isset($_POST['elsubmit']))
	{
		$final_id = $_POST['id'];
		$date_leave = $_POST['date_of_leaving'];
		$delete_procedure = "CALL delstudent($final_id)";
		$sql = "UPDATE past_student_record SET Date_of_leaving = '$date_leave' WHERE Student_ID = '$final_id'";
		mysqli_query($conn,$delete_procedure);
		mysqli_query($conn,$sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Delete Student</h1>
<form method="POST" action="Deletestudent.php">
	<div class="container">
			Enter the student ID to be deleted
			<input type="text" name="id">
			<br>
			<br>
			Date of Leaving
			<input type="date" name="date_of_leaving">
			<br>
			<br>
			<button type="submit" name="elsubmit" class="btn btn success">
				Enter
			</button>
		</div>
</form>
		
</body>
</html>