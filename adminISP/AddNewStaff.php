<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width", initial-scale="1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
    <title>Add Form Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/UpdateStaffFA.css">
</head>

<body>
    
    <div class="container">
    <div class="form-container" id="formContainer">
        <a href='Staff.php'><span class="material-icons-outlined">close</span></a>
        <h4>New Staff Form</h4>
        <form method="POST">
          <input type="text" id="name" name="staffid" placeholder="Enter Staff ID">
          <input type="text" id="name" name="staffname" placeholder="Enter Staff Name">
          <input type="text" id="name" name="staffic" placeholder="Enter No.IC">
          <input type="text" id="name" name="staffnotel" placeholder="Enter No. Tel">
          <input type="text" id="name" name="staffpassword" placeholder="Enter Password">
          <input type="text" id="name" name="staffemail" placeholder="Enter Email">
          <input type="text" id="name" name="staffjob" placeholder="Enter Job">
          <input type="text" id="name" name="staffsalary" placeholder="Enter Salary">
          <input type="text" id="name" name="staffaddress" placeholder="Enter Address">
          <button type="submit">Add</button>
        </form> 
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

<?php

include('config.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
	# mengambil data POST
	$staffid=$_POST['staffid'];
	$staffname=$_POST['staffname'];
    $staffic=$_POST['staffic'];
	$staffnotel=$_POST['staffnotel'];
    $staffpassword=$_POST['staffpassword'];
    $staffemail=$_POST['staffemail'];
    $staffjob=$_POST['staffjob'];
    $staffsalary=$_POST['staffsalary'];
    $staffaddress=$_POST['staffaddress'];
	
	# semak data yang diambil empty atau tidak
	if(empty($staffid))
	{
		die("<script>alert('Fill in information'); window.history.back();</script>");
	}

    $sql_insert="insert into staff
	(staffID, staffName, staffIC, staffPhone, staffPass, staffEmail, staffJob, staffSalary, staffAddress )
	values
	('$staffid','$staffname','$staffic','$staffnotel', '$staffpassword', '$staffemail', '$staffjob','$staffsalary','$staffaddress')";

    if(mysqli_query($conn,$sql_insert))
    {
		echo "<script>alert('Data Save Successfully.');
        window.location.href='Staff.php';</script>;";
	
	}
	else
	{
		echo "<script>alert('Please try again');
        window.history.back;</script>";
	}
}
?>