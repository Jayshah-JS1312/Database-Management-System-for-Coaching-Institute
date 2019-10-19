<?php
$conn = new mysqli('localhost','root','','coaching_institute');
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 
	if (isset($_POST['clsubmit']))
	{
		$fstd = $_POST['std'];
		$fyear = $_POST['year'];
		$income_procedure = "CALL p_income_year_std($fyear,$fstd)";
		$sum = mysqli_query($conn,$income_procedure);
		$row = $sum->fetch_assoc();
		echo "<h2>Total income is " .$row["SUM(Fees)"]."</h2>";
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
<h1>Income</h1>
<form method="POST" action="Incomeyearandstandardwise.php">
	<div class="container">
			Enter the standard
			<input type="text" name="std">
			<br>
			<br>
			Enter the year
			<input type="text" name="year">
			<br>
			<br>
			<button type="submit" name="clsubmit" class="btn btn success">
				Enter
			</button>
		</div>
</form>
		
</body>
</html>