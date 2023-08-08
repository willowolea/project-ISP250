<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width", initial-scale="1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
    <title>Add Registration Form Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/AddNewRegFA.css">
</head>

<body>
    
    <div class="container">
    <div class="form-container" id="formContainersupp">
        <a href='Registration.php'><span class="material-icons-outlined">close</span><br><br></a>
        <h3>New Registration Form</h3>
        <form method="POST">
          <input type="text" id="name" name="newRegId" placeholder="Enter Registration ID"><br>
          <input type="time" id="name" name="newRegtime" placeholder="Enter  Registration Time"><br>
          <input type="date" id="name" name="newDatein" placeholder="Enter Register In Date"><br>
          <input type="text" id="name" name="newStudId" placeholder="Enter Student ID"><br>
          <input type="text" id="name" name="newCourseId" placeholder="Enter Course ID"><br>
          <button type="submit" class="btn">Add</button>
        </form> 
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

<?php

include('config.php');

if(!empty($_POST))
{
	
	$newRegId=$_POST['newRegId'];
	$newRegtime=$_POST['newRegtime'];
    $newDatein=$_POST['newDatein'];
    $newStudId=$_POST['newStudId'];
    $newCourseId=$_POST['newCourseId'];
  
	
    if(empty($newRegId))
	{
		die("<script>alert('Fill in information'); window.history.back();</script>");
	}


    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $sql_insert="insert into registration
	(registrationID, timeSet, dateIn, studID, courseID)
	values
	('$newRegId', '$newRegtime', '$newDatein','$newStudId','$newCourseId')";

    echo "SQL Query: " . $sql_insert;


    if(mysqli_query($conn,$sql_insert))
    {
		echo "<script>alert('Data Save Successfully.');
        window.location.href='Registration.php';</script>";
	
	}
	else
	{
		echo "<script>alert('Please try again');
        window.history.back()</script>";
	}
}
?>