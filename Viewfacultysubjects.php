<?php
$conn = new mysqli('localhost','root','','coaching_institute');
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 
	if (isset($_POST['delsubmit']))
	{
		$final_id = $_POST['id'];
		$date_leave = $_POST['date_of_leaving'];
		$delete_procedure = "CALL del_faculty($final_id)";
		$insert = "INSERT INTO past_faculty_records(Date_of_leaving) VALUES ('$date_leave') WHERE faculty.Faculty_ID = $final_";
		mysqli_query($conn,$delete_procedure);
		mysqli_query($conn,$insert);
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
<h1>Delete Faculty</h1>
<form method="POST" action="viewfacultysubjects.php">
	<div class="container">
			<button type="submit" name="facsubmit" class="btn btn success">
				View Faculty Subjects
			</button>
		</div>
</form>
		
</body>
</html>