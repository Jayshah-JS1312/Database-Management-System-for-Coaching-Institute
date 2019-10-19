<?php
$conn = new mysqli('localhost','root','','coaching_institute');
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 
		if(isset($_POST['msubmit']))
		{
			$fname = $_POST['fac_firstname'];
			$lname = $_POST['fac_lastname'];
			$mno = $_POST['mobile_no'];
			$emailid = $_POST['email_id'];
			$address = $_POST['address'];
			$subjectcode = $_POST['code'];
			$facdate = $_POST['fac_date_of_join'];
			$insert_faculty_query = "INSERT INTO faculty(Faculty_fname,Faculty_lname,Faculty_Mobile_No,Faculty_Email,Faculty_Address,Faculty_subject_code,Date_of_join)
				VALUES('$fname','$lname',$mno,'$emailid','$address','$subjectcode','$facdate')";
			mysqli_query($conn,$insert_faculty_query);
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
		<h1>Faculty Form</h1>
		<form method="POST" action="Addfaculty.php">
			<div class="container">
				First name:
				<input type="text" name="fac_firstname">
				<br>
				<br>
				Last name:
				<input type="text" name="fac_lastname">
				<br>
				<br>
				Mobile Number:
				<input type="text" name="mobile_no">
				<br>
				<br>
				Email ID:
				<input type="text" name="email_id">
				<br>
				<br>
				Address:
				<input type="text" name="address">
				<br>
				<br>
				Date of Join:
				<input type="date" name="fac_date_of_join">
  				<br>
  				<br>
				Subject:
				<br>
				 <input type="radio" name="code" value="MTH11" checked> Maths <br>
  		         <input type="radio" name="code" value="PHY11"> Physics <br>
  		         <input type="radio" name="code" value="CHE11"> Chemistry <br> 		   
  		         <br>
  		         <br>
  		        <button type="submit" name="msubmit" class="btn btn success">Add</button>
			</div>
		</form>
	</body>
	</html>