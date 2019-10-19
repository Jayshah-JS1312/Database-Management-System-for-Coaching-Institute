<?php
$conn = new mysqli('localhost','root','','coaching_institute');
if (isset($_POST['issubmit']))
	{
        $fees = $_POST['fees'];
		$student_firstname = $_POST['stu_firstname'];
		$student_lastname = $_POST['stu_lastname'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
        $age = $_POST['age'];
		$mobile_number = $_POST['mobilenumber'];
		$email_id = $_POST['email'];
        $address = $_POST['address'];
        $father_name = $_POST['fathername'];
        $mother_name = $_POST['mothername'];
        $father_mobile_no = $_POST['father_mobile_number'];
        $school_name = $_POST['schoolname'];
        $board = $_POST['board'];
        $standard = $_POST['standard'];
        $joining_date = $_POST['joining_date'];
        $batch_id = $_POST['batchid']; 
        $insert_query ="INSERT INTO student (Student_Firstname,Student_Lastname,Gender,Date_of_Birth,Age,Mobile_Number,Email_ID,Address,Father_name,Mother_name,Father_mobile_no,School_name,Board,Standard,Joining_Date,Fees,Batch_ID)
                 VALUES ('$student_firstname','$student_lastname','$gender','$date_of_birth','$age','$mobile_number','$email_id','$address','$father_name','$mother_name','$father_mobile_no',' $school_name',' $board',' $standard','$joining_date','$fees','$batch_id')"; 
        $result = mysqli_query($conn,$insert_query); 
        if($result == NULL)
        {
        	$error =  mysqli_error($conn);       //Displaying Error on front end by violating Trigger
        	
            echo "<script type='text/javascript'>alert('$error');</script>";
        }
	}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="jqueryui/jquery-ui.css">
  <link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
  <link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">
</head>
<body>
    <h1 class="ch1">Allen Career Coaching Institute</h1>
    <br>
    <br>
    <div id="panels">
        <h2>Allen Career Institute</h2>
        <p>Allen Career Institute is famous for IIT-JEE Coaching since 1986.Our main branch is located in Kota,Rajasthan.The average result from our institute is 99.5% every year.Daily Problem Practice sheets are given to their student as their homework.They have to solve it regularly and on the next day DPP's doubts are discussed in the class.</p>
        <h2>Regular Tests</h2>
        <p>Tests are conducted here every Sunday to check the progress of each and every student as how much they have learnt in that week.The score they gain in result is informed to their parents regularly via email/text-message.There are also batch separation tests whcih are held once in every month and if students score high marks they are moved to a competitive batch.</p>
        <h2>Practice</h2>
        <p>Practice makes a man perfect.If student want to secure a good rank in IIT then the first thing that they have to do is daily practice.Whatever that is taught in class  they have to go home and to revise that chapter and then try to solve any other extra books or modules.They should have to clear their doubts regularly without any hesitation.</p>
        <h2>About Faculties</h2>
        <p>The faculties here in our institute are all IIT graduates.They have working experience of 20 years.They will help student in any way if there is doubt.Each faculty has personal TA which are available for 14 hours for doubt solving of student.</p>
    </div>
    <br>
    <br>
    <h1 class="ch2">Admission form</h1>
    <form method="POST" action="Admissionform.php">
    <div class="fx">
        <br>
        <br>
    <b>Student first name:</b>
  		<input type="text" name="stu_firstname">
  		<br>
  		<br>
    <b>Student last name:</b>
        <input type="text" name="stu_lastname">
        <br>
        <br>
    <b>Gender:</b>
        <input type="radio" name="gender" value="M" checked> Male
  		<input type="radio" name="gender" value="F"> Female<br>
        <br>
        <br>
    <b>Date of birth:</b>
  		<input type="date" name="date_of_birth">
  		<br>
  		<br>
    <b>Age:</b>
  		<input type="age" name="age">
  		<br>
  		<br>
    <b>Mobile number:</b>
        <input type="number" name="mobilenumber" id="mobnum">
        <label id = "lbltext" style="color: red;visibility: hidden;">Invalid</label>
        <br>
        <br>
    <b>Batch Name:</b>
    <select name = "batchid">
        <option value="11E1">Batch-1 of 11</option>
        <option value="11E2">Batch-2 of 11</option>
        <option value="12E1">Batch-1 of 12</option>
        <option value="12E2">Batch-2 of 12</option>
    </select>
        <br>
        <br>
    <b>Email-ID:</b>
        <input type="mail" name="email" id="ename">
        <label id = "lbltext1" style="color: red;visibility: hidden;">Invalid</label>
        <br>
        <br>
    <b>Address:</b>
        <input type="add" name="address">
        <br>
        <br>
    <b>Father name:</b>
        <input type="text" name="fathername">
        <br>
        <br>
    <b>Mother name:</b>
        <input type="text" name="mothername">
        <br>
        <br>
    <b>Father Mobile number:</b>
        <input type="num" name="father_mobile_number">
        <br>
        <br>
    <b>School Name:</b>
        <input type="text" name="schoolname">
        <br>
        <br>
    <b>Board:</b>
        <input type="text" name="board">
        <br>
        <br>
    <b>Standard:</b>
        <input type="text" name="standard">
        <br>
        <br>
    <b>Joining Date:</b>
        <input type="date" name="joining_date">
        <br>
        <br>
    <p><strong>You have to pay Rs.56000</strong></p>
    <b>Fees:</b>
        <input type="num" name="fees">
        <br>
        <br>
        <button type="button" name="issubmit" class="btn btn-success" id="btn1" onclick="validate()">Submit</button>
    </div>
</form>
</body>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="jqueryui/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#panels").accordion({
            collapsible:true,
            event:"click",
            animate:300,
            active:0,
            heightStyle:true,
            icons:{header:"ui-icon-plus",activeHeader:"ui-icon-minus"}
        })

        function validate()
        {
            var mobno = document.getElementById("mobnum").value
            var email = document.getElementById("ename").value
            var regx = /E00/i
            var regx1 = /^[7-9][0-9]{9}$/
            var regx2 = /^([a-z 0-9\.-]+)@([a-z 0-9-]+).([a-z]{2,8})(.[a-z]{2,8})?$/ 
            if(regx1.test(mobno))
            {
                document.getElementById("lbltext").innerHTML = "Valid"
                document.getElementById("lbltext").style.visibility = "visible"
                document.getElementById("lbltext").style.color = "green"
            }
            else
            {
                document.getElementById("lbltext").innerHTML = "Invalid"
                document.getElementById("lbltext").style.visibility = "visible"
                document.getElementById("lbltext").style.color = "red"
            }
            if(regx2.test(email))
            {
                document.getElementById("lbltext1").innerHTML = "Valid"
                document.getElementById("lbltext1").style.visibility = "visible"
                document.getElementById("lbltext1").style.color = "green"
            }
            else
            {
                document.getElementById("lbltext1").innerHTML = "Invalid"
                document.getElementById("lbltext1").style.visibility = "visible"
                document.getElementById("lbltext1").style.color = "red"
            }
        }

    })
        
</script>

</html>