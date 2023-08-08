<?PHP
# memanggil fail connection.php dari folder luaran
include('config.php');
# menyemak kewujudan data GET
if(!empty($_GET['studID']))
{
	# mengambil data get
	$id=$_GET['studID'];
	
	$sql = "SELECT * FROM student WHERE studID='$id'";
    $result = mysqli_query($conn, $sql);

    $record = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width", initial-scale="1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
    <title>FA Student Update Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/Staff.css">
</head>

<body>

    <div class="update-container">
        <div class="update-form">
            <a href="Student.php" class="material-icons-outlined">arrow_back</a>
            <h4>Update Student Information</h4>
            <form method="POST">
                <input type="text" id="name" name="newstudid" placeholder="Enter Student ID" value="<?php echo $record['studID']; ?>"><br>
                <input type="text" id="name" name="newstudname" placeholder="Enter Student Name" value="<?php echo $record['studName']; ?>"><br>
                <input type="text" id="name" name="newstudic" placeholder="Enter Student IC No." value="<?php echo $record['studIC']; ?>"><br>
                <input type="text" id="name" name="newstudnoTel" placeholder="Enter No. Tel" value="<?php echo $record['studPhone']; ?>"><br>
                <input type="text" id="name" name="newstudpass" placeholder="Enter Password" value="<?php echo $record['studPass']; ?>"><br>
                <input type="text" id="name" name="newstudemail" placeholder="Enter Student Email" value="<?php echo $record['studEmail']; ?>"><br>
                <input type="text" id="name" name="newstudAddress" placeholder="Enter Address" value="<?php echo $record['studAddress']; ?>"><br>
                <input type="text" id="name" name="newregid" placeholder="Enter Registration ID" value="<?php echo $record['registrationID']; ?>"><br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

<?php
if (!empty($_POST)) {
    // Retrieve the form data
    $newstudid = $_POST['newstudid'];
    $newstudname = $_POST['newstudname'];
    $newstudic = $_POST['newstudic'];
    $newstudnoTel = $_POST['newstudnoTel'];
    $newstudpass = $_POST['newstudpass'];
    $newstudemail = $_POST['newstudemail'];
    $newstudAddress = $_POST['newstudAddress'];
    $newregid = $_POST['newregid'];
   
    // Prepare the update query
    $query = "UPDATE student SET studentName = '$newstudname', studentIC = '$newstudic', studentPhone = '$newstudnoTel', studentPass = '$newstudpass', studentEmail = '$newstudemail', studentAddress = '$newstudAddress' WHERE studID = '$newstudid'";

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Data Save Successfully.'); 
        window.location.href='Student.php';</script>";
    } 
    else {
        // Error handling if the update fails
        echo "<script>alert('Update fail.');
        window.history.back();</script>";
    }
}

?>