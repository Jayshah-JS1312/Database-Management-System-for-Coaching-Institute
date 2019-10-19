<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
	if (isset($_POST['ssubmit'])) 
	{
		$batchcode = $_POST['btcode'];
		$runquery = "CALL getbatchdetails('$batchcode')";
		$generatequery = mysqli_query($conn,$runquery);
		if($generatequery->num_rows>0)
		{
			echo "<table><tr><th>Faculty First Name</th><th>Faculty Last Name</th><th>Subject Code</th><th>Faculty ID</th><th>Batch Code</th><th>Subject</th></tr>";

			while($row = $generatequery->fetch_assoc())
			{
				echo "<tr><td>".$row["Faculty_fname"]."</td><td>".$row["Faculty_lname"]."</td><td>".$row["Faculty_subject_code"]."</td><td>".$row["Faculty_ID"]."</td><td>".$row["Batch_Code"]."</td><td>".$row["Subject_Name"]."</td></tr>";
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
			border-width: 4px;
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
	<h1>Enter Batchcode</h1>
	<form action="Facultybatch.php" method="POST">
	Enter Batchcode 
	<input type="text" name="btcode">
	<br>
	<br>
	<button type="submit" class="btn btn success" name="ssubmit">Enter
	</button>
	</form>
</body>
</html>