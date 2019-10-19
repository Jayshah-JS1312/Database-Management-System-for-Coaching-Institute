<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


echo "<body>
<h1>Update Faculty Details</h1> 

<form method = 'POST' action='UpdateFaculty.php'>
Enter Faculty ID:
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

	$update_query = "SELECT * FROM faculty WHERE Faculty_ID='$id'";
	$fd = mysqli_query($conn,$update_query);
	$row = $fd->fetch_assoc();


	echo "<form method='POST' action = 'UpdateFaculty.php'><div class='container'>
				First name:
				<input type='text' name='fac_firstname' value='".$row["Faculty_fname"]."'>
				<br>
				<br>
				Last name:
				<input type='text' name='fac_lastname' value='".$row["Faculty_lname"]."'>
				<br>
				<br>
				Mobile Number:
				<input type='text' name='mobile_no' value='".$row["Faculty_Mobile_No"]."'>
				<br>
				<br>
				Email ID:
				<input type='text' name='email_id' value='".$row["Faculty_Email"]."'>
				<br>
				<br>
				Address:
				<input type='text' name='address' value='".$row["Faculty_Address"]."'>
				<br>
				<br>
				Date of Join:
				<input type='date' name='fac_date_of_join' value='".$row["Date_of_join"]."'>
  				<br>
  				<br>
  		        <input type='text' name='FID' value='$id'>
				<br>
				<br>
  		        <button type='submit' name='msubmit' class='btn btn success'>Update</button>
			</div></form>";
}
if(isset($_POST['msubmit']))
{
	$fid=$_POST['FID'];
	$ffn=$_POST['fac_firstname'];
	$fln=$_POST['fac_lastname'];
	$fmn=$_POST['mobile_no'];
	$fe=$_POST['email_id'];
	$fa=$_POST['address'];
	$fdoj=$_POST['fac_date_of_join'];

	$callproc = "CALL p_UpdateFaculty('$fid','$ffn','$fln','$fmn','$fe','$fa','$fdoj')";
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
