<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


echo "<body>
<h1>Update Student Details</h1> 

<form method = 'POST' action='UpdateStudent.php'>
Enter Student ID:
<input type='text' name='FID'>
<br>
<br>

<button type='submit' name='wsubmit' class='btn btn success'>Enter
</button>
</form>


</body>";

if(isset($_POST['wsubmit']))
{
	$id = $_POST['FID'];

	$update_query = "SELECT * FROM student WHERE Student_ID='$id'";
	$fd = mysqli_query($conn,$update_query);
	$row = $fd->fetch_assoc();


	echo "<form method='POST' action = 'UpdateStudent.php'><div class='container'>
				First name:
				<input type='text' name='stu_firstname' value='".$row["Student_Firstname"]."'>
				<br>
				<br>
				Last name:
				<input type='text' name='stu_lastname' value='".$row["Student_Lastname"]."'>
				<br>
				<br>
				Mobile Number:
				<input type='text' name='mobile_no' value='".$row["Mobile_Number"]."'>
				<br>
				<br>
				Email ID:
				<input type='text' name='email_id' value='".$row["Email_ID"]."'>
				<br>
				<br>
				Address:
				<input type='text' name='address' value='".$row["Address"]."'>
				<br>
				<br>
				Date of Birth:
				<input type='date' name='dob' value='".$row["Date_of_Birth"]."'>
  				<br>
  				<br>
  				Age:
  				<input type='text' name='age' value='".$row["Age"]."'>
  				<br>
  				<br>
  				Father Name:
  				<input type='text' name='fatname' value='".$row["Father_name"]."'>
  				<br>
  				<br>
  				Mother Name:
  				<input type='text' name='moname' value='".$row["Mother_name"]."'>
  				<br>
  				<br>
  				Father Mobile Number:
  				<input type='text' name='fomobile' value='".$row["Father_mobile_no"]."'>
  				<br>
  				<br>
  				School:
  				<input type='text' name='school' value='".$row["School_name"]."'>
  				<br>
  				<br>
  				Board:
  				<input type='text' name='board' value='".$row["Board"]."'>
  				<br>
  				<br>
  				Date of Join:
				<input type='date' name='doj' value='".$row["Joining_Date"]."'>
  				<br>
  				<br>
  				Student ID:
  		        <input type='text' name='FID' value='$id'>
				<br>
				<br>
  		        <button type='submit' name='msubmit' class='btn btn success'>Update</button>
			</div></form>";
}
if(isset($_POST['msubmit']))
{
	$fid=$_POST['FID'];
	$ffn=$_POST['stu_firstname'];
	$fln=$_POST['stu_lastname'];
	$fmn=$_POST['mobile_no'];
	$fe=$_POST['email_id'];
	$fa=$_POST['address'];
	$fdob=$_POST['dob'];
	$fage=$_POST['age'];
	$fftname=$_POST['fatname'];
	$fmtname=$_POST['moname'];
	$fmob =$_POST['fomobile'];
	$fsc=$_POST['school'];
	$fbd=$_POST['board'];
	$fdoj=$_POST['doj'];
	$callproc = "CALL p_UpdateStudent('$fid','$ffn','$fln','$fmn','$fe','$fa','$fdob','$fage','$fftname','$fmtname','$fmob','$fsc','$fbd','$fdoj')";
	$firequery = mysqli_query($conn,$callproc);
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
<br>
<br>

</body>
</html>
